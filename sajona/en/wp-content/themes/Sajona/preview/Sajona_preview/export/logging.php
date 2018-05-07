<?php

if (current_user_can('switch_themes') && (theme_is_preview() || isset($_GET['action']) && strpos($_GET['action'], 'theme_') === 0)) {

    $base_template_dir = get_template_directory();
    load_template($base_template_dir . '/export/ProviderLog.php');

    @ini_set('display_errors', '1');
    @error_reporting(error_reporting() | E_ERROR | E_PARSE | E_COMPILE_ERROR);
    ProviderLog::registerErrorHandlers(theme_is_preview());

    function theme_add_logs() {
        $errors = ProviderLog::getErrors();
        if (!empty($errors)) {
            echo '<!-- PHP Errors: ' . str_replace('-->', '--', json_encode($errors, defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : 0)) . ' -->';
        }
    }
    if (theme_is_preview()) {
        add_action('wp_footer', 'theme_add_logs');
    }
}