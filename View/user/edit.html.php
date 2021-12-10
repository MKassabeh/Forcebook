<div class="row">
    <div class="col-6">
        <div class="container">
            <h1>Edit Email</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-10">
        <div class="container">
              
            <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="<?=$user->getName();?>">
                </div>
            
                <div class="mb-3">
                <label for="email" class="form-label">New Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="<?=$user->getEmail();?>">
                </div>
            
                <div class="mb-3">
                <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?php if (!empty($errors)){ echo '<div class="alert alert-danger">'.implode("<br>", $errors).'</div>';} ?>

<?php if ($form_sent && empty($errors)){echo '<div class="alert alert-success"> Utilisateur modifié ! </div>';}?>