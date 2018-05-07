(function (jQuery, $) {
jQuery(function () {
    'use strict';

    var indexURL = jQuery('link[rel="header_link"]').attr('href');
    var iframeTagPart = ['<iframe allowtransparency="true" ' , 'background-color:transparent;filter:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0);"></iframe>'];
    if(indexURL && jQuery('header.clickable').length) {
        if(jQuery('#bd-header-bg').length) {
            jQuery('header').append(
                (jQuery.browser.msie ? iframeTagPart[0] + 'style="position:absolute;height:100%;width:40000px;left:-20000px;' + iframeTagPart[1] : '' ) +
                '<a style="position:absolute;height:100%;width:40000px;left:-20000px;top:0px;z-index:1000;" href="' + indexURL + '"></a>');
        } else {
            jQuery('header').append(
                (jQuery.browser.msie ? iframeTagPart[0] + 'style="position:absolute;height:100%;width:100%;' + iframeTagPart[1] : '' ) +
                '<a style="position:absolute;height:100%;width:100%;" href="' + indexURL + '"></a>');
        }
    }

    function adminAffix(el) {
        el.off('affix-calc.theme.affix').on('affix-calc.theme.affix', function (e) {
            var offset = 0,
                el = jQuery(this),
                fixAtScreen = jQuery(this).data('fixAtScreen'),
                elOffset = parseInt(el.data('offset'), 10) || 0,
                adminHeight = jQuery('#wpadminbar').outerHeight() || 0;

            if (fixAtScreen === 'top' && elOffset < adminHeight) {
                offset = adminHeight - elOffset;
            }

            e.offset = offset;
        });
    }

    jQuery('body').on('added_to_cart', function() {
        jQuery('.add_to_cart_button.added').text('ADDED');
    }).on('affix-init.theme.affix', function (e, el) {
        if (!el) return;
        adminAffix(el);
    });

    adminAffix(jQuery('[data-fix-at-screen]'));
});

/* global define */
/* exported productsGridEqualHeight, initSlider */

(function ($) {
    'use strict';

    $.fn.equalImageHeight = function () {
        return this.each(function() {
            var maxHeight = 0;

            $(this).children('a').children('img').each(function(index, child) {
                var h = $(child).height();
                maxHeight = h > maxHeight ? h : maxHeight;
                $(child).css('height', ''); // clears previous value
            });

            $(this).children('a').each(function(index, child) {
                $(child).height(maxHeight);
            });

        });
    };

    $.fn.equalColumnsHeight = function () {
        function off() {
            /* jshint validthis: true */
            this.onload = null;
            this.onerror = null;
            this.onabort = null;
        }

        function on(dfd) {
            /* jshint validthis: true */
            off.bind(this)();
            dfd.resolve();
        }

        return this.each(function() {
            var loadPromises = [];

            $(this).find('img').each(function () {
                if (this.complete) return;
                var deferred = $.Deferred();
                this.onload = on.bind(this, deferred);
                this.onerror = on.bind(this, deferred);
                this.onabort = on.bind(this, deferred);
                loadPromises.push(deferred.promise());
            });

            $.when.apply($, loadPromises).done((function () {
                var cols =  $(this).children('[class*="col-"]').children('[class*="bd-layoutcolumn-"]').css('height', '');
                var indexesForEqual = [];
                var colsWidth = 0;
                var containerWidth = parseInt($(this).css('width'), 10);
                $(cols).each((function (key, column) {
                    colsWidth += parseInt($(column).parent().css('width'), 10);
                    if ((containerWidth + cols.length) >= colsWidth) { // col.length fixes width round in FF
                        indexesForEqual.push(key);
                    }
                }).bind(this));

                var maxHeight = 0;
                indexesForEqual.forEach(function (index) {
                    if (maxHeight < parseInt($(cols[index]).parent().css('height'), 10)) {
                        maxHeight = parseInt($(cols[index]).parent().css('height'), 10);
                    }
                });

                indexesForEqual.forEach(function (index) {
                    $(cols[index]).css('height', maxHeight);
                });
            }).bind(this));
        });
    };

    $(function(){
        $('.bd-row-auto-height').equalColumnsHeight();
        $(window).resize(function(){
            $('.bd-row-auto-height').equalColumnsHeight();
        });
    });
})(jQuery);

// IE10+ flex fix
if (1-'\0') {

    var fixHeight = function fixHeight() {
        jQuery('.bd-row-flex > [class*="col-"] > [class*="bd-layoutcolumn-"] > .bd-vertical-align-wrapper, ' +
                '[class*="bd-layoutitemsbox-"].bd-flex-wide').each(function () {

            var content = jQuery(this);
            var wrapper = content.children('.bd-fix-flex-height');
            if (!wrapper.length) {
                content.wrapInner('<div class="bd-fix-flex-height clearfix"></div>');
            }
            var height = wrapper.outerHeight(true);
            content.removeAttr('style');
            content.css({
                '-ms-flex-preferred-size': height + 'px',
                'flex-basis': height + 'px'
            });
        });

        setTimeout(fixHeight, 500);
    };

    var fixMinHeight = function () {
        jQuery('.bd-stretch-inner').wrap('<div class="bd-flex-vertical"></div>');
    };

    jQuery(fixHeight);
    jQuery(fixMinHeight);
}

/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(jQuery);
    }
}(function ($) {
    'use strict';
    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            s = decodeURIComponent(s.replace(pluses, ' '));
        } catch(e) {
            return;
        }

        try {
            return config.json ? JSON.parse(s) : s;
        } catch(e) {}
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {

        // Write
        if (value !== undefined && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '',
                options.path    ? '; path=' + options.path : '',
                options.domain  ? '; domain=' + options.domain : '',
                options.secure  ? '; secure' : ''
            ].join(''));
        }

        var result = key ? undefined : {};
        var cookies = document.cookie ? document.cookie.split('; ') : [];

        for (var i = 0, l = cookies.length; i < l; i++) {
            var parts = cookies[i].split('=');
            var name = decode(parts.shift());
            var cookie = parts.join('=');

            if (key && key === name) {
                result = read(cookie, value);
                break;
            }

            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        if ($.cookie(key) !== undefined) {
            $.cookie(key, '', $.extend({}, options, { expires: -1 }));
            return true;
        }
        return false;
    };

}));

window.initSlider = function initSlider(selector, leftButtonSelector, rightButtonSelector, navigatorSelector, indicatorsSelector, carouselInterval, carouselPause, carouselWrap, carouselRideOnStart) {
    'use strict';
    jQuery(selector + '.carousel.slide .carousel-inner > .item:first-child').addClass('active');

    function setSliderInterval() {
        jQuery(selector + '.carousel.slide').carousel({interval: carouselInterval, pause: carouselPause, wrap: carouselWrap});
        if (!carouselRideOnStart) {
            jQuery(selector + '.carousel.slide').carousel('pause');
    }
    }

    /* 'active' must be always specified, otherwise slider would not be visible */
    jQuery(selector + '.carousel.slide .' + leftButtonSelector + ' a' + navigatorSelector).attr('href', '#');
    jQuery(selector + '.carousel.slide .' + leftButtonSelector + ' a' + navigatorSelector).click(function() {
        setSliderInterval();
        jQuery(selector + '.carousel.slide').carousel('prev');
        return false;
    });

    jQuery(selector + '.carousel.slide .' + rightButtonSelector + ' a' + navigatorSelector).attr('href', '#');
    jQuery(selector + '.carousel.slide .' + rightButtonSelector + ' a' + navigatorSelector).click(function() {
        setSliderInterval();
        jQuery(selector + '.carousel.slide').carousel('next');
        return false;
    });

    jQuery(selector + '.carousel.slide').on('slid.bs.carousel', function () {
        var indicators = jQuery(indicatorsSelector, this);
        indicators.find('.active').removeClass('active');
        var activeSlide = jQuery(this).find('.item.active');
        var activeIndex = activeSlide.parent().children().index(activeSlide);
        var activeItem = indicators.children()[activeIndex];
        jQuery(activeItem).children('a').addClass('active');
    });

    setSliderInterval();
};

jQuery(function ($) {
    'use strict';

    $('.collapse-button').each(function () {
        var button = $(this);
        var collapse = button.siblings('.collapse');

        collapse.on('show.bs.collapse', function () {
            if (button.parent().css('position') === 'absolute') {
                var right = collapse.width() - button.width();
                if (button.hasClass('bd-collapse-right')) {
                    $(this).css({
                        'position': 'relative',
                        'right': right
                    });
                } else {
                    $(this).css({
                        'position': '',
                        'right': ''
                    });
                }
            }
        });
    });
});

(function ($) {
    'use strict';
    var row = [],
        getOffset = function (el) {
            var isInline = false;
            el.css('position', 'relative');
            if (el.css('display') === 'inline') {
                el.css('display', 'inline-block');
                isInline = true;
            }
            var offset = el.position().top;
            if (isInline) {
                el.css('display', 'inline');
            }
            return offset;
        },
        getCollapsedMargin = function (el) {
            if (el.css('display') === 'block') {
                var m0 = parseFloat(el.css('margin-top'));
                if (m0 > 0) {
                    var p = el.prev();
                    var prop = 'margin-bottom';
                    if (p.length < 1) {
                        p = el.parent();
                        prop = 'margin-top';
                    }
                    if (p.length > 0 && p.css('display') === 'block') {
                        var m = parseFloat(p.css(prop));
                        if (m > 0) {
                            return Math.min(m0, m);
                        }
                    }
                }
            }
            return 0;
        },
        classRE = new RegExp('.*(bd-\\S+[-\\d]*).*'),
        childFilter = function () {
            return classRE.test(this.className);
        },
        calcOrder = function (items) {
            var roots = items;
            while (roots.eq(0).children().length === 1) {
                roots = roots.children();
            }
            var childrenClasses = [];
            var childrenWeights = {};
            var getNextWeight = function (children, i, l) {
                for (var j = i + 1; j < l; j++) {
                    var cls = children[j].className.replace(classRE, '$1');
                    if (childrenClasses.indexOf(cls) !== -1) {
                        return childrenWeights[cls];
                    }
                }
                return 100; //%
            };
            roots.each(function (i, root) {
                var children = $(root).children().filter(childFilter);
                var previousWeight = 0;
                for (var c = 0, l = children.length; c < l; c++) {
                    var cls = children[c].className.replace(classRE, '$1');
                    if (childrenClasses.indexOf(cls) === -1) {
                        var nextWeight = getNextWeight(children, c, l);
                        childrenWeights[cls] = previousWeight + (nextWeight - previousWeight) / 10; //~max unique child
                        childrenClasses.push(cls);
                    }
                    previousWeight = childrenWeights[cls];
                }
            });
            childrenClasses.sort(function (a, b) {
                return childrenWeights[a] > childrenWeights[b];
            });
            return childrenClasses;
        };
    var calcRow = function (helpNodes, last, order) {

        $(row).css({'overflow': 'visible', 'height': 'auto'}).toggleClass('last-row', last);

        if (row.length > 0) {
            var roots = $(row);
            roots.removeClass('last-col').last().addClass('last-col');
            while (roots.eq(0).children().length === 1) {
                roots = roots.children();
            }
            var cls = '';
            var maxOffset = 0;
            var calcMaxOffsets = function (i, root) {
                var el = $(root).children().filter('.' + cls + ':visible:first');
                if (el.length < 1 || el.css('position') === 'absolute') {
                    return;
                }
                var offset = getOffset(el);
                if (offset > maxOffset) {
                    maxOffset = offset;
                }
            };
            var setMaxOffsets = function (i, root) {
                var el = $(root).children().filter('.' + cls + ':visible:first');
                if (el.length < 1 || el.css('position') === 'absolute') {
                    return;
                }
                var offset = getOffset(el);
                var fix = maxOffset - offset - getCollapsedMargin(el);
                if (fix > 0) {
                    var helpNode = document.createElement('div');
                    helpNode.setAttribute('style', 'height:' + fix + 'px');
                    helpNode.className = 'bd-empty-grid-item';
                    helpNodes.push(helpNode);
                    el.before(helpNode);
                }
            };
            for (var c = 0; c < order.length; c++) {
                maxOffset = 0;
                cls = order[c];
                roots.each(calcMaxOffsets).each(setMaxOffsets);
            }
            var hMax = 0;
            $.each(roots, function (i, e) {
                var h = $(e).outerHeight();
                if (hMax < h) {
                    hMax = h;
                }
            });
            $.each(roots, function (i, e) {
                var el = $(e);
                var fix = hMax - el.outerHeight();
                if (fix > 0) {
                    var helpNode = document.createElement('div');
                    helpNode.setAttribute('style', 'height:' + fix + 'px');
                    helpNode.className = 'bd-empty-grid-item';
                    helpNodes.push(helpNode);
                    el.append(helpNode);
                }
            });
        }
        row = [];
    };
    var itemsRE = new RegExp('.*(separated-item[^\\s]+).*'),
        resize =  function () {
            var grid = $('.separated-grid');
            grid.each(function (i, gridElement) {
                var g = $(gridElement);
                if (!g.is(':visible')) {
                    return;
                }
                if (!gridElement._item || !gridElement._item.length || !gridElement._item.is(':visible')){
                    gridElement._item = g.find('div[class*=separated-item]:visible:first');
                    if (!gridElement._item.length){
                        return;
                    }
                    gridElement._items =  g.find(
                        'div.' + gridElement._item.attr('class').replace(itemsRE, '$1')
                    ).filter(function () {
                            return $(this).parents('.separated-grid')[0] === gridElement;
                        })
                }
                var items = gridElement._items;
                if (!items.length){
                    return;
                }
                var h = 0;
                for (var k = 0; k < items.length; k++) {
                    var el = $(items[k]);
                    var _h = el.height();
                    if (el.is('.first-col')) {
                        h = _h;
                    }
                    if (h !== _h) {
                        gridElement._height = 0;
                    }
                }


                if (g.innerHeight() === gridElement._height && g.innerWidth() === gridElement._width) {
                    return;
                }

                var windowScrollTop = $(window).scrollTop();
                items.css({'overflow': 'hidden', 'height': '10px'}).removeClass('last-row');
                if (gridElement._helpNodes) {
                    $(gridElement._helpNodes).remove();
                }
                gridElement._helpNodes = [];
                var firstLeft = items.position().left;
                var order = calcOrder(items);
                var notDisplayed = [];
                var lastItem = null;
                items.each(function (i, gridItem) {
                    var item = $(gridItem);
                    var p = item;
                    do {
                        if (p.css('display') === 'none') {
                            p.data('style', p.attr('style')).css('display', 'block');
                            notDisplayed.push(p[0]);
                        }
                        p = p.parent();

                    } while (p.length > 0 && p[0] !== gridElement && !item.is(':visible'));
                    var first = firstLeft >= item.position().left;
                    if (first && row.length > 0) {
                        calcRow(gridElement._helpNodes, lastItem && lastItem.parentNode !== gridItem.parentNode, order);
                    }
                    row.push(gridItem);
                    item.toggleClass('first-col', first);
                    if (i === items.length - 1) {
                        calcRow(gridElement._helpNodes, true, order);
                    }
                    lastItem = gridItem;
                });
                $(notDisplayed).each(function (i, e) {
                    var el = $(e);
                    var css = el.data('style');
                    el.removeData('style');
                    if ('undefined' !== typeof css) {
                        el.attr('style', css);
                    } else {
                        el.removeAttr('style');
                    }
                });
                gridElement._width = g.innerWidth();
                gridElement._height = g.innerHeight();
                $(window).scrollTop(windowScrollTop);
                $(window).off('resize', lazy);
                $(window).resize();
                $(window).on('resize', lazy);
            });
        },
        timeoutLazy,
        lazy = function(){
            clearTimeout(timeoutLazy);
            timeoutLazy = setTimeout(resize, 100);
        },
        interval =function (){
            lazy();
            setTimeout(interval, 1000);
        };
    $(window).resize(lazy);
    $(interval);
})(jQuery);


(function ($) {
    'use strict';
    $(document).ready(function () {
        if ("undefined" !== typeof parent.AppController) return;
        var controls = $('[data-autoplay=true]');
        $(controls).each(function (index, item) {
            item.src = item.src + "&autoplay=1";
        });
    });

})(jQuery);

jQuery(function ($) {
    'use strict';

    $(document).on('click.themler', '[data-responsive-menu] li > a:not([data-toggle="collapse"])', function responsiveClick() {
        var itemLink = $(this);
        var menu = itemLink.closest('[data-responsive-menu]');
        var responsiveBtn = menu.find('.collapse-button');
        var responsiveLevels = menu.data('responsiveLevels');

        if (responsiveBtn.length &&
                !responsiveBtn.is(':visible') ||
                (responsiveLevels !== 'expand on click' && responsiveLevels !== '') ||
                !menu.data('responsiveMenu')) {
            return true;
        }

        var submenu = itemLink.siblings();
        if (!submenu.length) return true;
        if (submenu.css('visibility') === 'visible') {
            submenu.removeClass('show');
            submenu.find('.show').removeClass('show');
            itemLink.removeClass('active');
        } else {
            itemLink
                .closest('li')
                .siblings('li')
                .find('ul').parent()
                .removeClass('show');
            submenu.addClass('show');
            itemLink.addClass('active');
        }
        return false;
    });
});

jQuery(function ($) {
    'use strict';

    $('body')
        .on('click.themler', '[data-url] a', function (e) {
            e.stopPropagation();
        })
        .on('click.themler', '[data-url]', function () {
            var elem = $(this),
                url = elem.data('url'),
                target = elem.data('target');
            window.open(url, target);
        });
});

jQuery(function ($) {
    'use strict';
    var leftClass = 'bd-popup-left';
    var rightClass = 'bd-popup-right';

    $(document).on('mouseenter', 'ul.nav > li, .nav ul > li', function calcSubmenuDirection() {
        var popup = $(this).children('[class$="-popup"], [class*="-popup "]');
        if (popup.length) {
            popup.removeClass(leftClass + ' ' + rightClass);
            var dir = '';
            if (popup.parents('.' + leftClass).length) {
                dir = leftClass;
            } else if (popup.parents('.' + rightClass).length) {
                dir = rightClass;
            }
            if (dir) {
                popup.addClass(dir);
            } else {
                var left = popup.offset().left;
                var width = popup.outerWidth();
                if (left < 0) {
                    popup.addClass(rightClass);
                } else if (left + width > $(window).width()) {
                    popup.addClass(leftClass);
                }
            }
        }
    });
});

jQuery(function ($) {
    'use strict';

    window.tabCollapseResize = function () {
        $('.tabbable').each(function () {
            var tabbable = $(this);
            var tabMenu = tabbable.children('.nav-tabs');
            var tabs = tabMenu.children('li');
            var tabContent = tabbable.children('.tab-content');
            var panels = tabContent.find('.tab-pane');

            if (!tabs.filter('.active').length) {
                tabs.first().addClass('active');
                panels.removeClass('active').first().addClass('active');
            }

            if (!tabbable.data('responsive')) {
                if (tabContent.children('.accordion').length) {
                    tabContent.children('.accordion').children().first().unwrap();
                }
                tabContent.find('.accordion-item').remove();
                panels.each(function () {
                    var wrapper = $(this).children('.accordion-wrap');
                    if (wrapper.children().length) {
                        wrapper.children().first().unwrap();
                    } else {
                        wrapper.remove();
                    }
                });
                return;
            }

            var cls = tabMenu.siblings('.accordion').children('.accordion-content').attr('class');
            var wrapper = tabContent.find('.accordion-wrap');
            if (wrapper.length) {
                tabContent.find('.accordion-wrap').toggleClass(cls, tabContent.find('.accordion-item:visible').length > 0);
                return;
            }

            var accordion = tabbable.children('.accordion');

            accordion.show();
            var accordionTpl = accordion.clone();
            accordion.hide();

            var itemTpl = accordion.find('.accordion-item').clone();
            var contentTpl = accordion.find('.accordion-content').clone();
            accordionTpl.empty();

            tabs.each(function () {
                var tab = $(this);
                var tablink = tab.find('[data-toggle="tab"]');
                var currentId = tablink.attr('href');
                var panel = panels.filter(currentId);

                var collapseLink = $('<a></a>');
                collapseLink.html(tablink.html());
                collapseLink.attr('data-toggle', 'collapse');
                collapseLink.attr('data-target', currentId);

                panel.before(itemTpl.clone().append(collapseLink));
                panel.wrapInner(contentTpl.clone().addClass('accordion-wrap').toggleClass(cls, collapseLink.is(':visible')));

                panel.addClass('collapse');
                if (panel.is('.active')) {
                    panel.addClass('in');
                    collapseLink.addClass('active');
                }

                /* Collapse */

                panel.on('show.bs.collapse', function () {
                    var actives = panels.filter('.in');
                    panels.filter('.collapsing:not(.active)').addClass('bd-collapsing');
                    if (actives && actives.length) {
                        var activesData = actives.data('bs.collapse');
                        if (!activesData || !activesData.transitioning) {
                            actives.collapse('hide');
                            if (!activesData) actives.data('bs.collapse', null);
                        }
                    }
                    panel.css('display', 'block');

                    collapseLink.addClass('active');
                });

                panel.on('shown.bs.collapse', function () {
                    tab.addClass('active');
                    panel.addClass('active');

                    panel.css('display', '');
                    panel.filter('.bd-collapsing').removeClass('bd-collapsing').collapse('hide');
                });

                panel.on('hide.bs.collapse', function () {
                    collapseLink.removeClass('active');
                });

                panel.on('hidden.bs.collapse', function () {
                    tab.removeClass('active');
                    panel.removeClass('active');
                    panel.css('height', '');
                });

                /* Tabs */

                tablink.on('show.bs.tab', function () {
                    panels.removeClass('in');
                    tabContent.find('.accordion > .accordion-item > a').removeClass('active');

                    panel.css('height', '');
                    panel.addClass('in');
                    collapseLink.addClass('active');
                });
            });

            tabContent.wrapInner(accordionTpl);
        });
    };

    var resizeTimeout;
    $(window).on('resize', function () {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(window.tabCollapseResize, 25);
    });

    window.tabCollapseResize();
});

jQuery(function ($) {
    'use strict';

    var resizeHandler = function () {
        $('.carousel.adjust-slides').each(function () {
            var inner = $(this).find('.carousel-inner'),
                items = inner.children('.item').addClass('clearfix').css('width', '100%');
            var maxH = 0;
            if (items.length > 1) {
                var windowScrollTop = $(window).scrollTop();
                items.css('min-height', '0').each(function(){
                    maxH = Math.max(maxH, parseFloat(getComputedStyle(this).height));
                }).css('min-height', maxH);
                inner.css('height', maxH);
                if ($(window).scrollTop() !== windowScrollTop){
                    $(window).scrollTop(windowScrollTop);
                }
            }
        });
        setTimeout(resizeHandler, 100);
    };
    resizeHandler();
});


})(window._$, window._$);
(function (jQuery, $) {
jQuery(function ($) {
    'use strict';

    $('body').on('activate.bs.scrollspy', function (e) {
        var item = $(e.target);
        item.siblings('li').children('a').removeClass('active');
        item.removeClass('active');
        if (!$(this).data('scroll-animating')) {
            item.children('a').addClass('active');
        }
    }).scrollspy({
        target: '',
        offset: 0 || 5
    });
});
})(window._$, window._$);
(function (jQuery, $) {
/*global Date */
function ssc_init() {
    'use strict';
    if (!document.body) return;
    var e = document.body;
    var t = document.documentElement;
    var n = window.innerHeight;
    var r = e.scrollHeight;
    ssc_root = document.compatMode.indexOf("CSS") >= 0 ? t : e;
    ssc_activeElement = e;
    ssc_initdone = true;
    if (top !== self) {
        ssc_frame = true;
    } else if (r > n && (e.offsetHeight <= n || t.offsetHeight <= n)) {
        ssc_root.style.height = "auto";
        if (ssc_root.offsetHeight <= n) {
            var i = document.createElement("div");
            i.style.clear = "both";
            e.appendChild(i);
        }
    }
    if (!ssc_fixedback) {
        e.style.backgroundAttachment = "scroll";
        t.style.backgroundAttachment = "scroll";
    }
    if (ssc_keyboardsupport) {
        ssc_addEvent("keydown", ssc_keydown);
    }
}

function ssc_scrollArray(e, t, n, r) {
    'use strict';
    r || (r = 1e3);
    ssc_directionCheck(t, n);
    ssc_que.push({
        x: t,
        y: n,
        lastX: t < 0 ? 0.99 : -0.99,
        lastY: n < 0 ? 0.99 : -0.99,
        start: +(new Date)
    });
    if (ssc_pending) {
        return;
    }
    var i = function() {
        var s = +(new Date);
        var o = 0;
        var u = 0;
        for (var a = 0; a < ssc_que.length; a++) {
            var f = ssc_que[a];
            var l = s - f.start;
            var c = l >= ssc_animtime;
            var h = c ? 1 : l / ssc_animtime;
            if (ssc_pulseAlgorithm) {
                h = ssc_pulse(h)
            }
            var p = f.x * h - f.lastX >> 0;
            var d = f.y * h - f.lastY >> 0;
            o += p;
            u += d;
            f.lastX += p;
            f.lastY += d;
            if (c) {
                ssc_que.splice(a, 1);
                a--;
            }
        }
        if (t) {
            var v = e.scrollLeft;
            e.scrollLeft += o;
            if (o && e.scrollLeft === v) {
                t = 0;
            }
        }
        if (n) {
            var m = e.scrollTop;
            e.scrollTop += u;
            if (u && e.scrollTop === m) {
                n = 0;
            }
        }
        if (!t && !n) {
            ssc_que = [];
        }
        if (ssc_que.length) {
            setTimeout(i, r / ssc_framerate + 1);
        } else {
            ssc_pending = false;
        }
    };
    setTimeout(i, 0);
    ssc_pending = true;
}

function ssc_wheel(e) {
    'use strict';
    if (!ssc_initdone) {
        ssc_init();
    }
    var t = e.target;
    var n = ssc_overflowingAncestor(t);
    if (!n || e.defaultPrevented || ssc_isNodeName(ssc_activeElement, "embed") || ssc_isNodeName(t, "embed") && /\.pdf/i.test(t.src)) {
        return true;
    }
    var r = e.wheelDeltaX || e.deltaX || 0;
    var i = e.wheelDeltaY || e.deltaY || 0;
    if (n.nodeName === 'BODY' && (currentBrowser === 'firefox' || currentBrowser === "msie" || currentBrowser === "netscape")) {
        n = document.documentElement;
        r = -r;
        i = -i;
        if (currentBrowser === 'firefox') {
            r *= 40;
            i *= 40;
        }
    }

    if (!r && !i) {
        i = e.wheelDelta || 0;
    }
    if (Math.abs(r) > 1.2) {
        r *= ssc_stepsize / 120;
    }
    if (Math.abs(i) > 1.2) {
        i *= ssc_stepsize / 120;
    }
    ssc_scrollArray(n, -r, -i);
    e.preventDefault();
}

function ssc_keydown(e) {
    'use strict';
    var t = e.target;
    var n = e.ctrlKey || e.altKey || e.metaKey;
    if (/input|textarea|embed/i.test(t.nodeName) || t.isContentEditable || e.defaultPrevented || n) {
        return true;
    }
    if (ssc_isNodeName(t, "button") && e.keyCode === ssc_key.spacebar) {
        return true;
    }
    var r, i = 0,
        s = 0;
    var o = ssc_overflowingAncestor(ssc_activeElement);
    var u = o.clientHeight;
    if (o === document.body) {
        u = window.innerHeight;
    }
    switch (e.keyCode) {
        case ssc_key.up:
            s = -ssc_arrowscroll;
            break;
        case ssc_key.down:
            s = ssc_arrowscroll;
            break;
        case ssc_key.spacebar:
            r = e.shiftKey ? 1 : -1;
            s = -r * u * 0.9;
            break;
        case ssc_key.pageup:
            s = -u * 0.9;
            break;
        case ssc_key.pagedown:
            s = u * 0.9;
            break;
        case ssc_key.home:
            s = -o.scrollTop;
            break;
        case ssc_key.end:
            var a = o.scrollHeight - o.scrollTop - u;
            s = a > 0 ? a + 10 : 0;
            break;
        case ssc_key.left:
            i = -ssc_arrowscroll;
            break;
        case ssc_key.right:
            i = ssc_arrowscroll;
            break;
        default:
            return true;
    }
    ssc_scrollArray(o, i, s);
    e.preventDefault();
}

function ssc_mousedown(e) {
    'use strict';
    ssc_activeElement = e.target;
}

function ssc_setCache(e, t) {
    'use strict';
    for (var n = e.length; n--;) ssc_cache[ssc_uniqueID(e[n])] = t;
    return t;
}

function ssc_overflowingAncestor(e) {
    'use strict';
    var t = [];
    var n = ssc_root.scrollHeight;
    do {
        var r = ssc_cache[ssc_uniqueID(e)];
        if (r) {
            return ssc_setCache(t, r);
        }
        t.push(e);
        if (n === e.scrollHeight) {
            if (!ssc_frame || ssc_root.clientHeight + 10 < n) {
                return ssc_setCache(t, document.body);
            }
        } else if (e.clientHeight + 10 < e.scrollHeight) {
            overflow = getComputedStyle(e, "").getPropertyValue("overflow");
            if (overflow === "scroll" || overflow === "auto") {
                return ssc_setCache(t, e);
            }
        }
    } while (e = e.parentNode)
}

function ssc_addEvent(e, t, n) {
    'use strict';
    window.addEventListener(e, t, n || false);
}

function ssc_removeEvent(e, t, n) {
    'use strict';
    window.removeEventListener(e, t, n || false);
}

function ssc_isNodeName(e, t) {
    'use strict';
    return e.nodeName.toLowerCase() === t.toLowerCase();
}

function ssc_directionCheck(e, t) {
    'use strict';
    e = e > 0 ? 1 : -1;
    t = t > 0 ? 1 : -1;
    if (ssc_direction.x !== e || ssc_direction.y !== t) {
        ssc_direction.x = e;
        ssc_direction.y = t;
        ssc_que = [];
    }
}

function ssc_pulse_(e) {
    'use strict';
    var t, n, r;
    e = e * ssc_pulseScale;
    if (e < 1) {
        t = e - (1 - Math.exp(-e));
    } else {
        n = Math.exp(-1);
        e -= 1;
        r = 1 - Math.exp(-e);
        t = n + r * (1 - n);
    }
    return t * ssc_pulseNormalize;
}

function ssc_pulse(e) {
    'use strict';
    if (e >= 1) return 1;
    if (e <= 0) return 0;
    if (ssc_pulseNormalize === 1) {
        ssc_pulseNormalize /= ssc_pulse_(1);
    }
    return ssc_pulse_(e);
}
var overflow = '';
var ssc_framerate = 150;
var ssc_animtime = 500;
var ssc_stepsize = 150;
var ssc_pulseAlgorithm = true;
var ssc_pulseScale = 6;
var ssc_pulseNormalize = 1;
var ssc_keyboardsupport = true;
var ssc_arrowscroll = 50;
var ssc_frame = false;
var ssc_direction = {
    x: 0,
    y: 0
};
var ssc_initdone = false;
var ssc_fixedback = true;
var ssc_root = document.documentElement;
var ssc_activeElement;
var ssc_key = {
    left: 37,
    up: 38,
    right: 39,
    down: 40,
    spacebar: 32,
    pageup: 33,
    pagedown: 34,
    end: 35,
    home: 36
};
var ssc_que = [];
var ssc_pending = false;
var ssc_cache = {};
var currentBrowser = '';
setInterval(function() {
    'use strict';
    ssc_cache = {};
}, 10 * 1e3);
var ssc_uniqueID = function() {
    'use strict';
    var e = 0;
    return function(t) {
        return t.ssc_uniqueID || (t.ssc_uniqueID = e++);
    };
}();
jQuery(document).ready(function(e) {
    'use strict';
    function t() {
        var e = navigator.appName,
            tReg = navigator.userAgent,
            n;
        var r = tReg.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (r && (n = tReg.match(/version\/([\.\d]+)/i)) !== null) r[2] = n[1];
        r = r ? [r[1], r[2]] : [e, navigator.appVersion, "-?"];
        return r[0];
    }
    currentBrowser = t().toLowerCase();

    var useOnWebkit = true;
    var useOnMozilla = true;
    var useOnIE = true;

    var webKit = 'safari;chrome';
    var IE = 'netscape;msie';
    var mozilla = 'firefox';

    var browserName = [(useOnMozilla ? mozilla : ''), (useOnWebkit ? webKit : ''), (useOnIE ? IE : '')].join(';');

    var neededBrowser = browserName.indexOf(currentBrowser) !== -1;

    if (neededBrowser) {
        ssc_addEvent("mousedown", ssc_mousedown);
        if (currentBrowser === 'firefox' || currentBrowser === "msie" || currentBrowser === "netscape") {
            ssc_addEvent("wheel", ssc_wheel);
        } else {
            ssc_addEvent("mousewheel", ssc_wheel);
        }
        ssc_addEvent("load", ssc_init);
    }
});
})(window._$, window._$);
(function (jQuery, $) {
(function ($) {
    'use strict';

    window.initAffix = function initAffix(selector) {
        $('.bd-affix-fake').prev(':not([data-fix-at-screen])').next().remove();

        $(selector).each(function () {
            var element = $(this),
                offset = {},
                cachedOffset = null;

            element.off('.affix');
            element.removeAttr('style');
            element.removeClass($.fn.affix.Constructor.RESET);
            element.removeData('bs.affix');

            offset.top = function () {
                var hasAffix = element.hasClass('affix');

                if (cachedOffset === null && hasAffix) {
                    element.removeClass('affix');
                }

                if (!hasAffix) {
                    var elTop = element.offset().top,
                        offset = parseInt(element.data('offset'), 10) || 0,
                        clipAtControl = element.data('clipAtControl'),
                        fixAtScreen = element.data('fixAtScreen'),
                        elHeight = element.outerHeight();

                    var ev = $.Event('affix-calc.theme.affix');
                    element.trigger(ev);
                    ev.offset = ev.offset || 0;
                    offset += ev.offset;

                    if (clipAtControl === 'bottom') {
                        elTop += elHeight;
                    }

                    if (fixAtScreen === 'bottom') {
                        elTop += offset;
                        elTop -= $(window).height();
                    }

                    if (fixAtScreen === 'top') {
                        elTop -= offset;
                    }

                    cachedOffset = elTop;
                }

                if (cachedOffset === null && hasAffix) {
                    element.addClass('affix');
                }

                return cachedOffset;
            };

            element.on('affix.bs.affix', function (e) {
                var el = $(this),
                    fake = el.next('.bd-affix-fake');

                if (!fake.is(':visible')) {
                    e.preventDefault();
                    return;
                }

                if (['absolute', 'fixed'].indexOf(el.css('position')) === -1) {
                    fake.css('height', el.outerHeight(true));
                }

                // fix affix position
                var body = $('body');
                var bodyWidth = body.outerWidth() || 1;
                var elWidth = el.outerWidth();
                var elLeft = el.offset().left;
                el.css('width', (el.outerWidth() / bodyWidth * 100) + '%');

                if (bodyWidth / 2 > (elLeft + elWidth / 2)) {
                    el.css('left', (elLeft / bodyWidth * 100) + '%');
                    el.css('right', 'auto');
                } else {
                    el.css('right', ((bodyWidth - elLeft - elWidth) / bodyWidth * 100) + '%');
                    el.css('left', 'auto');
                }

                var offset = parseInt(element.data('offset'), 10) || 0;
                var ev = $.Event('affix-calc.theme.affix');
                el.trigger(ev);
                ev.offset = ev.offset || 0;
                offset += ev.offset;

                if (element.data('fixAtScreen') === 'bottom') {
                    el.css('top', 'auto');
                    el.css('bottom', offset + 'px');
                } else {
                    el.css('top', offset + 'px');
                    el.css('bottom', 'auto');
                }
            });

            element.on('affixed-top.bs.affix', function () {
                $(this).next('.bd-affix-fake').removeAttr('style');
                $(this).removeAttr('style');
            });

            if (!element.next('.bd-affix-fake').length) {
                element.after('<div class="bd-affix-fake"></div>');
            }

            $('body').trigger($.Event('affix-init.theme.affix'), [element]);

            element.affix({
                'offset': offset
            });

            element.affix('checkPosition');
        });
    };

    $(function ($) {
        var affixTimeout;

        $(window).on('resize', function () {
            clearTimeout(affixTimeout);
            affixTimeout = setTimeout(function () {
                window.initAffix('[data-affix]');
            }, 100);
        });

        window.initAffix('[data-affix]');
    });
})(jQuery);
})(window._$, window._$);
(function (jQuery, $) {

window.ThemeLightbox = (function ($) {
    'use strict';
    return (function ThemeLightbox(selectors) {
        var selector = selectors;
        var images = $(selector);
        var current;
        var close = function () {
            $(".bd-lightbox").remove();
        };
        this.init = function () {

            $(selector).mouseup(function (e) {
                if (e.which && e.which !== 1) {
                    return;
                }
                current = images.index(this);
                var imgContainer = $('.bd-lightbox');
                if (imgContainer.length === 0) {
                    imgContainer = $('<div class="bd-lightbox">').css('line-height', $(window).height() + "px")
                        .appendTo($("body"));
                    var closeBtn = $('<div class="close"><div class="cw"> </div><div class="ccw"> </div><div class="close-alt">&#10007;</div></div>');
                    closeBtn.appendTo(imgContainer);
                    closeBtn.click(close);
                    showArrows();
                    var scrollDelay = 100;
                    var lastScroll = 0;
                    imgContainer.bind('mousewheel DOMMouseScroll', function (e) {
                        var date  =  new Date();
                        if (date.getTime() > lastScroll + scrollDelay) {
                            lastScroll = date.getTime();
                            var orgEvent = window.event || e.originalEvent;
                            var delta = (orgEvent.wheelDelta ? orgEvent.wheelDelta : orgEvent.detail * -1) > 0 ? 1 : -1;
                            move(current + delta);
                        }
                        e.preventDefault();
                    }).mousedown(function (e) {
                            // close on middle button click
                            if (e.which === 2) {
                                close();
                            }
                            e.preventDefault();
                     });
                }
                move(current);
            });
        };

        function move(index) {

            if (index < 0 || index >= images.length) {
                return;
            }

            showError(false);

            current = index;

            $(".bd-lightbox .lightbox-image:not(.active)").remove();

            var active = $(".bd-lightbox .active");
            var target = $('<img class="lightbox-image" alt="" src="' + getFullImgSrc($(images[current])) + '" />').click(function () {
                if ($(this).hasClass("active")) {
                    move(current + 1);
                }
            });

            if (active.length > 0) {
                active.after(target);
            } else {
                $(".bd-lightbox").append(target);
            }

            showArrows();
            showLoader(true);

            $(".bd-lightbox").add(target);

            target.load(function () {
                showLoader(false);
                active.removeClass("active");
                target.addClass("active");
            });

            target.error(function () {
                showLoader(false);
                active.removeClass("active");
                target.addClass("active");
                target.attr("src", $(images[current]).attr("src"));
                target.unbind('error');
            });
        }

        function showArrows() {
            if ($(".bd-lightbox .arrow").length === 0) {
                var topOffset = $(window).height() / 2 - 40;
                $(".bd-lightbox")
                    .append(
                        $('<div class="arrow left"><div class="arrow-t ccw"> </div><div class="arrow-b cw"> </div><div class="arrow-left-alt">&#8592;</div></div>')
                            .css("top", topOffset)
                            .click(function () {
                                move(current - 1);
                            })
                    )
                    .append(
                        $('<div class="arrow right"><div class="arrow-t cw"> </div><div class="arrow-b ccw"> </div><div class="arrow-right-alt">&#8594;</div></div>')
                            .css("top", topOffset)
                            .click(function () {
                                move(current + 1);
                            })
                    );
            }

            if (current === 0) {
                $(".bd-lightbox .arrow.left").addClass("disabled");
            } else {
                $(".bd-lightbox .arrow.left").removeClass("disabled");
            }

            if (current === images.length - 1) {
                $(".bd-lightbox .arrow.right").addClass("disabled");
            } else {
                $(".bd-lightbox .arrow.right").removeClass("disabled");
            }
        }

        function showError(enable) {
            if (enable) {
                $(".bd-lightbox").append($('<div class="lightbox-error">The requested content cannot be loaded.<br/>Please try again later.</div>')
                    .css({ "top": $(window).height() / 2 - 60, "left": $(window).width() / 2 - 170 }));
            } else {
                $(".bd-lightbox .lightbox-error").remove();
            }
        }

        function showLoader(enable) {
            if (!enable) {
                $(".bd-lightbox .loading").remove();
            }
            else {
                $('<div class="loading"> </div>').css({ "top": $(window).height() / 2 - 16, "left": $(window).width() / 2 - 16 }).appendTo($(".bd-lightbox"));
            }
        }

        function getFullImgSrc(image) {
            var largeImage = '';
            var parentLink = image.parent('a');
            if (parentLink.length) {
                parentLink.click(function (e) {
                    e.preventDefault();
                    });
                largeImage = parentLink.attr('href');
            } else {
                var src = image.attr("src");
                var fileName = src.substring(0, src.lastIndexOf('.'));
                var ext = src.substring(src.lastIndexOf('.'));
                largeImage = fileName + "-large" + ext;
            }
            return largeImage;
        }
    });
})(jQuery);


jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-lightbox, .lightbox').init();
});
})(window._$, window._$);
window.ProductOverview_Class = "bd-productoverview";
(function (jQuery, $) {
jQuery(function($) {
    'use strict';
    function makeCloudZoom1() {
        if ($('.bd-productimage-6 a').length > 0) {
            $('.bd-productimage-6 a').attr('id', 'cloud-zoom-effect-1').addClass('cloud-zoom');
            $('.bd-productimage-6 a').attr('rel', "position:'right', adjustX:0, adjustY:0, tint:'#ffffff', softFocus:1, smoothMove:1, tintOpacity:0.5");

            if ('undefined' !== typeof window.ProductOverview_Class && 'undefined' !== typeof window.ImageThumbnails_Class) {
                var parent = $('.bd-productimage-6')
                            .closest('[class*=" ' + window.ProductOverview_Class + '"], [class^="' + window.ProductOverview_Class + '"]'),
                    thumbnails = $('[class*=" ' + window.ImageThumbnails_Class + '"], [class^="' + window.ImageThumbnails_Class + '"]', parent);

                if (thumbnails.length > 0) {
                    $('a', thumbnails).each(function () {
                        var thumbnail = $(this),
                            rel = thumbnail.attr('rel'),
                            relAttr = (rel === '' ? '' : rel + ',') + "useZoom: 'cloud-zoom-effect-1'";
                        thumbnail.attr('rel', relAttr).addClass('cloud-zoom-gallery');
                    });
                }
            }

            var parent = $(".bd-productimage-6").parents().filter(function (key, value) {
                return parseInt($(value).css('z-index'), 10).toString() !== 'NaN';
            });

            var minZIndex = 100;
            var zIndex = parent.length > 0 ? parseInt($(parent[0]).css('z-index'), 10) + 1 : 1;
            zIndex = zIndex < minZIndex ? minZIndex : zIndex;

            $('<style type="text/css"> .bd-productimage-6 .mousetrap { z-index: ' + zIndex + '!important;} </style>').appendTo("head");

            $('#cloud-zoom-effect-1, .cloud-zoom-gallery').CloudZoom();
        }
    }
    makeCloudZoom1();
    var resizeTimeout;
    $(window).resize(function(){
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(makeCloudZoom1, 25);
    });
});
})(window._$, window._$);
(function (jQuery, $) {
window.ImageThumbnails_Class = 'bd-imagethumbnails';
jQuery(function () {
    'use strict';
    /* 'active' must be always specified, otherwise slider would not be visible */
    jQuery('.bd-imagethumbnails-1.carousel.slide').each(function () {
        var slider = jQuery(this);
        if (!slider || !slider.length){
            return;
        }

        slider.data('resize', function () {
            jQuery('.carousel-inner', slider).equalImageHeight();
        });

        slider.data('resize')();

        jQuery('.left-button .bd-carousel', slider)
            .attr('href', '#')
            .click(function() {
                slider.carousel('prev');
                return false;
        });

        jQuery('.right-button .bd-carousel', slider)
            .attr('href', '#')
            .click(function() {
                slider.carousel('next');
                return false;
        });
    });
});
})(window._$, window._$);
(function (jQuery, $) {
jQuery(function($) {

	var hash = window.location.hash;
	if (hash.toLowerCase().indexOf("comment-") >= 0) {
		$('li.reviews_tab>a').tab('show');
	}

	// Star ratings for comments
	var ratingFacade = $('<div class="data-control-id-3239 bd-rating">'+ new Array(6).join('<span class="data-control-id-3238 bd-icon-3"></span>') + '</div>');
	$('#rating_1').hide().before(ratingFacade);
	ratingFacade.find('span.bd-icon-3').click(function(){
		var star = $(this);
		var stars = star.parent().children('span.bd-icon-3');
		stars.removeClass('active');
		for (var i = 0; i < stars.length; i++) {
			$(stars[i]).addClass('active')
			if (stars[i] == this){
				$('#rating_1').val( i + 1 );
				break;
			}
		}
		return false;
	}).hover(
		function(){
			var star = $(this);
			var stars = star.parent().children('span.bd-icon-3');
			stars.removeClass('hovered');
			for (var i = 0; i < stars.length; i++) {
				$(stars[i]).addClass('hovered')
				if (stars[i] == this){
					break; 
				}
			}
		}, 
		function(){
			$(this).parent().children('span.bd-icon-3').removeClass('hovered');
		}
	);
	
	$('#review_form_1').submit(function() {
		var rating = $('#rating_1').val();
		if ($('#rating_1').size() > 0 && !rating && woocommerce_params.review_rating_required === 'yes') {
			alert(woocommerce_params.i18n_required_rating_text);
			return false;
		}

        var textarea = $('#comment_area_1');
        if (textarea.size() > 0 && !textarea.val().trim()) {
            alert(woocommerce_params.i18n_required_comment_text);
            return false;
        }
	});
});
})(window._$, window._$);
(function (jQuery, $) {
jQuery(function($) {
    'use strict';

    var activeLayoutType = $.cookie('layoutType') || 'grid',
        activeLayoutTypeSelector = $.cookie('layoutSelector') || '.separated-item-4.grid';

    var layoutTypes = [];
    
        layoutTypes.push({
            name:'bd-griditemgrid',
            iconUrl: '',
            iconDataId: '2470',
            iconClassNames: 'bd-icon-65'
        });
        layoutTypes.push({
            name:'bd-griditemlist',
            iconUrl: '',
            iconDataId: '2485',
            iconClassNames: 'bd-icon-66'
        });
    if (typeof window.buildTypeSelector === 'function') {
        window.buildTypeSelector(layoutTypes, $('.bd-productsgridbar-35'));
    }

    
        $(document).on('click', '.bd-products i[data-layout-name="bd-griditemgrid"]', function (e) {
            if (activeLayoutType !== 'grid') {
                var grid = $('.bd-grid-45');
                grid.find('.separated-item-4.grid').css('display', 'block');
                grid.find(activeLayoutTypeSelector).css('display', 'none');
                activeLayoutType = 'grid';
                activeLayoutTypeSelector = '.separated-item-4.grid';

                $.cookie('layoutType', activeLayoutType, { path: '/' });
                $.cookie('layoutSelector', activeLayoutTypeSelector, { path: '/' });
            }
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
        $(document).on('click', '.bd-products i[data-layout-name="bd-griditemlist"]', function (e) {
            if (activeLayoutType !== 'list') {
                var grid = $('.bd-grid-45');
                grid.find('.separated-item-5.list').css('display', 'block');
                grid.find(activeLayoutTypeSelector).css('display', 'none');
                activeLayoutType = 'list';
                activeLayoutTypeSelector = '.separated-item-5.list';

                $.cookie('layoutType', activeLayoutType, { path: '/' });
                $.cookie('layoutSelector', activeLayoutTypeSelector, { path: '/' });
            }
            e.preventDefault();
            e.stopPropagation();
            return false;
        });

});
})(window._$, window._$);
(function (jQuery, $) {
buildTypeSelector = function(layouts, area) {
    layouts.map(function(layout) {
        var a = document.createElement('a'),
            i = document.createElement('i');
        jQuery(i).addClass(layout.iconClassNames).addClass('data-control-id-' + layout.iconDataId);
        jQuery(i).attr('data-layout-name', layout.name);
        jQuery(a).attr('href', '##').append(i);
        jQuery(a).each(function() { this.style.textDecoration = 'none'; });
        (area || jQuery).find('.bd-typeselector-1').append(a);
    });
}
})(window._$, window._$);
(function (jQuery, $) {
jQuery(function ($) {
    'use strict';

    function getFloat(value){
        return parseFloat(value.replace('px', ''))  ;
    }

    $('.bd-productsslider-1').each(function () {
        var slider = $(this).find('.carousel.slide');
        slider.carousel({ interval: 3000, pause: "", wrap: false});

        var leftButton = $('.left-button', slider);
        var rightButton = $('.right-button', slider);

        
            var blockSelector = '.bd-block',
                blockHeaderSelector = '.bd-container-58';
            if ($(blockSelector, this).length > 0 && $(blockHeaderSelector, this).length > 0)
            {
                var block = $(blockSelector, this),
                    blockHeader = block.find(blockHeaderSelector),
                    blockHeaderTitle = blockHeader.children('h4');

                blockHeader.css('min-height', '35px');
                blockHeader.css('position', 'relative');

                var navigationWrapper = $('<div class="bd-top-navigation-wrapper"></div>');
                blockHeaderTitle.addClass('bd-top-navigation');
                blockHeaderTitle.append(navigationWrapper);

                leftButton.appendTo(navigationWrapper);
                rightButton.appendTo(navigationWrapper);
            }

        leftButton.find('.bd-carousel-2').click(function() {
            slider.carousel('prev');
            return false;
        }).attr('href', '#');

        rightButton.find('.bd-carousel-2').click(function() {
            slider.carousel('next');
            return false;
        }).attr('href', '#');

        
            slider.carousel('pause');
    });
});
})(window._$, window._$);
(function (jQuery, $) {
(function ($) {
    'use strict';

    var timeout;
    $(window).on('resize', function () {
        clearTimeout(timeout);
        timeout = setTimeout(stretchToBottom, 25);
    });

    $(stretchToBottom);

    function stretchToBottom() {
        var bh, mh = 0;
        var parent;

        var c = $('.bd-stretch-to-bottom');
        var target = c.find(c.data('controlSelector'))
            .add(c.find(c.data('controlSelector') + ' .bd-stretch-inner').first());

        if (target.length === 0) {
            return;
        }

        target.removeAttr('style');
        bh = $('body').height();

        $('body').children().each(function() {
            var $node = $(this);
            if ($node.css('position') !== 'absolute' && $node.css('position') !== 'fixed') {
                mh += $node.outerHeight(true);
                if ($.contains(this, target[0]) || this === target[0]) {
                    parent = $node;
                }
            }
        });

        if (mh < bh && parent) {
            var r = bh - mh;
            target.css('min-height', (target.outerHeight(true) + r) + 'px');
        }
    }

})(jQuery);
})(window._$, window._$);
(function (jQuery, $) {
jQuery(function ($) {
    'use strict';

    $('.bd-smoothscroll-1 a[href*="#"]').each(function () {
        var href = $(this).attr('href');
        if (href.indexOf(window.location.href) === 0) {
            href = href.replace(window.location.href, '');
            if (href.charAt(0) === '#') {
                $(this).attr('href', href);
            }
        }
    });
});

jQuery(function ($) {
    'use strict';

    $('.bd-smoothscroll-1 a[href^="#"]:not([data-toggle="collapse"])').on('click', function(e) {
        var animationTime = parseInt($('.bd-smoothscroll-1').data('animationTime'), 10) || 0;
        var target = this.hash;
        var link = $(this);
        e.preventDefault();

        $('body').data('scroll-animating', true);
        var targetElement = $(target || 'body');

        link.trigger($.Event('theme.smooth-scroll.before'));

        $('html, body').animate({
            scrollTop: targetElement.offset().top
        }, animationTime, function() {
            $('body').data('scroll-animating', false);
            window.location.hash = target;
            if (targetElement.is(':not(body)') && $('body').data('bs.scrollspy')) {
                link.parent('li').siblings('li').children('a').removeClass('active');
                link.addClass('active');
            }
            link.trigger($.Event('theme.smooth-scroll.after'));
        });
    });
});
})(window._$, window._$);
(function (jQuery, $) {

jQuery(function ($) {
    'use strict';
    // hide #back-top first
    $(".bd-backtotop-1").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.bd-backtotop-1').fadeIn().css('display', 'block');
            } else {
                $('.bd-backtotop-1').fadeOut();
            }
        });
    });
});

})(window._$, window._$);
(function (jQuery, $) {
jQuery(function ($) {
    'use strict';

    $('.bd-smoothscroll-3 a[href*="#"]').each(function () {
        var href = $(this).attr('href');
        if (href.indexOf(window.location.href) === 0) {
            href = href.replace(window.location.href, '');
            if (href.charAt(0) === '#') {
                $(this).attr('href', href);
            }
        }
    });
});

jQuery(function ($) {
    'use strict';

    $('.bd-smoothscroll-3 a[href^="#"]:not([data-toggle="collapse"])').on('click', function(e) {
        var animationTime = parseInt($('.bd-smoothscroll-3').data('animationTime'), 10) || 0;
        var target = this.hash;
        var link = $(this);
        e.preventDefault();

        $('body').data('scroll-animating', true);
        var targetElement = $(target || 'body');

        link.trigger($.Event('theme.smooth-scroll.before'));

        $('html, body').animate({
            scrollTop: targetElement.offset().top
        }, animationTime, function() {
            $('body').data('scroll-animating', false);
            window.location.hash = target;
            if (targetElement.is(':not(body)') && $('body').data('bs.scrollspy')) {
                link.parent('li').siblings('li').children('a').removeClass('active');
                link.addClass('active');
            }
            link.trigger($.Event('theme.smooth-scroll.after'));
        });
    });
});
})(window._$, window._$);
(function (jQuery, $) {



jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-3 img:not(.no-lightbox)').init();
});
})(window._$, window._$);
(function (jQuery, $) {



jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-2 img:not(.no-lightbox)').init();
});
})(window._$, window._$);
(function (jQuery, $) {



jQuery(function () {
    'use strict';
    new window.ThemeLightbox('.bd-postcontent-1 img:not(.no-lightbox)').init();
});
})(window._$, window._$);