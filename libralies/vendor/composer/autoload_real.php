<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInited2604fcd6d2efde0829db1d5e56b945
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

        spl_autoload_register(array('ComposerAutoloaderInited2604fcd6d2efde0829db1d5e56b945', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInited2604fcd6d2efde0829db1d5e56b945', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInited2604fcd6d2efde0829db1d5e56b945::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}