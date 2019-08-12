<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcbcc2b2be129d901665693ab57d9259f
{
    public static $classMap = array (
        'App\\controllers\\PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'App\\controllers\\UsersController' => __DIR__ . '/../..' . '/app/controllers/UsersController.php',
        'App\\core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'ComposerAutoloaderInitcbcc2b2be129d901665693ab57d9259f' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitcbcc2b2be129d901665693ab57d9259f' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/connections.php',
        'Querybuilder' => __DIR__ . '/../..' . '/core/database/Querybuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitcbcc2b2be129d901665693ab57d9259f::$classMap;

        }, null, ClassLoader::class);
    }
}
