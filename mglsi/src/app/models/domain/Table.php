<?php

namespace App\Models\Domain;

class Table
{
    public function __get($name)
    {
        // TODO: Implement __get() method.
        $method = 'get' . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }
}