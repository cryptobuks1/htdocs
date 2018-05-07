<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit80339d63d02d09d77f24443abd511890
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/rest-api-sdk-php/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit80339d63d02d09d77f24443abd511890::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit80339d63d02d09d77f24443abd511890::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit80339d63d02d09d77f24443abd511890::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
