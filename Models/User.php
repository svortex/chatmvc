<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 10:28
 */

namespace Models;

class User
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DataSource::getInstance()->getPdo();
    }

    public function getAllUsers()
    {
        $fst = $this->pdo->prepare("SELECT * from Users");
        $fst->execute();
        while ($rec = $fst->fetch(\PDO::FETCH_ASSOC)){
            yield $rec;
        }

    }

    public function createUser($login, $password){

            $fst = $this->pdo->prepare("INSERT INTO Users(`login`, `password`) values (?, ?)");
            $fst->bindParam(1, $login);
            $fst->bindParam(2, $password);
            $fst->execute();
    }

    public function getUserByLoginPassword($login, $password)
    {
        $fst = $this->pdo->prepare("SELECT * from Users WHERE login=? AND password=?");
        $fst->bindParam(1, $login);
        $fst->bindParam(2, $password);
        $fst->execute();
        return $fst->fetch(\PDO::FETCH_ASSOC);
    }
}