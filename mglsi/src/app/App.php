<?php

namespace App;

use App\Controllers\AuthController;
use App\Models\Dao\MysqlDb;

class App
{

    private static $_instance;
    private $db_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getDB()
    {
        if ($this->db_instance === null) {
            $this->db_instance = new MysqlDb('mglsi_news');
        }
        return $this->db_instance;
    }


}