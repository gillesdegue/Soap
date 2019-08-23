<?php

/**
 * Created by PhpStorm.
 * User: Khall
 * Date: 23/04/2018
 * Time: 02:08
 */

namespace App\Controllers;

use App\Models\Dao\CategoryDao;



class HomeController extends Controller
{
    public function index()
    {

        $category = new CategoryModel();
        //var_dump($category->all());
        $category->test();
        //$this->view('home');

    }

    public function notFound()
    {
        return $this->view_err('404');
    }
}
