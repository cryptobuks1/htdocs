<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$base_template_dir = get_template_directory();
load_template($base_template_dir . '/export/Chunk.php');
load_template($base_template_dir . '/export/PreviewHelper.php');
load_template($base_template_dir . '/export/filesHelper.php');
load_template($base_template_dir . '/export/editorHelper.php');
load_template($base_template_dir . '/export/themeHelper.php');
if (file_exists($base_template_dir . '/export/archive.php')) {
    load_template($base_template_dir . '/export/archive.php');
}
if (file_exists($base_template_dir . '/export/export-actions.php')) {
    load_template($base_template_dir . '/export/export-actions.php');
}
function theme_add_billion_menu() {
    global $menu;
    $menu_slug = theme_get_editor_link();
    $capability = 'edit_themes';
    $menu['58.91'] = array( '', $capability, 'separator-billion', '', 'wp-menu-separator billion' );
    $menu['58.95'] = array( __('Themler', THEME_NS), $capability, $menu_slug, '', 'menu-top menu-icon-billion', 'menu-billion', 'div' );
}
add_action('_network_admin_menu', 'theme_add_billion_menu');
add_action('_user_admin_menu', 'theme_add_billion_menu');
add_action('_admin_menu', 'theme_add_billion_menu');

function theme_remove_customize_link($prepared_themes) {
    $current_theme = get_stylesheet();
    if (isset($prepared_themes[$current_theme])) {
        $theme_data = &$prepared_themes[ $current_theme ];
        $theme_data['actions']['customize'] = theme_get_editor_link();
        $preview_theme = $current_theme . '_preview';
        if (isset($prepared_themes[$preview_theme ])) {
            unset($prepared_themes[$preview_theme]);
        }
    }
    return $prepared_themes;
}
add_filter('wp_prepare_themes_for_js', 'theme_remove_customize_link');

global $theme_editor_messages;
if (!file_exists(get_template_directory() . '/export/project.json')) {
    theme_add_error($theme_editor_messages['preview_edit']);
}

$php_version = phpversion();
$required_php_version = '5.3.0';
if ($php_version && version_compare($php_version, $required_php_version, '<')) {
    theme_add_error(sprintf($theme_editor_messages['php_compatibility'], $required_php_version, $php_version));
}

function theme_get_preview_theme_name($theme_name) {
    return $theme_name . ' (Preview)';
}

function theme_activation_function() {
    $base_template_dir = get_template_directory();
    $preview_template_dir = $base_template_dir . '_preview';

    $path = $base_template_dir . '/preview';
    $template = get_template();
    $preview_template = $template . '_preview';
    $theme_root = get_theme_root( $template );
    $inner_template = $path . '/' . $preview_template;

    if (!is_dir($path) || !is_dir($inner_template)) {
        return;
    }

    try {
        FilesHelper::test_permission($theme_root);

        FilesHelper::empty_dir($preview_template_dir, true);
        FilesHelper::rename($inner_template, $preview_template_dir);
        FilesHelper::empty_dir($path, true);
    } catch(PermissionDeniedException $e) {
        theme_add_error('You do not have permission to write to this directory: ' . $theme_root);
    }
}
add_action('after_switch_theme', 'theme_activation_function');


function theme_deactivation_function() {
    $theme_root = get_theme_root();
    $template = get_option('theme_switched');

    $base_template_dir = $theme_root . '/' . $template;
    $preview_template_dir = FilesHelper::normalize_path($base_template_dir . '_preview');

    if (!is_dir($base_template_dir) || !is_dir($preview_template_dir)) {
        return ;
    }

    $path = $base_template_dir . '/preview/' . $template . '_preview';

    try {
        FilesHelper::test_permission($preview_template_dir);
        FilesHelper::empty_dir($base_template_dir . '/preview', true);
    } catch (PermissionDeniedException $e) {
        wp_die(str_replace('{folders}', '<ol><li>' . implode('</li><li>', theme_get_permissions_check_folders()) . '</li></ol>', $e->getExtendedMessage()));
    }

    FilesHelper::create_dir($base_template_dir . '/preview');
    FilesHelper::rename($preview_template_dir, $path);
}
add_action('switch_theme', 'theme_deactivation_function');


function theme_print_billion_menu_styles() {
?>
    <style>
        #adminmenu .menu-icon-billion div.wp-menu-image {
            background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/static/billon-themes.png');
            background-position:50% 55%;
            background-repeat: no-repeat;
        }

        #adminmenu .menu-icon-billion:hover div.wp-menu-image,
        #adminmenu .menu-icon-billion.wp-has-current-submenu div.wp-menu-image,
        #adminmenu .menu-icon-billion.current div.wp-menu-image {
            background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/static/billon-themes.png');
            opacity: 0.85;
        }
    </style>
<?php
}
add_action('admin_print_styles', 'theme_print_billion_menu_styles');

function theme_print_billion_menu_scripts() {
?>
    <script>
        jQuery(function() {
            jQuery('#menu-billion a:not(.wp-first-item)').attr('target', '_blank');
        });
    </script>
<?php
}
add_action('admin_head', 'theme_print_billion_menu_scripts');

function theme_add_billion_submenu() {
    global $submenu;
    $menu_slug = theme_get_editor_link();
    $capability = 'edit_themes';
    $submenu[$menu_slug][10] = array(__('Run Themler', THEME_NS), $capability, $menu_slug);
    $submenu[$menu_slug][12] = array(__('Forums & Answers', THEME_NS), $capability, 'http://answers.themler.com/Questions');
    $submenu[$menu_slug][13] = array(__('Tutorials', THEME_NS), $capability, 'http://answers.themler.com/articles/4695');
    $submenu[$menu_slug][14] = array(__('More themes', THEME_NS), $capability, 'http://billionthemes.com/Themes/Index?Search.Cms=3&Search.Themler=True');
    return true;
}
add_action('custom_menu_order', 'theme_add_billion_submenu');

function theme_add_export_option_page() {
    add_theme_page(__('Billion Themler', THEME_NS), __('Billion Themler', THEME_NS), 'edit_themes', 'theme_editor', 'theme_editor');
    global $submenu;
    if (is_array($submenu['themes.php'])) {
        foreach($submenu['themes.php'] as $key => $value) {
            if (in_array('theme_editor', $value)) {
                unset($submenu['themes.php'][$key]);
                break;
            }
        }
    }
}
add_action('admin_menu', 'theme_add_export_option_page');

function theme_editor() {
    $base_template_dir = get_template_directory();
    load_template($base_template_dir . '/export/editor.php');
    die();
}
add_action('load-appearance_page_theme_editor', 'theme_editor');

if (!function_exists('theme_verify_nonce_and_login_user')) {
    function theme_verify_nonce_and_login_user() {
        $uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : 0;
        $nonce = isset($_REQUEST['_ajax_nonce']) ? $_REQUEST['_ajax_nonce'] : $_REQUEST['_wpnonce'];
        if (false !== wp_verify_nonce($nonce, 'theme_template_export')){
            wp_clear_auth_cookie();
            wp_set_auth_cookie($uid);
            wp_set_current_user($uid);
            return true;
        }
        return false;
    }
}

function theme_handle_bad_request($error = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request', true, 400);
    if (is_wp_error($error))
        die($error->get_error_code() . ', ' . $error->get_error_message());
    die('400 Bad Request');
}

function theme_nopriv_export_wrapper()
{
    if (theme_verify_nonce_and_login_user()){
        theme_export_wrapper();
    }
    die('session_error');
}

function theme_export_wrapper()
{
    $action = isset( $_REQUEST[ 'action' ] )  ?  $_REQUEST[ 'action' ] : null;
    if (apply_filters('theme_check_ajax_referer', true, $action)) {
        if (!isset($_REQUEST['uid'])) {
            // may be post_max_size exceeded
            theme_handle_bad_request();
        }
        check_ajax_referer('theme_template_export');
    }
    ProviderLog::start($action);

    if (null !== $action && is_callable($action)) {
        $check_folders = theme_get_permissions_check_folders();
        theme_check_memory_limit(false);
        try {
            foreach ($check_folders as $path)
                FilesHelper::test_permission($path);

            $base_upload_dir = wp_upload_dir();
            if (false !== $base_upload_dir['error'])
                throw new Exception('Upload folder error!');

            if (!defined('PCLZIP_TEMPORARY_DIR'))
                define('PCLZIP_TEMPORARY_DIR', FilesHelper::normalize_path($base_upload_dir['basedir']) . '/');

            $result = call_user_func($action);
            if ($result && is_array($result)){
                ProviderLog::end($action);
                $result['log'] = ProviderLog::getLog();
                $result['errors'] = ProviderLog::getErrors();
                echo json_encode($result);
            } // TODO else exception
        } catch(PermissionDeniedException $e) {
            $msg = str_replace('{folders}', '<ol><li>' . implode('</li><li>', $check_folders) . '</li></ol>', $e->getExtendedMessage());
            echo '[permission_denied]' . $msg . '[permission_denied]';
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        die;
    }
    die('invalid_action');
}

function theme_add_export_action($function_name){
    if (is_callable($function_name)) {
        add_action('wp_ajax_nopriv_'. $function_name, 'theme_nopriv_export_wrapper', 9);
        add_action('wp_ajax_' . $function_name, 'theme_export_wrapper', 9);
    }
}

function theme_template_clear()
{
    $chunk = new Chunk();
    $chunk->clear_chunk_directory();
    echo '1';
}
theme_add_export_action('theme_template_clear');

function theme_update_preview()
{
    $base_template_dir = get_template_directory();
    $preview_template_dir = FilesHelper::normalize_path($base_template_dir . '_preview');

    $helper = new PreviewHelper();
    $changed_files = theme_get_preview_changed_files();
    ProviderLog::start('Process files');
    if ($changed_files === null || !file_exists($preview_template_dir)) {
        // full copy
        FilesHelper::empty_dir($preview_template_dir, true);
        FilesHelper::copy_recursive($base_template_dir, $preview_template_dir, array($helper, "restoreDataId"));
        FilesHelper::remove_file($preview_template_dir . '/export/project.json');
    } else {
        // copy only changed files
        foreach($changed_files as $file){
            $file_path = $preview_template_dir . $file;
            if (file_exists($base_template_dir . $file)) {
                FilesHelper::copy_recursive($base_template_dir . $file, $file_path, array($helper, "restoreDataId"));
            } else {
                FilesHelper::remove_file($file_path);
            }
        }
        theme_set_preview_changed_files(array());
    }
    ProviderLog::end('Process files');
    FilesHelper::empty_dir($preview_template_dir . '/preview', true);
    theme_set_name($preview_template_dir . '/style.css', theme_get_preview_theme_name(get_template()));
    FilesHelper::remove_empty_subfolders($preview_template_dir);

    if (is_multisite()) {
        $allowed_themes = get_site_option('allowedthemes');
        if (is_array($allowed_themes)) {
            $allowed_themes[get_stylesheet() . '_preview'] = true;
            update_site_option('allowedthemes', $allowed_themes);
        }
    }

    return array('result' => 'done');
}
theme_add_export_action('theme_update_preview');

// deprecated
function theme_get_theme()
{
    echo theme_get_archive_data();
}
theme_add_export_action('theme_get_theme');

function theme_get_zip()
{
    $archive_file = theme_get_theme_archive();
    if (!is_readable($archive_file))
        throw new PermissionDeniedException($archive_file);
    echo base64_encode(file_get_contents($archive_file));
    FilesHelper::remove_file($archive_file);
}
theme_add_export_action('theme_get_zip');

function theme_get_chunk_info() {
    return array(
        'id' => isset($_POST['id']) ? $_POST['id'] : '',
        'content' => isset($_POST['content']) ? stripslashes_deep($_POST['content']) : '',
        'current' => isset($_POST['current']) ? $_POST['current'] : '',
        'total' => isset($_POST['total']) ? $_POST['total'] : '',
        'encode' => !empty($_POST['encode']),
        'blob' => !empty($_POST['blob'])
    );
}

function theme_template_export()
{
    if (!isset($_POST['info'])) {
        $info = theme_get_chunk_info();
    } else {
        $info = json_decode(stripslashes_deep($_POST['info']), true);
    }

    if (is_null($info)) {
        error_log(sprintf(admin_url() . ' Invalid info; info: %s; json_last_error: %s', $_POST['info'], json_last_error()));
        throw new Exception('Invalid info');
    }

    $chunk = new Chunk();
    if (is_wp_error($error = $chunk->save($info))) {
        theme_handle_bad_request($error);
    }
    if ($chunk->last()) {
        // merge and decode content
        $content = $chunk->complete();
        ProviderLog::start('json_decode');
        $content = json_decode($content, true);
        ProviderLog::end('json_decode');
        $theme          = isset($content['themeFso'])     ? $content['themeFso']     : null;
        $images         = isset($content['images'])       ? $content['images']       : null;
        $fonts          = isset($content['iconSetFiles']) ? $content['iconSetFiles'] : null;

        $base_template_dir = get_template_directory();
        $template_dir = FilesHelper::normalize_path($base_template_dir . '_preview');
        theme_export($theme, $images, $fonts, $base_template_dir, $template_dir);
        return array('result' => 'done');
    }
    return array('result' => 'processed');
}
theme_add_export_action('theme_template_export');

function theme_set_name($path, $theme_name)
{
    ProviderLog::start('theme_set_name');
    if (file_exists($path)) {
        $content = file_get_contents($path);
        if (false === $content)
            throw new PermissionDeniedException($path);
        if (false === file_put_contents($path, preg_replace('|(Theme Name:) (.*)$|m', '$1 ' . $theme_name, $content)))
            throw new PermissionDeniedException($path);
    }
    ProviderLog::end('theme_set_name');
}

function theme_export($theme, $images, $fonts, $base_template_dir, $template_dir)
{
    $dir = $template_dir;

    $images_dir = $dir . '/images';
    $fonts_dir = $dir . '/fonts';

    $changed_files = theme_get_preview_changed_files();

    if (!is_array($changed_files))
        $changed_files = array();

    if (!theme_is_converted() && file_exists($template_dir . '/export/converter.data')) {
        FilesHelper::empty_dir($template_dir, true);
        $changed_files = array();
    }

    $replace_data = array();
    $replace_data = array_merge_recursive($replace_data, (array)process_images($images, $images_dir, $changed_files));
    $replace_data = array_merge_recursive($replace_data, (array)process_fonts($fonts, $fonts_dir, $changed_files));
    ProviderLog::start('copy_fso_to_fs');
    copy_fso_to_fs($theme, $dir, $changed_files, $replace_data);
    ProviderLog::end('copy_fso_to_fs');
    theme_set_name($dir . '/style.css', theme_get_preview_theme_name(get_template()));
    $changed_files[] = $dir . '/style.css';
    theme_set_preview_changed_files($changed_files);
}

function copy_fso_to_fs($fso, $path, &$changed_files, &$replace_data)
{
    if (is_array($fso) && is_array($fso['items'])) {
        FilesHelper::create_dir($path);
        foreach ($fso['items'] as $name => $file) {
            if (isset($file['content']) && isset($file['type'])) {
                $to = $path . '/' . $name;
                $content = $file['type'] == 'text' ? $file['content'] : base64_decode($file['content']);
                process_file($to, $content, $replace_data);
                $changed_files[] = $to;
            } elseif (isset($file['items']) && isset($file['type'])) {
                copy_fso_to_fs($file, $path . '/' . $name, $changed_files, $replace_data);
            }
        }
    }
}

function theme_get_image_name($id) {
    return preg_replace('/[^a-z0-9_\.]/i', '', $id);
}

function process_images($images, $images_dir, &$changed_files)
{
    ProviderLog::start('process_images');
    $result = null;
    if (isset($images) && is_array($images)) {
        $ids = array();
        $paths = array();

        FilesHelper::create_dir($images_dir);
        foreach ($images as $id => $content) {
            $image_filename = theme_get_image_name($id);
            $image_path = $images_dir . '/' . $image_filename;
            if ($content) {
                $changed_files[] = $image_path;
                if ($content === '[DELETED]') {
                    FilesHelper::remove_file($image_path);
                    continue;
                }
                if (false === file_put_contents($image_path,  base64_decode($content)))
                    throw new PermissionDeniedException($image_path);
            }
            $ids[] = 'url(' . $id . ')';
            $paths[] = 'url(images/' . $image_filename . ')'; // css path
        }
        $result = array('ids' => $ids, 'paths' => $paths);
    }
    ProviderLog::end('process_images');
    return $result;
}

function process_fonts($fonts, $fonts_dir, &$changed_files)
{
    ProviderLog::start('process_fonts');
    $result = null;
    if (isset($fonts)) {
        FilesHelper::create_dir($fonts_dir);
        foreach ($fonts as $name => $content) {
            $file_path = $fonts_dir . '/' . $name;
            if (false === file_put_contents($file_path, base64_decode($content)))
                throw new PermissionDeniedException($file_path);
            $changed_files[] = $file_path;
        }

        $existing_fonts = scandir($fonts_dir);
        $ids = array();
        $paths = array();
        foreach($existing_fonts as $filename) {
            if ($filename !== '.' && $filename !== '..') {
                $ids[] = '"' . $filename . '"';
                $paths[] = '"' . 'fonts/' . $filename . '"';
            }
        }
        $result = array('ids' => $ids, 'paths' => $paths);
    }
    ProviderLog::end('process_fonts');
    return $result;
}

function process_file($path, $content, &$replace_data)
{
    $info = pathinfo($path);
    if ($content === '[DELETED]') {
        FilesHelper::remove_file($path);
        return;
    }

    $file_ext = isset($info['extension']) && $info['extension'] ? $info['extension'] : '';

    if ('css' == $file_ext) {
        $content = str_replace($replace_data['ids'], $replace_data['paths'], $content);
    } elseif (in_array($file_ext, array('php'))) {
        foreach ($replace_data['ids'] as $key => $value) { // replace <img src="url(id)"> to <img src="$url">
            $to = preg_replace('/url\((.+)\)/', '$1', $replace_data['paths'][$key]);
            $content = str_replace($value, '<?php echo theme_get_image_path(\'' . $to . '\'); ?>', $content);
        }
        $content = preg_replace('#url\((https?://[^\)]+)\)#', '$1', $content);
    }
    if (false === file_put_contents($path, $content))
        throw new PermissionDeniedException($path);
}

function theme_reload_info() {
    $templates = theme_get_templates();
    $info = array(
        'templates' => isset($_REQUEST['full_urls']) ? $templates['urls'] : getThemeTemplates(),
        'used_template_files' => $templates['used_files'],
        'template_types' => $templates['types'],
        'home_url' =>  home_url(),
        'woocommerce_enabled' => theme_woocommerce_enabled(),
        'cms_version' => get_wp_versions()
    );
    if (theme_is_converted()) {
        $info['importer_nonce'] = '';
    }
    echo json_encode(apply_filters('theme_reload_info', $info));
}
theme_add_export_action('theme_reload_info');

function theme_save_data(&$project_data, &$images) {
        $base_template_dir = get_template_directory();
        $template_dir = FilesHelper::normalize_path($base_template_dir . '_preview');

        $helper = new PreviewHelper();
        $changed_files = theme_get_preview_changed_files();

        if (!theme_is_converted()) {
            foreach(FilesHelper::enumerate_files($base_template_dir, false) as $file) {
                $path = str_replace($base_template_dir, '', $file['path']);
                if ($path === '/export' || $path === '/content' || $path === '/images')
                    continue;
                FilesHelper::empty_dir($base_template_dir . $path, true);
            }
        }
        FilesHelper::create_dir($base_template_dir . '/images');

        ProviderLog::start('Update images');
        if ($images != null) {
            $existing_images = FilesHelper::enumerate_files($base_template_dir . '/images', false);
            $image_name = array();
            foreach($images as $key => $content) {
                $image_name[theme_get_image_name($key)] = $key;
            }
            foreach($existing_images as $image) {
                $image_key = str_replace($base_template_dir . '/images/', '', $image['path']);
                if (isset($image_name[$image_key])) {
                    $image_key = $image_name[$image_key];
                }
                if (!isset($images[$image_key]) && is_file($image['path'])) {
                    $images[$image_key] = '[DELETED]';
                }
            }
            process_images($images, $template_dir . '/images', $changed_files);

            $export_plugin_folder = $template_dir . '/export/';
            foreach(FilesHelper::enumerate_files($template_dir) as $_file) {
                $file = $_file['path'];
                $info = pathinfo($file);
                $file_ext = isset($info['extension']) && $info['extension'] ? $info['extension'] : '';

                if ('php' !== $file_ext)
                    continue;
                if (substr($file, 0, strlen($export_plugin_folder)) == $export_plugin_folder)
                    continue;

                $content = file_get_contents($file);
                $old_content = $content;
                foreach($images as $key => $value) {
                    $old_path = '<?php bloginfo("template_url") ?>/images/' . theme_get_image_name($key);
                    $new_path = '<?php echo theme_get_image_path(\'images/' . theme_get_image_name($key) . '\'); ?>';
                    $content = str_replace($old_path, $new_path, $content);
                }
                if ($old_content !== $content) {
                    file_put_contents($file, $content);
                    $changed_files[] = $file;
                }
            }
        }
        ProviderLog::end('Update images');
        ProviderLog::start('Update files');
        foreach($changed_files as $file) {
            $file = theme_get_preview_relative_path($file);
            $file_path = $base_template_dir . $file;
            if (file_exists($template_dir . $file)) {
                if (preg_match('/^\/images\/([^\/\\\]+)$/', $file)) {
                    FilesHelper::rename($template_dir . $file, $file_path);
                } else {
                    FilesHelper::copy_recursive($template_dir . $file, $file_path, array($helper, "removeDataId"));
                }
            } else {
                $helper->removeKey($file);
                FilesHelper::remove_file($file_path);
            }
        }
        ProviderLog::end('Update files');
        ProviderLog::start('Clear Images');
        if ($images != null) {
            foreach(FilesHelper::enumerate_files($template_dir . '/images', false) as $preview_image) {
                FilesHelper::remove_file($preview_image['path']);
            }
        }
        ProviderLog::end('Clear Images');

        theme_set_preview_changed_files(array());
        $helper->save();
        setThemeProjectData($base_template_dir, $project_data);
}

function theme_reload_themes_info() {
    $themes = wp_get_themes();
    $current_template = get_template() . '';
    $themes_info = array();
    foreach($themes as $name => $theme) {
        $project_file = $theme->get_template_directory() . '/export/project.json';
        if (file_exists($project_file)) {
            $template = $theme->get_template() . '';
            $screenshot = file_exists($theme->get_template_directory() . '/screenshot400x400.png')
                ? $theme->get_template_directory_uri() . '/screenshot400x400.png'
                : $theme->get_screenshot();
            $themes_info[$name] = array(
                'themeName' => $template,
                'thumbnailUrl' => $screenshot,
                'openUrl' => theme_get_editor_link($template),
                'isActive' => $current_template === $template
            );
        }
    }
    echo json_encode(array('themes' => $themes_info));
}
theme_add_export_action('theme_reload_themes_info');

function theme_save_project()
{
    if (!isset($_POST['info'])) {
        $info = theme_get_chunk_info();
    } else {
        $info = json_decode(stripslashes_deep($_POST['info']), true);
    }

    if (is_null($info)) {
        error_log(sprintf(admin_url() . ' Invalid info; info: %s; json_last_error: %s', $_POST['info'], json_last_error()));
        throw new Exception('Invalid info');
    }

    $chunk = new Chunk();

    if (is_wp_error($error = $chunk->save($info))) {
        theme_handle_bad_request($error);
    }

    if ($chunk->last()) {
        // merge and decode content
        $content = $chunk->complete();
        ProviderLog::start('json_decode');
        $content = json_decode($content, true);
        ProviderLog::end('json_decode');

        if (!isset($content['projectData']))  $content['projectData'] = '';
        if (!isset($content['thumbnails']))   $content['thumbnails'] = null;
        if (!isset($content['cssJsSources'])) $content['cssJsSources'] = null;
        if (!isset($content['md5Hashes']))    $content['md5Hashes'] = null;
        if (!isset($content['images']))       $content['images'] = null;

        $project_data   = &$content['projectData'];
        $thumbnails     = &$content['thumbnails'];
        $css_js_sources = &$content['cssJsSources'];
        $md5_hashes     = &$content['md5Hashes'];
        $images         = &$content['images'];

        $base_template_dir = get_template_directory();
        $template_dir = FilesHelper::normalize_path($base_template_dir . '_preview');

        if ('' === $project_data) {
            setThemeProjectData($base_template_dir, $project_data);
            return array('result' => 'done');
        }
        theme_save_data($project_data, $images);

        if (null !== $css_js_sources) {
            theme_set_cache($base_template_dir, $css_js_sources);
        }

        if (null !== $md5_hashes) {
            theme_set_hashes($base_template_dir, $md5_hashes);
        }

        if (null != $thumbnails){
            ProviderLog::start('Update thumbnails');
            foreach ($thumbnails as $thumbnail) {
                $filename = $thumbnail['name'];
                list(, $data) = explode(',', $thumbnail['data']);
                $data = base64_decode($data);
                $file_path = $template_dir . '/' . $filename;
                $base_file_path = $base_template_dir . '/' . $filename;
                if (false === file_put_contents($base_file_path, $data))
                    throw new PermissionDeniedException($base_file_path);
                if (false === file_put_contents($file_path, $data))
                    throw new PermissionDeniedException($file_path);
            }
            ProviderLog::end('Update thumbnails');
        }

        FilesHelper::remove_file($base_template_dir . '/style.min.css');
        FilesHelper::remove_file($base_template_dir . '/bootstrap.min.css');

        theme_set_name($base_template_dir . '/style.css', get_template());
        FilesHelper::remove_empty_subfolders($base_template_dir);
        theme_mark_as_converted();
        return array('result' => 'done');
    }
    return array('result' => 'processed');
}
theme_add_export_action('theme_save_project');

function can_rename($new_template) {
    if (!theme_is_valid_name($new_template)) {
        return 'Not valid theme name: ' . $new_template;
    }

    $theme_root = get_theme_root(get_template());
    $new_template_dir = $theme_root . '/' . $new_template;
    if (file_exists($new_template_dir)) {
        return 'You have already such theme: ' . $new_template;
    }
    return '';
}

function theme_can_rename()
{
    $rename_error = can_rename($_REQUEST['themeName']);
    return array('result' => 'done', 'message' => $rename_error);
}
theme_add_export_action('theme_can_rename');

function theme_rename()
{
    global $theme_templates_options;

    $current_template = get_template();
    $template = isset($_REQUEST['themeName']) ? $_REQUEST['themeName'] : $current_template;
    $template_preview = $template . '_preview';

    $theme_root = get_theme_root($template);

    $template_dir = $theme_root . '/' . $template;
    $template_preview_dir = ($current_template === $template ? "$theme_root/" : "$template_dir/preview/") . $template_preview;

    $new_template = preg_replace('|[^a-z0-9_./-]|i', '', $_REQUEST['newName']);
    $new_template_preview = $new_template . '_preview';

    $new_template_dir = $theme_root . '/' . $new_template;
    $new_template_preview_dir = ($current_template === $template ? "$theme_root/" : "$template_dir/preview/") . $new_template_preview;

    $rename_error = can_rename($new_template);
    if ($rename_error)
        throw new Exception($rename_error);

    if (!file_exists($template_dir))
        throw new Exception("Theme $template does not exists");

    if (file_exists($template_preview_dir) && !file_exists($new_template_preview_dir)){
        FilesHelper::rename($template_preview_dir, $new_template_preview_dir);
        theme_set_name($new_template_preview_dir . '/style.css', theme_get_preview_theme_name($new_template));
    }
    FilesHelper::rename($template_dir, $new_template_dir);
    theme_set_name($new_template_dir . '/style.css', $new_template);
    theme_rename_option("theme_mods_$template", "theme_mods_$new_template");
    foreach($theme_templates_options as $key => $list) {
        $option = sanitize_title_with_dashes($key);
        theme_rename_option('theme_template_' . $template . '_' . $option, 'theme_template_' . $new_template . '_' . $option);
    }
    if ($template === $current_template) {
        update_option('template', $new_template);
        update_option('stylesheet', $new_template);
    }
    return array('result' => 'done');
}
theme_add_export_action('theme_rename');

function theme_create_name($theme_name) {
    $theme = wp_get_theme($theme_name);

    while ($theme->exists()) {
        preg_match('#(.*?)(\d{0,4})$#', $theme_name, $m);
        $theme_name = $m[1];
        $suffix = (int)$m[2];
        $suffix++;
        $theme_name .= $suffix;
        $theme = wp_get_theme($theme_name);
    }
    return $theme_name;
}

function theme_copy()
{
    if (!isset($_REQUEST['id']))
        throw new Exception('id is not defined');

    $theme_name = $_REQUEST['id'];
    $theme = wp_get_theme($theme_name);
    if (!$theme->exists())
        throw new Exception("$theme_name does not exists");

    $new_theme_name = isset($_REQUEST['newName']) && $_REQUEST['newName'] ? $_REQUEST['newName'] : $theme_name;
    $new_theme_name = theme_create_name($new_theme_name);
    $new_theme = wp_get_theme($new_theme_name);

    $theme_path = $theme->get_template_directory();
    $new_theme_path = $new_theme->get_template_directory();

    FilesHelper::copy_recursive($theme_path, $new_theme_path);
    theme_set_name("$new_theme_path/style.css", $new_theme_name);
    if (get_template() === $theme->get_template()) {
        FilesHelper::create_dir("$new_theme_path/preview");
        FilesHelper::create_dir("$new_theme_path/preview/$new_theme_name"."_preview");
        FilesHelper::copy_recursive($theme_path.'_preview', "$new_theme_path/preview/$new_theme_name"."_preview");
    } else {
        FilesHelper::rename_if_exists("$new_theme_path/preview/$theme_name"."_preview", "$new_theme_path/preview/$new_theme_name"."_preview");
    }
    theme_set_name("$new_theme_path/preview/$new_theme_name"."_preview/style.css", theme_get_preview_theme_name($new_theme_name));
    return array('result' => 'done');
}
theme_add_export_action('theme_copy');

function theme_activate()
{
    if (!isset($_REQUEST['id'])) {
        // already active
        return array('result' => 'done');
    }
    $id = $_REQUEST['id'];
    $theme = wp_get_theme($id);
    if (!$theme->exists())
        throw new Exception("Theme $id does not exists");

    if (get_template() . '' !== $id)
        switch_theme($id);

    return array('result' => 'done');
}
theme_add_export_action('theme_activate');

function theme_remove()
{
    if (!isset($_REQUEST['id']))
        throw new Exception('id is not defined');

    $theme_name = $_REQUEST['id'];
    $current_name = get_template();

    if ($theme_name === $current_name)
        throw new Exception("$theme_name is active");

    $theme = wp_get_theme($theme_name);
    if (!$theme->exists())
        throw new Exception("Theme $theme_name does not exists");

    FilesHelper::empty_dir($theme->get_template_directory(), true);
    return array('result' => 'done');
}
theme_add_export_action('theme_remove');

function theme_get_files()
{
    if (!isset($_POST['mask'])) {
        return array('error' => 'mask is not defined');
    }
    $mask = $_POST['mask'];
    $filter = null;
    if (isset($_POST['filter']) && $_POST['filter'] !== '') {
        $filter = '#' . stripslashes_deep($_POST['filter']) . '#';
    }
    $template = get_template();
    $theme_root = get_theme_root($template);
    $files = array();
    foreach (explode(';', $mask) as $name) {
        $name = preg_replace('#[\/]+#', '/', $name);
        if (is_string($filter) && preg_match($filter, $name)) {
            continue;
        }

        $path = "$theme_root/$template$name";
        if (file_exists($path)) {
            $files[$name] = file_get_contents($path);
            if (false === $files[$name])
                    throw new PermissionDeniedException($path);
        }
    }
    return $files;
}

theme_add_export_action('theme_get_files');

function theme_get_manifest()
{
    $version = $_REQUEST['ver'];

    header('Content-Type: text/cache-manifest');
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    echo theme_load_manifest($version);
}
function theme_check_ajax_referer_filter($value, $action) {
    if ($action === 'theme_get_manifest' || $action === 'theme_get_project' || getenv('THEMLER_MANIFEST_STORAGE')) {
        return false;
    }
    return $value;
}
add_filter('theme_check_ajax_referer', 'theme_check_ajax_referer_filter', 10, 2);
theme_add_export_action('theme_get_manifest');

function theme_set_files()
{
    if (isset($_POST['files'])) {
        $files = json_decode(stripslashes_deep($_POST['files']), true);
        $result = '1';
    } else {
        $info = theme_get_chunk_info();
        $chunk = new Chunk();

        if (is_wp_error($error = $chunk->save($info))) {
            theme_handle_bad_request($error);
        }

        if ($chunk->last()) {
            $files = json_decode($chunk->complete(), true);
            $result = array('result' => 'done');
        } else {
            return array('result' => 'processed');
        }
    }
    $template = get_template();
    $theme_root = get_theme_root( $template );
    $template_dir = $theme_root . '/' . $template;
    if (is_array($files)) {
        foreach($files as $file => $content) {
            if ($file === '/export/themler.manifest')
                theme_save_manifest($content);
            else if (false === file_put_contents($template_dir . $file, $content))
                throw new PermissionDeniedException($template_dir . $file);
        }
    }
    if (is_array($result))
        return $result;
    echo $result;
}
theme_add_export_action('theme_set_files');

function theme_fso_zip()
{
    $info = theme_get_chunk_info();
    $chunk = new Chunk();

    if (is_wp_error($error = $chunk->save($info))) {
        theme_handle_bad_request($error);
    }

    if (!$chunk->last()) {
        return array('result' => 'processed');
    }
    $data = json_decode($chunk->complete(), true);
    if (!isset($data['fso']))
        throw new Exception('Empty fso');

    $base_upload_dir = wp_upload_dir();
    $tmp_dir = $base_upload_dir['basedir'] . '/zip-data.tmp';
    $zip_file = $base_upload_dir['basedir'] . '/zip-data.zip';
    FilesHelper::empty_dir($tmp_dir, true);

    $changed_files = array();
    $replace_data = array();
    copy_fso_to_fs($data['fso'], $tmp_dir, $changed_files, $replace_data);

    require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
    $archive = new PclZip($zip_file);

    if (0 == $archive->create($tmp_dir, PCLZIP_OPT_REMOVE_PATH, $tmp_dir))
        throw new Exception("Extract error : " . $archive->errorInfo(true));

    $result = array('result' => 'done', 'data' => base64_encode(file_get_contents($zip_file)));
    FilesHelper::empty_dir($tmp_dir, true);
    FilesHelper::remove_file($zip_file);
    return $result;
}
theme_add_export_action('theme_fso_zip');

include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

class WP_Export_Installer_Skin extends Theme_Installer_Skin {

    public $output = "";

    public function header() {
        $this->done_header = true;
    }

    public function footer() {
        $this->done_footer = true;
    }

    public function feedback($string) {
        if (isset($this->upgrader->strings[$string]))
            $string = $this->upgrader->strings[$string];

        if (strpos($string, '%') !== false) {
            $args = func_get_args();
            $args = array_splice($args, 1);
            if ($args) {
                $args = array_map('strip_tags', $args);
                $args = array_map('esc_html', $args);
                $string = vsprintf($string, $args);
            }
        }
        if (empty($string))
            return;
        $this->output .= "<p>$string</p>";
    }
}

function theme_upload_rename_archive($archive_file, $tmp_dir) {
    require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
    $archive = new PclZip($archive_file);
    FilesHelper::empty_dir($tmp_dir, true);
    $default_name = 'Untitled';
    $theme_root = "$tmp_dir/$default_name";
    if (0 == $archive->extract(PCLZIP_OPT_PATH, $theme_root)) {
        return array(
            'status' => 'error',
            'message' => "<p><b>Invalid WordPress Theme</b></p>Extract error : " . $archive->errorInfo(true)
        );
    }
    $files = FilesHelper::enumerate_files($theme_root, false);
    if (count($files) === 1 && is_dir($files[0]['path'])) {
        $theme_name = str_replace("$theme_root/", '', $files[0]['path']);
    } else {
        $theme_root = $tmp_dir;
        $theme_name = $default_name;
    }
    $new_theme_name = theme_create_name($theme_name);
    if ($new_theme_name !== $theme_name || $theme_root === $tmp_dir) {
        theme_set_name("$theme_root/$theme_name/preview/$theme_name"."_preview/style.css", theme_get_preview_theme_name($new_theme_name));
        theme_set_name("$theme_root/$theme_name/style.css", $new_theme_name);
        FilesHelper::rename_if_exists("$theme_root/$theme_name/preview/$theme_name"."_preview", "$theme_root/$theme_name/preview/$new_theme_name"."_preview");
        FilesHelper::rename_if_exists("$theme_root/$theme_name", "$theme_root/$new_theme_name");
        if (0 == $archive->create("$theme_root/$new_theme_name", PCLZIP_OPT_REMOVE_PATH, $theme_root))
            throw new Exception("Create error : " . $archive->errorInfo(true));
    }
    return true;
}

function theme_upload_rename($filename) {
    $base_upload_dir = wp_upload_dir();
    $basedir = FilesHelper::normalize_path($base_upload_dir['basedir']);

    $archive_file = "$basedir/$filename";
    $tmp_dir = "$basedir/theme-upload";
    $result = theme_upload_rename_archive($archive_file, $tmp_dir);
    FilesHelper::empty_dir($tmp_dir, true); // remove temp directory
    return $result;
}

function theme_upload_theme_callback($args) {
    $filename = $args['filename'];
    $_GET['filename'] = $filename;
    unset($_FILES['chunk']);

    if (true === ($result = theme_upload_rename($filename))) {
        $file_upload = new File_Upload_Upgrader('', 'filename');
        $upgrader = new Theme_Upgrader(new WP_Export_Installer_Skin(compact('type', 'title', 'nonce', 'url')));
        $upload_result = $upgrader->install($file_upload->package);

        $result = array();
        if ($upload_result === true) {
            $result['status'] = 'done';
        } else if ($upload_result === false || $upload_result === null) {
            $result['status'] = 'error';
            $result['message'] = $upgrader->skin->output;
        } else if (is_wp_error($upload_result)) {
            $result['status'] = 'error';
            $result['message'] = $upload_result->get_error_message();
        }
    }

    $upload_dir = wp_upload_dir();
    $tmp_path = $upload_dir['basedir'] . '/' . $filename;
    FilesHelper::remove_file($tmp_path); // remove archive
    return $result;
}
function theme_upload_theme()
{
    if (!current_user_can('upload_themes') && !current_user_can('install_themes')) {
        return array(
            'status' => 'error',
            'message' => 'You do not have sufficient permissions to install themes on this site.'
        );
    }
    return ChunkedUploader::process_action('theme_upload_theme_callback');
}
theme_add_export_action('theme_upload_theme');

function theme_fso_unzip_callback($args) {
    $filename = $args['filename'];

    $upload_dir = wp_upload_dir();
    $archive_file = $upload_dir['basedir'] . '/' . $filename;
    $tmp_dir = $upload_dir['basedir'] . '/zip-data.tmp';
    FilesHelper::empty_dir($tmp_dir, true);

    require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
    $archive = new PclZip($archive_file);

    if (0 == $archive->extract(PCLZIP_OPT_PATH, $tmp_dir)) {
        return array(
            'status' => 'error',
            'message' => "<p><b>Invalid zip</b></p>Extract error : " . $archive->errorInfo(true)
        );
    }

    $fso = FilesHelper::generate_fso($tmp_dir);
    FilesHelper::remove_file($archive_file);
    FilesHelper::empty_dir($tmp_dir, true);
    return array(
        'status' => 'done',
        'fso' => $fso
    );
}
function theme_fso_unzip()
{
    return ChunkedUploader::process_action('theme_fso_unzip_callback');
}
theme_add_export_action('theme_fso_unzip');


// TODO: use ChunkedUploader
function theme_upload_image()
{
    $base_template_dir = get_template_directory();
    $preview_template_dir = FilesHelper::normalize_path($base_template_dir . '_preview');
    $images_dir = $preview_template_dir . '/images';

    $filename = $_REQUEST['filename'];
    $is_last = $_REQUEST['last'];
    $content_range = $_SERVER['HTTP_CONTENT_RANGE'];

    $base_path = $images_dir . '/' . $filename;
    $base_upload_dir = wp_upload_dir();

    if (false !== $base_upload_dir['error']) {
        $result = array(
            'status' => 'error',
            'message' => 'Upload folder error: ' . $base_upload_dir['error']
        );
    } elseif (!isset($_FILES['chunk']) || !file_exists($_FILES['chunk']['tmp_name'])) {
        $result = array(
            'status' => 'error',
            'message' => 'Empty chunk data'
        );
    } elseif (!$content_range && !$is_last) {
        $result = array(
            'status' => 'error',
            'message' => 'Empty Content-Range header'
        );
    } elseif (!$filename) {
        $result = array(
            'status' => 'error',
            'message' => 'Empty file name'
        );
    } elseif (file_exists($base_path)) {
        $result = array(
            'status' => 'error',
            'message' => 'File already exists'
        );
    } elseif (!file_exists($images_dir) && !mkdir($images_dir, 0776, true)) {
        $result = array(
            'status' => 'error',
            'message' => 'Failed to create a folder'
        );
    } else {
        $tmp_path = $base_upload_dir['basedir'] . '/' . $filename . '.tmp';
        $range_begin = 0;

        if ($content_range) {
            list($range, $total) = explode('/', str_replace('bytes ', '', $content_range));
            list($range_begin, $range_end) = explode('-', $range);
        }

        $file = fopen($tmp_path, 'c');

        if (flock($file, LOCK_EX)) {

            fseek($file, (int) $range_begin);
            fwrite($file, file_get_contents($_FILES['chunk']['tmp_name']));

            flock($file, LOCK_UN);
            fclose($file);
        }

        if ($is_last) {
            FilesHelper::remove_file($base_path);
            FilesHelper::create_dir($images_dir);
            FilesHelper::rename($tmp_path, $base_path);
            $result = array(
                'status' => 'done',
                'url' => get_template_directory_uri() . '_preview/images/' . $filename
            );
            $changed_files = theme_get_preview_changed_files();
            $changed_files[] = $base_path;
            theme_set_preview_changed_files($changed_files);
        } else {
            $result = array(
                'status' => 'processed'
            );
        }
    }
    echo json_encode($result);
}
theme_add_export_action('theme_upload_image');

// other actions:
load_template($base_template_dir . '/export/project.php');