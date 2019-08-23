<?php
namespace App\Models\Domain;
/**
 * Classe métier représentant un article
 */
class Article extends Table
{
	public $id;
	public $titre;
	public $contenu;
	public $categorie;
	public $auteur;
	public $dateCreation;
	public $dateModification;

	function __construct()
	{

	}

	public function getUrl()
	{
		return 'index.php?p=post.article&id=' . $this->id;
	}
	public function getExtrait()
	{

		$html = '<p>' . substr($this->contenu, 0, 250) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '"> Voir la suite</a> </p>';
		return $html;
	}
}
?>