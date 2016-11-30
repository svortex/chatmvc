<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 10:02
 */

namespace Models;

class DataSource
{
    public static $instance = null;

    private $pdo;

    const DEFAULT_MYSQL_USER = 'root';


    const DEFAULT_MYSQL_HOST = 'localhost';


    const DEFAULT_MYSQL_PASS = '';


    const DEFAULT_DB_NAME = 'chat';

    private function __construct()
    {
        try{
            $this->pdo = new \PDO('mysql:dbname='.self::DEFAULT_DB_NAME.';host='.self::DEFAULT_MYSQL_HOST,self::DEFAULT_MYSQL_USER ,self::DEFAULT_MYSQL_PASS);
        }
        catch(\PDOException $e){
            die($e->getMessage());
        }

    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}