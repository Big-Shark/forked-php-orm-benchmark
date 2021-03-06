<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit954ea5a4266ecdefeb4f12651664153b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aura\\Sql\\' => 9,
            'Aura\\SqlQuery\\' => 14,
            'Atlas\\Orm\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aura\\Sql\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sql/src',
        ),
        'Aura\\SqlQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sqlquery/src',
        ),
        'Atlas\\Orm\\' => 
        array (
            0 => __DIR__ . '/..' . '/atlas/orm/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit954ea5a4266ecdefeb4f12651664153b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit954ea5a4266ecdefeb4f12651664153b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
