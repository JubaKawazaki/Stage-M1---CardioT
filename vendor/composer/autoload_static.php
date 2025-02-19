<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c4a6ac9fa9dcbd3717dbb91acdf2a8c
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c4a6ac9fa9dcbd3717dbb91acdf2a8c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c4a6ac9fa9dcbd3717dbb91acdf2a8c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c4a6ac9fa9dcbd3717dbb91acdf2a8c::$classMap;

        }, null, ClassLoader::class);
    }
}
