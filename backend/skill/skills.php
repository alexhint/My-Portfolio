<?php

include '../../config/database.php';
include "../master/header.php";

$skill_query = "SELECT * FROM skills";
$skills = mysqli_query($db_connect,$skill_query);


?>

<div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Service Page</h1>
            </div>
        </div>
</div>


<?php if(isset($_SESSION['skills_success'])) : ?>
<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['skills_success']?></span>
                <!-- <span class="alert-text">Your E-mail is - <?= $_SESSION['author_email'] ?></span> -->
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['skills_success']); ?>






<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Users Information,</h5>
                    <a href="create.php" name="passubtn" class="btn btn-primary"><i class="material-icons">add</i>Create</a>   
                </div>
                <div class="card-body">
                <div class="example-content">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Ratio</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    <?php 
                                    $num = 1;
                                    foreach($skills as $skill): ?>
                                    <tr>
                                        <th scope="row">
                                        <?= $num++ ?>
                                        </th>
                                        <td>
                                        <?= $skill['title'] ?>
                                        </td>
                                        <td>
                                        <?= $skill['year'] ?>
                                        </td>
                                        <td>
                                        <?= $skill['ratio'] ?>
                                        </td>
                                        <td>
                                            <a href="store.php?statusid=<?= $skill['id'] ?>" class="<?= ($skill['status'] == 'active') ? 'badge bg-success' : 'badge bg-danger' ?>">
                                            <?= $skill['status'] ?>
                                            </a>
                                        </td>
                                        <td>
                                           <div class="d-flex justify-content-around">
                                           <a href="edit.php?editid=<?= $skill['id'] ?>" class="text-primary">
                                                <i class="fa-3x fa fa-cut"></i>
                                            </a>
                                            <a href="store.php?id=<?= $skill['id'] ?>" class="text-danger">
                                                <i class="fa-3x fa fa-trash-o"></i>
                                            </a>
                                           </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;  ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>

<?php

include "../master/footer.php";

?>