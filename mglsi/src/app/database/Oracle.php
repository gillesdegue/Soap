<?php

namespace App\Database;
use \PDO;

class Oracle {

    private $pdo;

    public function __construct()
    {

    }

    public function connect($username, $password) {

        if($this->pdo === null){
            try{
            $tns = " (DESCRIPTION =
                (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
                (CONNECT_DATA =
                  (SERVER = DEDICATED)
                  (SERVICE_NAME = iai)
                )
              )";

            $pdo = new PDO("oci:dbname=".$tns.";charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(\PDOException $e){
                $_SESSION['error']="error";
                header('location: /');

                die();
                }
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

}