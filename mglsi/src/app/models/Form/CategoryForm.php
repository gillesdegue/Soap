<?php

namespace App\Models\Form;

use App\Models\Domain\Category;
use App\Models\Dao\CategoryModel;


class CategoryForm
{
    public function createCategory($post)
    {
        $id = $_POST['edit_id'];
        $libelle = $_POST['libelle'];
        $cmd = $_POST['form_name'];
        $category = new CategoryModel();
        $categorie = new Category();
        $categorie->id = $id;
        $categorie->libelle = $libelle;
        if ($categorie->id != '0') {
            if ($category->updateCategory($categorie)) {
                return "1";
            } else {
                return "0";
            }
        } else {
            if ($category->insertCategory($categorie)) {
                return "1";
            } else {
                return "0";
            }
        }
    }

    public function deleteCategory($id)
    {
        $category = new CategoryModel();
        if ($category->deleteCategory($id)) {
            return "1";
        } else {
            return "0";
        }
    }
}