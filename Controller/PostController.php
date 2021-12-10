<?php

class PostController extends Controller
{
	public function list()	{
		
		$this->render('post/list.html.php');
		echo 'LISTE POSTS';
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
