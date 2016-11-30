<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 10:28
 */
namespace Models;

class Message
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DataSource::getInstance()->getPdo();
    }

    public function addMessage($user_id, $message)
    {
        $fst = $this->pdo->prepare("INSERT INTO Messages(`user_id`, `content`) values (?, ?)");
        $fst->bindParam(1, $user_id);
        $fst->bindParam(2, $message);
        $fst->execute();
    }

    public function getRecentMessages()
    {
        $fst = $this->pdo->prepare("SELECT  m.content, m.creation_date, u.login from Messages m join Users u on u.id = m.user_id WHERE DATE(m.creation_date) = CURDATE()");
        $fst->execute();
        while ($rec = $fst->fetch(\PDO::FETCH_ASSOC)){
            yield $rec;
        }

    }

    public function getArchivedMessages()
    {
        $fst = $this->pdo->prepare("SELECT  m.content, m.creation_date, u.login from Messages m join Users u on u.id = m.user_id WHERE DATE(m.creation_date) < CURDATE()");
        $fst->execute();
        while ($rec = $fst->fetch(\PDO::FETCH_ASSOC)){
            yield $rec;
        }

    }
}