<?php

include '../master/header.php';

?>


<div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Profile</h1>
            </div>
        </div>
</div>


<div class="row">
<div class="col-6">
    <?php if(isset($_SESSION['nameupdate'])) :  ?>
            <div id="emailHelp" class="form-text text-success">
                <?= $_SESSION['nameupdate'] ?>
            </div>
            <?php endif; unset($_SESSION['nameupdate']); ?>
        <div class="card">
            <div class="card-header">
                <h3>username update</h3>
            </div>
            <form action="update.php" method="POST">
            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">username</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <?php if(isset($_SESSION['nameError'])) :  ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $_SESSION['nameError'] ?>
            </div>
            <?php endif; unset($_SESSION['nameError']); ?>
            <button type="submit" name="nameubtn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Add</button>   
        </div>
            </form>
        </div>
</div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>password update</h3>
            </div>
            <form action="update.php" method="POST">
            <div class="card-body">

            <?php if(isset($_SESSION['passError'])) :  ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $_SESSION['passError'] ?>
            </div>
            <?php endif; unset($_SESSION['passError']); ?>


            <?php if(isset($_SESSION['password_update'])) :  ?>
            <div id="emailHelp" class="form-text text-success">
                <?= $_SESSION['password_update'] ?>
            </div>
            <?php endif; unset($_SESSION['password_update']); ?>

            <label for="exampleInputEmail1" class="form-label mb-2" >old password</label>
            <input type="password" name="old_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label  my-2">new password</label>
            <input type="password" name="new_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <label for="exampleInputEmail1" class="form-label  my-2">confirm password</label>
            <input type="password" name="con_pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
            <button type="submit" name="passubtn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Add</button>   
        </div>
            </form>
        </div>
    </div>

<!-- image part start -->

<div class="col-6">

        <div class="card">
            <div class="card-header">
                <h3>Profile Picture</h3>
            </div>
            <form action="update.php" method="POST" enctype="multipart/form-data">

            <div class="card-body">
            <label for="exampleInputEmail1" class="form-label">Image Upload</label>
            <input type="file" name="picture" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            <button type="submit" name="imageubtn" class="btn btn-primary mt-3"><i class="material-icons">add</i>Add</button>   
        </div>
            </form>
        </div>
</div>


</div>

<?php

include '../master/footer.php';

?>