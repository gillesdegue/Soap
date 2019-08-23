<?php

namespace App\Models\Dao;

class ArticleModel extends Model
{
    protected $table = 'article';
    public function show($cmd)
    {
        return $this->query("select * from $this->table where id= ?", array($cmd), true);

    }

    public function insertArticle($article)
    {

        return $this->query("INSERT INTO $this->table (titre, contenu, categorie, auteur, dateCreation, dateModification) VALUES(?, ?, ?, ?, ?, ?)", array(
            $article->titre, $article->contenu, $article->categorie, $article->auteur,
            $article->dateModification, $article->dateCreation
        ));
    }

    public function updateArticle($article)
    {

        return $this->query("UPDATE $this->table set titre=?, contenu=?, categorie=?, dateModification=? where id=?", array(
            $article->titre, $article->contenu, $article->categorie,
            $article->dateModification, $article->id
        ));

    }

    public function deleteArticle($id)
    {
        return $this->query("DELETE from $this->table where id = ?", array($id));
    }

    public function all()
    {
        return $this->query(' select article.id, article.titre, article.contenu, categorie.libelle, utilisateur.pseudo, article.dateModification
               from ' . $this->table . ', categorie, utilisateur
                     where article.categorie=categorie.id and article.auteur = utilisateur.id ');
    }

    public function restAll()
    {
        return $this->queryArray(' select article.id, article.titre, article.contenu, categorie.libelle, utilisateur.pseudo, article.dateModification
               from ' . $this->table . ', categorie, utilisateur
                     where article.categorie=categorie.id and article.auteur = utilisateur.id ');
    }

    public function getAll($start, $limit)
    {
        return $this->query(' select article.id, article.titre, article.contenu, categorie.libelle
               from ' . $this->table . ', categorie
                     where article.categorie=categorie.id LIMIT ' . $start . ',' . $limit . ' ');
    }

    public function getByCategoryId($id)
    {
        return $this->query('select article.id, article.titre, article.contenu, categorie.libelle
               from ' . $this->table . ', categorie
                     where article.categorie=categorie.id and article.categorie = ' . $id);
    }

    public function getByCategory()
    {
        return $this->query('select article.id, article.titre, article.contenu, categorie.libelle, categorie.id
               from ' . $this->table . ', categorie
                     where article.categorie=categorie.id GROUP BY categorie.id');
    }

    public function getArticleByAuteur($id)
    {
        return $this->query('select article.id, article.titre, article.contenu, categorie.libelle, utilisateur.pseudo, article.dateModification
               from ' . $this->table . ', categorie, utilisateur
                     where article.categorie=categorie.id and article.auteur = utilisateur.id and article.auteur = ' . $id);
    }

    public function count()
    {
        return $this->rowCount(' SELECT * FROM ' . $this->table . ' ');
    }


}