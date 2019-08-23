<?php

namespace App\Controllers;

use App\Models\Dao\CategoryModel;
use App\Models\Dao\ArticleModel;
use App\Models\Form\ArticleForm;
use App\Models\Form\CategoryForm;

class EditeurController extends Controller
{

    public function indexArticle()
    {
        $article = new ArticleModel();
        $category = new CategoryModel();
        $articles = $article->getArticleByAuteur($_SESSION['user']['id']);
        $categories = $category->all();
        //var_dump($articles); 
        return $this->view('editeur.article', compact('articles', 'categories'));
    }

    public function createArticle()
    {
        $articleform = new ArticleForm();
        $res = $articleform->createArticle($_POST);
        echo $res;
    }

    public function showArticle()
    {
        $cmd = $_REQUEST['tbl_id'];
        $article = new ArticleModel();
        $articles = $article->show($cmd);
        echo json_encode($articles);
    }

    public function deleteArticle()
    {
        $articleform = new ArticleForm();
        $res = $articleform->deleteArticle($_POST['tbl_id']);
        echo $res;
    }

    public function indexCategory()
    {
        $category = new CategoryModel();
        $categories = $category->all();

        return $this->view('admin.category', compact('categories'));
    }

    public function createCategory()
    {
        $categoryform = new CategoryForm();
        $res = $categoryform->createCategory($_POST);
        echo $res;
    }

    public function showCategory()
    {
        $cmd = $_REQUEST['tbl_id'];
        $category = new CategoryModel();
        $categories = $category->show($cmd);
        echo json_encode($categories);
    }

    public function deleteCategory()
    {
        $categoryform = new CategoryForm();
        $res = $categoryform->deleteCategory($_POST['tbl_id']);
        echo $res;
    }
}