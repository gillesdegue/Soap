<?php

namespace App\Models\Dao;

use \PDO;

class MysqlDb
{

    private $db_name, $db_user, $db_pass, $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {

        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=mglsi_news;host=localhost', 'mglsi_user', 'passer');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function rowCount($stm)
    {
        $req = $this->getPDO()->query($stm);
        return $req->rowCount();
    }
    public function query($stm, $classe = null, $one = false)
    {
        $req = $this->getPDO()->query($stm);
        if (strpos($stm, 'UPDATE') === 0 ||
            strpos($stm, 'INSERT') === 0 ||
            strpos($stm, 'DELETE') === 0) {
            return $req;
        }
        if ($classe === null) {
            $req->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $classe);
        }
        if ($one) {
            $donnees = $req->fetch();
        } else {
            $donnees = $req->fetchAll();
        }
        return $donnees;
    }

    public function prepare($stm, $value, $classe = null, $one = false)
    {
        $req = $this->getPDO()->prepare($stm);
        $res = $req->execute($value);
        if (strpos($stm, 'UPDATE') === 0 ||
            strpos($stm, 'INSERT') === 0 ||
            strpos($stm, 'DELETE') === 0) {
            return $res;
        }
        if ($classe === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $classe);
        }
        if ($one) {
            $donnees = $req->fetch();
        } else {
            $donnees = $req->fetchAll();
        }
        return $donnees;
    }

    public function lastInsertId()
    {
        return $this->getPDO()->lastInsertId();
    }
}

?>