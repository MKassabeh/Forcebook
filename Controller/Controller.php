<?php

abstract class Controller {
	protected function render(string $name, array $data = []): void
	{
		
		//Créé des variables automatiquement à
		//partir des clés du tableau $data
		extract($data);

		//On inclut ensuite nos 3 vues
		require_once __DIR__ . '/../View/header.html.php';
		require_once __DIR__ . '/../View/' . $name;
		require_once __DIR__ . '/../View/footer.html.php';
	}
}
