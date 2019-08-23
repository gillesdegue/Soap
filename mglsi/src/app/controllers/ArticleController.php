<?php

namespace App\Controllers;

use App\Models\Dao\CategoryModel;
use App\Models\Dao\ArticleModel;
use App\Models\Form\ArticleForm;



class ArticleController extends Controller
{
    public function index()
    {
        $article = new ArticleModel();
        $category = new CategoryModel();
        $articles = $article->all();
        $categories = $category->all();
        //var_dump($articles); 
        return $this->view('admin.article', compact('articles', 'categories'));
    }

    public function create()
    {
        $articleform = new ArticleForm();
        $res = $articleform->createArticle($_POST);
        echo $res;
    }

    public function show()
    {
        $cmd = $_REQUEST['tbl_id'];
        $article = new ArticleModel();
        $articles = $article->show($cmd);
        echo json_encode($articles);
    }

    public function delete()
    {
        $articleform = new ArticleForm();
        $res = $articleform->deleteArticle($_POST['tbl_id']);
        echo $res;
    }

}