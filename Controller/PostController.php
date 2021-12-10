<?php

class PostController extends Controller
{
	public function list()	{
		
		//Je fais appel à mon manager
		$postManager = new PostManager();

		//Je lui demande la liste des utilisateurs
		$posts = $postManager->findAll();

		//Je transmets cette liste à la vue
		$this->render('post/list.html.php', [
			'posts' => $posts
		]);
	}

	public function create()
	{
		$this->render('post/create.html.php');
		echo 'CREATE POST';
	}

	public function edit()
	{
		$this->render('post/edit.html.php');
		echo 'EDIT POST';
	}


	public function delete()
	{
		$this->render('post/list.html.php');
		echo 'DELETE POST';
	}
}
