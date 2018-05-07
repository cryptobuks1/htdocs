/* global
 ajaxurl, templateInfo, DataProviderHelper, SessionTimeoutError, ServerPermissionError
*/

var DataProvider = {};
(function() {
    'use strict';

    DataProvider.validateResponse = function validateResponse(xhr) {
        var error = DataProviderHelper.validateRequest(xhr);
        if (!error && typeof xhr.responseText === 'string') {
            var response = xhr.responseText.trim();
            if (response === 'session_error' || response === '-1' || response === '0') {
                error = new SessionTimeoutError();
                error.loginUrl = templateInfo.login_page;
            } else {
                var tag = '[permission_denied]';
                var parts = response.split(tag);
                if (parts.length >= 3 && parts[parts.length - 1] === '')
                    error = new ServerPermissionError(parts[parts.length - 2]);
            }
        }
        return error;
    };

    function ajaxFailHandler(url, xhr, status, callback) {
        var response = DataProvider.validateResponse(xhr);
        if (response) {
            callback(response);
        } else {
            var error = DataProviderHelper.createCmsRequestError(url, xhr, status, 'Request fail');
            callback(error);
        }
    }

    function addQueryArg(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re))
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        return uri + separator + key + "=" + value;
    }

    function getUrl(action) {
        if (action) {
            action = addQueryArg(ajaxurl, 'action', action);
            if (templateInfo.buildTime)
                action = addQueryArg(action, 'build', templateInfo.buildTime);
        }
        return action;
    }

    function createChunkedRequest(action, data) {
        return {
            'save': {
                'post': {
                    data: JSON.stringify(data),
                    uid: templateInfo.user,
                    _ajax_nonce: templateInfo.nonce
                },
                'url': getUrl(action)
            },
            'clear': {
                'post': {
                    uid: templateInfo.user,
                    _ajax_nonce: templateInfo.nonce
                },
                'url': getUrl('theme_template_clear')
            },
            'errorHandler': DataProvider.validateResponse,
            'encode': true,
            'blob': true
        };
    }

    function doRequest(data, onError, onSuccess) {
        if (!onError || typeof onError !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }

        var url = getUrl(data.action);
        delete data.action;
        jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: jQuery.extend({
                uid: templateInfo.user,
                _ajax_nonce: templateInfo.nonce
            }, data)
        }).done(function requestSuccess(response, status, xhr) {
            var error = DataProvider.validateResponse(xhr);
            if (error) {
                onError(error);
            } else if (response.result === 'done') {
                if (typeof onSuccess === 'undefined') {
                    onError(error, response);
                } else {
                    onSuccess(response);
                }
            } else {
                var invalidResponseError = DataProviderHelper.createCmsRequestError(url, xhr, status, (data.action || '') + ' server error: ' + JSON.stringify(response));
                onError(invalidResponseError);
            }
        }).fail(function requestFail(xhr, status) {
            ajaxFailHandler(url, xhr, status, onError);
        });
    }

    DataProvider.doExport = function doExport(exportData, callback) {
        DataProviderHelper.chunkedRequest(createChunkedRequest('theme_template_export', exportData), callback);
    };

    DataProvider.save = function save(saveData, callback) {
        DataProviderHelper.chunkedRequest(createChunkedRequest('theme_save_project', saveData), callback);
    };

    DataProvider.getTheme = function getTheme(data, callback) {
        if (!callback || typeof callback !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }

        var url = getUrl('theme_get_zip');
        window.jQuery.ajax({
            url: url,
            type: 'POST',
            dataType: 'text',
            data: ({
                data: data,
                uid: templateInfo.user,
                _ajax_nonce: templateInfo.nonce
            })
        }).done(function getThemeSuccess(data, status, xhr) {
            var error = DataProvider.validateResponse(xhr);
            if (error) {
                callback(error);
            } else {
                callback(null, data);
            }
        }).fail(function getThemeFail(xhr, status) {
            ajaxFailHandler(url, xhr, status, callback);
        });
    };

    DataProvider.downloadTheme = function getTheme(id, callback) {
        DataProvider.getTheme({id: id}, callback);
    };

    DataProvider.updatePreviewTheme = function updatePreviewTheme(callback) {
        doRequest({action: 'theme_update_preview'}, callback);
    };

    DataProvider.load = function () {
        return templateInfo.projectData;
    };

    DataProvider.canRename = function canRename(themeName, callback) {
        doRequest({action: 'theme_can_rename', themeName: themeName}, callback, function(response) {
            callback(null, response.message === '');
        });
    };

    function reloadInfo(action, callback) {
        if (!callback || typeof callback !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }
        var url = getUrl(action);
        $.ajax({
            url: url,
            type: 'POST',
            data: ({
                full_urls: true,
                uid: templateInfo.user,
                _ajax_nonce: templateInfo.nonce
            })
        }).done(function reloadInfoSuccess(data, status, xhr) {
            var error = DataProvider.validateResponse(xhr);
            if (!error) {
                try {
                    var info = JSON.parse(data);
                    $.each(info, function(key, value) {
                        templateInfo[key] = value;
                    });
                } catch(e) {
                    error = new Error(e);
                    error.args = { parseArgument: data };
                }
            }
            callback(error, data);
        }).fail(function reloadInfoFail(xhr, status) {
            ajaxFailHandler(url, xhr, status, callback);
        });
    }

    DataProvider.reloadTemplatesInfo = function reloadTemplatesInfo(callback) {
        reloadInfo('theme_reload_info', callback);
    };

    DataProvider.reloadThemesInfo = function reloadThemesInfo(callback) {
        reloadInfo('theme_reload_themes_info', callback);
    };

    DataProvider.renameTheme = function renameTheme(themeName, newName, callback) {
        doRequest({action: 'theme_rename', themeName: themeName, newName: newName}, callback, function() {
            var name = templateInfo.base_template_name;
            callback(null,
                name === themeName ?
                    window.location.toString().replace(new RegExp('theme=' + name), 'theme=' + newName) :
                    null
            );
        });
    };

    DataProvider.rename = function rename(newName, callback) {
        DataProvider.renameTheme(templateInfo.base_template_name, newName, callback);
    };

    DataProvider.removeTheme = function removeTheme(id, callback) {
        doRequest({action: 'theme_remove', id: id}, callback);
    };

    DataProvider.makeThemeAsActive = function makeThemeAsActive(callback, id) {
        var data = {action: 'theme_activate'};
        if (typeof id !== 'undefined') {
            data.id = id;
        }
        doRequest(data, callback);
    };

    DataProvider.copyTheme = function copyTheme(id, newName, callback) {
        doRequest({action: 'theme_copy', id: id, newName: newName}, callback);
    };

    DataProvider.getMaxRequestSize = function getMaxRequestSize() {
        return templateInfo.maxRequestSize;
    };

    DataProvider.backToAdmin = function backToAdmin() {
        // выкидывает на базовую страницу backend-а
        window.top.location = templateInfo.admin_url;
    };

    DataProvider.getAllCssJsSources = function getAllCssJsSources() {
        return templateInfo.cssJsSources;
    };

    DataProvider.getMd5Hashes = function getMd5Hashes() {
        return templateInfo.md5Hashes;
    };

    DataProvider.getInfo = function getInfo() {
        var info = {
            cmsName: 'WordPress',
            cmsVersion: templateInfo.cms_version,
            adminPage: templateInfo.admin_url,
            startPage: templateInfo.templates.home,
            templates: templateInfo.templates,
            usedTemplateFiles: templateInfo.used_template_files,
            canDuplicateTemplatesConstructors: templateInfo.template_types,
            thumbnails: [{name: "screenshot.png", width: 600, height: 450}, {name: "screenshot400x400.png", width: 400, height: 400}],
            isThemeActive: true,
            themeName: templateInfo.base_template_name,
            uploadImage: getUrl('theme_upload_image') + '&uid=' + templateInfo.user + '&_ajax_nonce=' + templateInfo.nonce,
            uploadTheme: getUrl('theme_upload_theme') + '&uid=' + templateInfo.user + '&_ajax_nonce=' + templateInfo.nonce,
            unZip: getUrl('theme_fso_unzip') + '&uid=' + templateInfo.user + '&_ajax_nonce=' + templateInfo.nonce,
            themes: $.extend({}, templateInfo.themes),
            pathToManifest : '/export/themler.manifest'
        };

        if (templateInfo.importer_nonce) {
            info.importContent = ajaxurl + '?action=theme_content_start_import_without_cleanup&uid=' + templateInfo.user + '&_ajax_nonce=' + templateInfo.importer_nonce;
            info.replaceContent = ajaxurl + '?action=theme_content_start_import&uid=' + templateInfo.user + '&_ajax_nonce=' + templateInfo.importer_nonce;
        }
        return info;
    };

    DataProvider.getFiles = function getFiles(mask, filter, callback) {
        if (!callback || typeof callback !== 'function') {
            throw DataProviderHelper.getResultError('Invalid callback');
        }
        if (mask === '*.css') {
            mask = '/bootstrap.css;/style.css';
        }

        var url = getUrl('theme_get_files');
        window.jQuery.ajax({
            url: url,
            type: 'POST',
            data: ({
                mask: mask,
                filter:filter,
                uid: templateInfo.user,
                _ajax_nonce: templateInfo.nonce
            })
        }).done(function getFilesSuccess(data, status, xhr) {
            var error = DataProvider.validateResponse(xhr);
            if (error) {
                callback(error);
            } else if('string' === typeof data) {
                var files;
                try {
                    files = JSON.parse(data);
                } catch(e) {
                    error = new Error(e);
                    error.args = { parseArgument: data };
                    callback(error);
                    return;
                }
                callback(null, files);
            } else {
                var invalidResponseError = DataProviderHelper.createCmsRequestError(url, xhr, status, 'getFiles() server error: ' + data);
                callback(invalidResponseError);
            }
        }).fail(function getFilesFail(xhr, status) {
            ajaxFailHandler(url, xhr, status, callback);
        });
    };

    DataProvider.zip = function zip(data, callback) {
        DataProviderHelper.chunkedRequest(createChunkedRequest('theme_fso_zip', data), callback);
    };

    DataProvider.setFiles = function setFiles(files, callback) {
        DataProviderHelper.chunkedRequest(createChunkedRequest('theme_set_files', files), callback);
    };

    DataProvider.getVersion = function () {
        return "0.0.2";
    };

    if (!window.templateInfo || !window.templateInfo.projectData) {
        var url = window.location.href;
        if (url.indexOf('#') !== -1)
            url = url.substring(0, url.indexOf('#'));
        window.location.href = addQueryArg(url, 'noCache', Math.floor(Math.random() * 1e5) + '');
    }
})();