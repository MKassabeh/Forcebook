<?php

class UserController extends Controller {
	public function list() {
		//Je fais appel à mon manager
		$userManager = new UserManager();

		//Je lui demande la liste des utilisateurs
		$users = $userManager->findAll();

		//Je transmets cette liste à la vue
		$this->render('user/list.html.php', [
			'users' => $users
		]);
		
	}

	public function create() {
		$errors = [];
		$form_sent = false;
		$safe = array_map('trim', array_map('strip_tags', $_POST));
		//formulaire soumis
		if (isset($_POST['name']) && isset($_POST['email'])) {
			$form_sent = true;
			if (strlen($safe['name']) <= 0) {
				$errors[] = 'Veuillez saisir un nom';
			}

			if (strlen($safe['email']) <= 0) {
				$errors[] = 'Veuillez saisir un email';
			}

			if ((!filter_var($safe['email'], FILTER_VALIDATE_EMAIL))) {
				$errors[] = 'Veuillez saisir un email au format valide';
			}
			// succes
			if (count($errors) == 0) {
				// instance du manager
				$userManager = new UserManager();
				// création de l'objet contenant les informations pour l'insertion en bdd
				$user = new User();				
				$user->setName($safe['name'])->setEmail($safe['email']);
				$userManager->create($user);		
			// echec
			} else {
				
			}
		}
		// premier affichage
		
		$this->render('user/create.html.php', ['errors' => $errors, 'form_sent' => $form_sent]);

	}

	public function edit() {
		echo "EDIT";
	}

	public function delete() {
		echo "DELETE";
	}
}