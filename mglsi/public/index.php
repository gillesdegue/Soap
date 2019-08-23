<?php
require '../vendor/autoload.php';
session_start();
ini_set('display_errors', 'On');
ini_set("soap.wsdl_cache_enabled", "0");
error_reporting(E_ALL);
$routeur = new App\Router\Router($_GET['url']);


$routeur->get("/", 'PagesController@home');
$routeur->get("/home", 'PagesController@home');
$routeur->get("/categorie", 'PagesController@categorie');
$routeur->get("/page", 'PagesController@home');
$routeur->get("/login", 'AuthController@login');
$routeur->get("/admin/article", 'ArticleController@index');
$routeur->get("/admin/article/show", 'ArticleController@show');
$routeur->get("/admin/categorie", 'CategoryController@index');
$routeur->get("/admin/categorie/show", 'CategoryController@show');
$routeur->get("/admin/user", 'UserController@index');
$routeur->get("/admin/user/show", 'UserController@show');
$routeur->get("/editeur/article", 'EditeurController@indexArticle');
$routeur->get("/editeur/article/show", 'EditeurController@showArticle');
$routeur->get("/editeur/categorie", 'EditeurController@indexCategory');
$routeur->get("/editeur/categorie/show", 'EditeurController@showCategory');
$routeur->post("/login", 'AuthController@login');
$routeur->post("/admin/categorie/create", 'CategoryController@create');
$routeur->post("/admin/categorie/delete", 'CategoryController@delete');
$routeur->post("/admin/user/create", 'UserController@create');
$routeur->post("/admin/user/delete", 'UserController@delete');
$routeur->post("/admin/article/create", 'ArticleController@create');
$routeur->post("/admin/article/delete", 'ArticleController@delete');
$routeur->post("/editeur/article/delete", 'EditeurController@deleteArticle');
$routeur->post("/editeur/article/create", 'EditeurController@createArticle');
$routeur->post("/editeur/categorie/delete", 'EditeurController@deleteCategory');
$routeur->post("/editeur/categorie/create", 'EditeurController@createCategory');
$routeur->get("/logout", 'AuthController@logout');
$routeur->get("/404", 'PagesController@notFound');
//Soap Route
$routeur->get("/soap", 'SoapServiceController@server');
$routeur->post("/soap", 'SoapServiceController@server');
$routeur->get("/soap/wsdl", 'SoapServiceController@autodiscover');
//RESTFUL API
$routeur->get("/rest/allarticle", 'RestServiceController@allArticle');
$routeur->get("/rest/getarticle", 'RestServiceController@getArticleByID');
$routeur->get("/rest/getByCategory", 'RestServiceController@getArticleByCategory');
//$routeur->post("/", 'AuthController@login');
//$routeur->get("/home", 'PagesController@home');
//$routeur->get("/logout", 'AuthController@logout');
//$routeur->get("/modele", 'ModelesController@index');
//$routeur->get("/trig_modele", 'ModelesController@trig');
//$routeur->post("/modele/create", 'ModelesController@create');
//$routeur->get("/modele/show", 'ModelesController@show');
//$routeur->post("/modele/delete", 'ModelesController@delete');
//$routeur->get("/sgbd", 'SGBDController@index');
//$routeur->get("/trig_sgbd", 'SGBDController@trig');
//$routeur->post("/sgbd/create", 'SGBDController@create');
//$routeur->get("/sgbd/show", 'SGBDController@show');
//$routeur->post("/sgbd/delete", 'SGBDController@delete');
//$routeur->get("/appli", 'AppController@index');
//$routeur->get("/trig_appli", 'AppController@trig');
//$routeur->post("/appli/create", 'AppController@create');
//$routeur->get("/appli/show", 'AppController@show');
//$routeur->post("/appli/delete", 'AppController@delete');



$routeur->run();


