<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit520bf08bc1fd23909dfd90b39e7cd392
{
    public static $files = array (
        '18deab8a52be96cfc50a45f1edb7ca0b' => __DIR__ . '/..' . '/user-meta/html/src/wp.php',
        'd0b0bbda88a45b60ddccf76bed89ecb8' => __DIR__ . '/../..' . '/legacylib/Framework.php',
    );

    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'UserMeta\\Html\\' => 14,
            'UserMeta\\Field\\' => 15,
            'UserMeta\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'UserMeta\\Html\\' => 
        array (
            0 => __DIR__ . '/..' . '/user-meta/html/src',
        ),
        'UserMeta\\Field\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models/classes/Field',
            1 => __DIR__ . '/../..' . '/models/classes/Field/pro',
        ),
        'UserMeta\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models/classes/builder',
            1 => __DIR__ . '/../..' . '/models/classes/generate',
            2 => __DIR__ . '/../..' . '/models/classes',
            3 => __DIR__ . '/../..' . '/models/classes/pro',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit520bf08bc1fd23909dfd90b39e7cd392::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit520bf08bc1fd23909dfd90b39e7cd392::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
