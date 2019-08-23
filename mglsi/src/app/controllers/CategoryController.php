<?php

namespace App\Controllers;

use App\Models\Dao\CategoryModel;
use App\Models\Form\CategoryForm;



class CategoryController extends Controller
{
    public function index()
    {
        $category = new CategoryModel();
        $categories = $category->all();

        return $this->view('admin.category', compact('categories'));
    }

    public function create()
    {
        $categoryform = new CategoryForm();
        $res = $categoryform->createCategory($_POST);
        echo $res;
    }

    public function show()
    {
        $cmd = $_REQUEST['tbl_id'];
        $category = new CategoryModel();
        $categories = $category->show($cmd);
        echo json_encode($categories);
    }

    public function delete()
    {
        $categoryform = new CategoryForm();
        $res = $categoryform->deleteCategory($_POST['tbl_id']);
        echo $res;


    }
}