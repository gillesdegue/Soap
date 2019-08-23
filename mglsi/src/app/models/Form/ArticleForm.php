<?php

namespace App\Models\Form;

use App\Models\Domain\Article;
use App\Models\Dao\ArticleModel;


class ArticleForm
{
    public function createArticle($post)
    {
        $id = $_POST['edit_id'];
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $contenu = $_POST['contenu'];
        $category = $_POST['category'];
        $cmd = $_POST['form_name'];
        $articlemodel = new ArticleModel();
        $article = new Article();
        $article->id = $id;
        $article->titre = $titre;
        $article->auteur = $auteur;
        $article->contenu = $contenu;
        $article->categorie = $category;
        $article->dateModification = date('Y-m-d H:m:i');
        $article->dateCreation = date('Y-m-d H:m:i');
        if ($article->id != '0') {
            if ($articlemodel->updateArticle($article)) {
                return "1";
            } else {
                return "0";
            }
        } else {
            if ($articlemodel->insertArticle($article)) {
                return "1";
            } else {
                return "0";
            }

        }
    }

    public function deleteArticle($id)
    {
        $article = new ArticleModel();
        if ($article->deleteArticle($id)) {
            return "1";
        } else {
            return "0";
        }
    }
}