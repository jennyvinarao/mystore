<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a5f7808c41ddb49a03562bb10495f6b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a5f7808c41ddb49a03562bb10495f6b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a5f7808c41ddb49a03562bb10495f6b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
