<?php

require_once __DIR__ . '/config.php';

require_once __DIR__ . '/Controller/Controller.php';
require_once __DIR__ . '/Controller/UserController.php';
require_once __DIR__ . '/Model/Manager.php';
require_once __DIR__ . '/Model/User.php';
require_once __DIR__ . '/Model/UserManager.php';
require_once __DIR__ . '/Model/Post.php';
require_once __DIR__ . '/Model/PostManager.php';
require_once __DIR__ . '/Controller/PostController.php';

//URL de ce genre :
//http://localhost/mon-projet/index.php?ctrl=user&method=list
//http://localhost/mon-projet/index.php?ctrl=user&method=create

//Version longue
if (isset($_GET['ctrl'])) {
	$ctrl = $_GET['ctrl'];
} else {
	$ctrl = 'user';
}

//Version courte
$method = $_GET['method'] ?? 'list';

if ($ctrl == 'user') {
	//Version très longue
	$controller = new UserController();

	/*
	Version longue
	if(method_exists($controller, $method)) {
		$controller->$method(); Version courte
	} else {
		die('404 Not Found');
	}
	*/

	switch ($method) {
		case 'list':
			$controller->list();
			break;
		case 'create':
			$controller->create();
			break;
		case 'edit':
			$controller->edit();
			break;
		case 'delete':
			$controller->delete();
			break;
		default:
			die('404 Not Found');
			break;
	}
} else if($ctrl == 'post') {

	$controller = new PostController();
	switch ($method) {
		case 'list':
			$controller->list();
			break;
		case 'create':
			$controller->create();
			break;
		case 'edit':
			$controller->edit();
			break;
		case 'delete':
			$controller->delete();
			break;
		default:
			die('404 Not Found');
			break;
	}
} else {
	die('404 Not Found');
}

//$userManager = new UserManager();
//$user = $userManager->find(1);
//var_dump($user);
//die;