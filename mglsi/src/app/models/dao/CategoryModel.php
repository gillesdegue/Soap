<?php

namespace App\Models\Dao;

class CategoryModel extends Model
{
    protected $table = 'categorie';

    public function show($cmd)
    {
        return $this->query("select * from $this->table where id= ?", array($cmd), true);

    }
    public function insertCategory($category)
    {

        return $this->query("INSERT INTO $this->table (libelle) VALUES(?)", array($category->libelle));
    }
    public function updateCategory($category)
    {

        return $this->query("UPDATE $this->table set libelle=? where id=?", array($category->libelle, $category->id));

    }

    public function deleteCategory($id)
    {
        return $this->query("DELETE from $this->table where id = ?", array($id));
    }
}