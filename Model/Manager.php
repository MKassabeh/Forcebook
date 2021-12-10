<?php

abstract class Manager {
	protected $bdd;

	public function __construct() {
		//J'ouvre une connexion vers la base de données
		$bdd = new PDO(
			'mysql:host='.MYSQL_HOST.';dbname='. MYSQL_DB_NAME, 
			MYSQL_USER, 
			MYSQL_PASSWORD
		);

		//Je configure PDO pour faire quitter le programme si une erreur SQL est détectée
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//Je stocke l'objet PDO dans l'attribut "bdd" de ma classe
		$this->bdd = $bdd;
	}
}