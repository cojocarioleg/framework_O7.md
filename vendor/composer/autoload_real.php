<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite8c4bdca9f38d2565a63c3c08034330c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInite8c4bdca9f38d2565a63c3c08034330c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite8c4bdca9f38d2565a63c3c08034330c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite8c4bdca9f38d2565a63c3c08034330c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
