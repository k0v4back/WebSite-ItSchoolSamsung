<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a50afd43f1de5bafaf3839bfadc9cfe
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'esia\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'esia\\' => 
        array (
            0 => __DIR__ . '/..' . '/fr05t1k/esia/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a50afd43f1de5bafaf3839bfadc9cfe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a50afd43f1de5bafaf3839bfadc9cfe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
