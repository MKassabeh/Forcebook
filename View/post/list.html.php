<h1>Liste des utilisateurs</h1>

<div class="card">
    <div class="card-body">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Content</th>
                    <th>Created_by</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?= $post->getId(); ?></td>
                        <td style="max-width : 750px;"><?= $post->getContent(); ?></td>
                        <td><?= $post->getCreated_by(); ?></td>
                        <td><?= $post->getCreated_at(); ?></td>
                        <td>
                            <a class="btn btn-primary" href="index.php?ctrl=post&method=edit&post=<?= $post->getId(); ?>">Edit
                            </a>
                            <a onclick="return confirm('Confirmer la suppression.');" class="btn btn-danger" href="index.php?ctrl=post&method=delete&post=<?= $post->getId(); ?>">Delete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>
<div class="container text-center">
    <a class="btn btn-success" href="index.php?ctrl=post&method=create">
        Add a new post
    </a>

</div>