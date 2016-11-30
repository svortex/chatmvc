<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 11:19
 */
class Autoloader
{
    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        $nameSpace = explode('\\', $class);
        $nameSpace = array_map('strtolower', $nameSpace);
        $i = count($nameSpace) - 1;
        $nameSpace[$i] = ucfirst($nameSpace[$i]);
        $class = implode('/', $nameSpace);
        require $class.'.php';
    }

}