<?php

require_once 'User.php';

class UserManager extends Manager
{
	public function findAll(): array
	{
		//Je récupère tous mes users (array)
		$sql = 'SELECT * FROM user';
		$query = $this->bdd->prepare($sql);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);

		//Je les convertis en objet
		$users = [];
		foreach($results as $result) {
			$user = new User();
			$user->setId($result['id']);
			$user->setName($result['name']);
			$user->setEmail($result['email']);
			$users[] = $user;
		}

		//Je retourne mon tableau d'objets User
		return $users;
	}

	/**
	 * Récupère un objet User à partir de son ID
	 */
	public function find(int $id): User
	{
		//SELECT... WHERE ...
		$sql = 'SELECT * FROM user WHERE id = :id';
		$query = $this->bdd->prepare($sql);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();

		//Je récupère la ligne issue de ma base de données (array)
		$result = $query->fetch(PDO::FETCH_ASSOC);

		//Je la converti en objet User
		$user = new User();
		$user->setId($result['id']);
		$user->setName($result['name']);
		$user->setEmail($result['email']);

		//Je retourne mon objet User issu de ma base de données
		return $user;
	}

	public function create(User $user): void
	{
		$sql = 'INSERT INTO user(name, email) VALUES(:name, :email);';
		$query = $this->bdd->prepare($sql);
		$query->bindValue(':name', $user->getName());
		$query->bindValue(':email', $user->getEmail());
		$query->execute();
	}

	public function update(User $user): void
	{
		$sql = 'UPDATE user SET name = :name, email = :email WHERE id = :id;';
		$query = $this->bdd->prepare($sql);
		$query->bindValue(':name', $user->getName());
		$query->bindValue(':email', $user->getEmail());
		$query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
		$query->execute();
	}

	public function delete(User $user): void
	{
		$sql = 'DELETE FROM user WHERE id = :id;';
		$query = $this->bdd->prepare($sql);		
		$query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
		$query->execute();
	}
}