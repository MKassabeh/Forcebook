<h1>Liste des utilisateurs</h1>

<div class="card">
	<div class="card-body">

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user): ?>
					<tr>
						<td><?= $user->getId(); ?></td>
						<td><?= $user->getName(); ?></td>
						<td><?= $user->getEmail(); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>