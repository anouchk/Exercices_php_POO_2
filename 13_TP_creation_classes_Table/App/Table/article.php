<?php

namespace App\Table;

use App\App;

class Article extends Table {

	protected static $table= 'articles';

	public static function getLast() {
		// attention query c'est une fonction maison
		return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON category_id = categories.id
		") ;
	}

	public static function lastByCategory($category_id) {
		// attention query c'est une fonction maison
		return self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON category_id = categories.id
			WHERE category_id=?
		", [$category_id]) ;
	}

	public function getUrl() {

		return 'index1.php?p=article&id=' . $this->id;
	}

	public function getExtrait () {
		$html = '<p>' . substr($this->contenu, 0, 15) . ' ...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
		return $html;
	}

}