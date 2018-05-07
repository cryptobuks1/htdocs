<?php

class ProviderLog
{
    private static $_log = array();
    private static $_errors = array();
    private static $_initialMemoryUsage = '';

    private static function prepareKey($key) {
        return '[PHP] ' . $key;
    }

    public static function start($key = '') {
        ProviderLog::$_log[] = array(
            'key' => ProviderLog::prepareKey($key),
            'type' => 'start',
            'time' => microtime(true) * 1000
        );
    }

    public static function end($key = '') {
        $key = ProviderLog::prepareKey($key);
        ProviderLog::$_log[] = array(
            'key' =>  $key,
            'type' => 'end',
            'time' => microtime(true) * 1000
        );
    }

    public static function getLog() {
        $key = ProviderLog::prepareKey('WordPress Core Load');
        array_unshift(ProviderLog::$_log, array(
            'key' => $key,
            'type' => 'start',
            'time' => 0
        ));
        ProviderLog::$_log[] = array(
            'key' => $key,
            'type' => 'end',
            'time' => timer_stop(0, 3) * 1000
        );
        return ProviderLog::$_log;
    }

    public static function registerErrorHandlers($html = false) {
        ProviderLog::$_initialMemoryUsage = @memory_get_usage(true);

        if ($html)
            register_shutdown_function(array('ProviderLog', 'fatalErrorHandlerHTML'));
        else
            register_shutdown_function(array('ProviderLog', 'fatalErrorHandler'));
        set_error_handler(array('ProviderLog', 'errorHandler'));
    }

    public static function isError($error) {
        return $error === E_ERROR || $error === E_PARSE || $error === E_COMPILE_ERROR;
    }

    public static function fatalErrorHandler() {
        // catch fatal error
        $error = error_get_last();
        if (is_array($error) && ProviderLog::isError($error['type'])) {
            die(json_encode(array(
                'initialMemoryUsage' => ProviderLog::$_initialMemoryUsage,
                'error' => $error,
                'errors' => ProviderLog::getErrors(),
                'log' => ProviderLog::getLog()
            )));
        }
    }

    public static function fatalErrorHandlerHTML() {
        // catch fatal error
        $error = error_get_last();
        if (is_array($error) && ProviderLog::isError($error['type'])) {
            die('<html><body class="error">' . json_encode(array(
                'initialMemoryUsage' => ProviderLog::$_initialMemoryUsage,
                'error' => $error,
                'errors' => ProviderLog::getErrors(),
                'log' => ProviderLog::getLog()
            )) . '</body></html>');
        }
    }

    public static function errorHandler($type, $message, $filename, $lineno) {
        if (count(ProviderLog::$_errors) >= 20)
            return;

        ProviderLog::$_errors[] = array(
            'type' => $type,
            'message' => $message,
            'file' => $filename,
            'line' => $lineno,
            'stack' => is_callable('debug_backtrace') && defined('DEBUG_BACKTRACE_IGNORE_ARGS')
                    ? debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS)
                    : ''
        );
    }

    public static function getErrors() {
        return ProviderLog::$_errors;
    }
}