<h1>Liste des utilisateurs</h1>

<div class="card">
	<div class="card-body">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
					<tr>
						<td><?= $user->getId(); ?></td>
						<td><?= $user->getName(); ?></td>
						<td><?= $user->getEmail(); ?></td>
						<td>
							<a class="btn btn-primary" href="index.php?ctrl=user&method=edit&user=<?= $user->getId(); ?>">Edit
							</a>
							<a onclick="return confirm('Confirmer la suppression.');" class="btn btn-danger" href="index.php?ctrl=user&method=delete&user=<?= $user->getId(); ?>">Delete</a>
							<a class="btn btn-success" href="index.php?ctrl=user&method=create">Add</a>
							</a>
						</td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>