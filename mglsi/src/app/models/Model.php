<?php

namespace App\Models; 

class Model {

    protected $table = '';
    protected $pdo;

    public function __construct() {
        if($this->pdo==null) {
            $oracle = new \App\Database\Oracle();
            $this->pdo = $oracle->connect($_SESSION['username'], $_SESSION['password']);
            
        }

    }


    public function all() {
       $re =  $this->pdo->query("select * from $this->table");
       $data = $re->fetchAll();
       return $data;
    }
}