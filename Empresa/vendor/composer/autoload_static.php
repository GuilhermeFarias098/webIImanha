<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48110099f7de7261328fd31d5b4385ee
{
    public static $files = array (
        '635d3948fa92ee114b561cbc532a57fc' => __DIR__ . '/../..' . '/Config.php',
        'cc100b33dc336ef887e79796e01a4b31' => __DIR__ . '/../..' . '/AuthVerify.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'APP\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'APP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit48110099f7de7261328fd31d5b4385ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit48110099f7de7261328fd31d5b4385ee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit48110099f7de7261328fd31d5b4385ee::$classMap;

        }, null, ClassLoader::class);
    }
}
