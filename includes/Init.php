<?php
/**
 * @package NagshDL
 */

namespace NagshDL;

final class Init
{
    /**
     * Store all the classes inside an array and return array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Controllers\ACF\ACF::class
        ];
    }

    /**
     * Loop through the classes, initialize them and call the register() method if exists
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class Class from the services array
     * @return class instance new instance of the class
     */
    private static function instantiate($class)
    {
        $service = new $class;

        return $service;
    }
}