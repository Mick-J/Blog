<?php 
namespace App\Table;

use Core\Table\Table;
/**
 * 
 */
class PostTable extends Table
{
	protected $table = 'articles';
	/**
	 * recupere les derniers articles
	 * @return array
	 */
	public function last()
	{
		return $this->query("
			SELECT articles.id, articles.titre, contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON articles.category_id = categories.id
			ORDER BY articles.date DESC
		");
	}

	/**
	 * recupere les derniers articles en liant la categorie associee
	 * @param $id int
	 * @return \App\Entity\PostEntity
	 */
	public function lastByCategory($category_id)
	{
		return $this->query("
			SELECT articles.id, articles.titre, contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON articles.category_id = categories.id
			WHERE articles.category_id = ?
			ORDER BY articles.date DESC
		", [$category_id]);
	}

	/**
	 * recupere les derniers articles en liant la categorie associee
	 * @param $id int
	 * @return array
	 */
	public function find($id)
	{
		return $this->query("
			SELECT articles.id, articles.titre, contenu, categories.titre as categorie 
			FROM articles 
			LEFT JOIN categories 
				ON articles.category_id = categories.id
			WHERE articles.id = ?
		", [$id], true);
	}
}