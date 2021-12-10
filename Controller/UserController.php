<?php

class UserController extends Controller
{
	public function list()
	{
		//Je fais appel à mon manager
		$userManager = new UserManager();

		//Je lui demande la liste des utilisateurs
		$users = $userManager->findAll();

		//Je transmets cette liste à la vue
		$this->render('user/list.html.php', [
			'users' => $users
		]);
	}

	public function create()
	{
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
			}
			// premier affichage
		}

		$this->render('user/create.html.php', ['errors' => $errors, 'form_sent' => $form_sent]);
	}

	public function edit()
	{

		// instance du manager
		$userManager = new UserManager();
		// création de l'objet contenant les informations pour l'insertion en bdd
		$user = $userManager->find($_GET['user']);

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

				$user->setName($safe['name'])->setEmail($safe['email']);
				$userManager->update($user);
				// echec
			}
		}
		$this->render('user/edit.html.php', ['errors' => $errors, 'form_sent' => $form_sent, 'user' => $user]);
	}


	public function delete()
	{

		// Select puis delete
		$userManager = new UserManager();

		$user = $userManager->find($_GET['user']);

		$userManager->delete($user);

		header('Location: index.php?ctrl=user&method=list'); // renvoi vers la page d'accueil



	}
}
