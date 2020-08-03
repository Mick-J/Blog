<?php
namespace App;

class Autoloader
{

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * @param $class
     */
    public static function autoload($class)
    {

        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            //var_dump($class); //die();
            require __DIR__ . '/' . $class . ".php";
        }
    }

}
