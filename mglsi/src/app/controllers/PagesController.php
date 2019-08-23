<?php

/**
 * Created by PhpStorm.
 * User: Khall
 * Date: 23/04/2018
 * Time: 02:08
 */

namespace App\Controllers;

use App\Models\Dao\CategoryModel;
use App\Models\Dao\ArticleModel;



class PagesController extends Controller
{


  public function home()
  {
    $limit = 2;
    if (isset($_GET["pageNumber"])) {
      $pageno = $_GET["pageNumber"];
      $start = ($pageno * $limit) - $limit;
    } else {
      $start = 0;
    }

    $category = new CategoryModel();
    $article = new ArticleModel();
    $categories = $category->all();
    $articles = $article->getAll($start, $limit);
    $count = $article->count();
    $pageno = ceil($count / 2);
        //var_dump($articles);
    $this->view('home', compact('articles', 'categories', 'pageno'));


  }

  public function categorie()
  {

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $category = new CategoryModel();
      $article = new ArticleModel();
      $categories = $category->all();
      $articles = $article->getByCategoryId($id);
      $count = $article->count();
      $pageno = ceil($count / 2);
        //var_dump($articles);
      $this->view('home', compact('articles', 'categories', 'pageno'));
    } else {
      $this->home();
    }


  }

  public function notFound()
  {
    return $this->view_err('404');
  }
}
