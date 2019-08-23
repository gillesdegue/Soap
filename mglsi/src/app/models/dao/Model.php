<?php

namespace App\Models\Dao;

use App\App;


class Model
{

    protected $table = '';
    protected $db;

    public function __construct()
    {
        if ($this->db == null) {

            $app = App::getInstance();
            $this->db = $app->getDB();

        }

    }

    public function all()
    {
        return $this->query(' SELECT * FROM ' . $this->table . ' ');
    }

    public function query($stm, $attribut = null, $one = false)
    {
        $nameCLasse = str_replace('Model', '', get_class($this));
        //var_dump(str_replace('App\s\Dao', 'App\Models\Domain', $nameCLasse));
        if ($attribut != null) {
            return $this->db->prepare($stm, $attribut, str_replace('App\s\Dao', 'App\Models\Domain', $nameCLasse), $one);

        } else {
            return $this->db->query($stm, str_replace('App\s\Dao', 'App\Models\Domain', $nameCLasse), $one);
        }

    }

    public function queryArray($stm, $one = false)
    {

        return $this->db->query($stm, null, $one);
    }

    public function rowCount($stm)
    {
        return $this->db->rowCount($stm);
    }
}