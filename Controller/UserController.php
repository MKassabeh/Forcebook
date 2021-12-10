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
		$this->render('user/create.html.php');
	}

	public function create() {
		echo "CREATE";
	}

	public function edit() {
		echo "EDIT";
	}

	public function delete() {
		echo "DELETE";
	}
}