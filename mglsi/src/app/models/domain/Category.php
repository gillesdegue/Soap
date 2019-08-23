<?php

namespace App\Models\Domain;
/**
 * Classe métier représentant une catégorie
 */
class Category extends Table
{
	public $id;
	public $libelle;

	function __construct()
	{

	}

	public function getUrl()
	{
		return '/categorie?id=' . $this->id;
	}
}
?>