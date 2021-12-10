<div class="container">
    <h1>User management</h1>

    <div class="card">
        <form method="POST" novalidate>
            <div class="card-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.fr">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="User name">
                </div>
                <div class="text-center mb-3">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>


<?php if (!empty($errors)){ echo '<div class="alert alert-danger">'.implode("<br>", $errors).'</div>';} ?>

<?php if ($form_sent && empty($errors)){echo '<div class="alert alert-success"> Utilisateur ajouté ! </div>';}?>
      
