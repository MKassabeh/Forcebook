<?php


function model(): array {
	return [
		['id' => 1, 'name' => 'Violette'],
		['id' => 2, 'name' => 'Olivier'],
	];
}

function view(array $users): string {
	$html = "<ul>";
	foreach($users as $user) {
		$html .= "<li>". $user['name'] ."</li>";
	}
	$html .= "</ul>";

	return $html;
}

function controller() {
	$users = model();
	echo view($users);
}

controller();