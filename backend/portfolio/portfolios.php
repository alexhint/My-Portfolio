<?php

include '../../config/database.php';
include "../master/header.php";

$portfolios_query = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db_connect,$portfolios_query);
$portfolio = mysqli_fetch_assoc($portfolios);


?>

<div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Portfolios Page</h1>
            </div>
        </div>
</div>


<?php if(isset($_SESSION['port_complete'])) : ?>
<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['port_complete']?></span>
                <!-- <span class="alert-text">Your E-mail is - <?= $_SESSION['author_email'] ?></span> -->
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_complete']); ?>


<?php if(isset($_SESSION['port_complete_delete'])) : ?>
<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['port_complete_delete']?></span>
                <!-- <span class="alert-text">Your E-mail is - <?= $_SESSION['author_email'] ?></span> -->
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['port_complete_delete']); ?>


<?php if(isset($_SESSION['service_status'])) : ?>
<div class="row">
    <div class="col">
    <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['service_status']?></span>
                <!-- <span class="alert-text">Your E-mail is - <?= $_SESSION['author_email'] ?></span> -->
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['service_status']); ?>



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
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($portfolio)): ?>
                                        <tr>
                                            <td colspan="5" class="text-danger text-center">no data found!!</td>
                                        </tr>
                                    <?php else : ?>
                                <?php 
                                    $num = 1;
                                    foreach($portfolios as $portfolio) : ?>
                                    <tr>
                                        <th scope="row">
                                        <?= $num++ ?>
                                        </th>
                                        <td>
                                            <img src="../../public/uploads/portfolio/<?= $portfolio['image'] ?>" alt="" style="width: 80px; height:80px; object-fit:cover;">
                                        </td>
                                        <td>
                                        <?= $portfolio['title'] ?>
                                        </td>
                                        <td>
                                            <a href="store.php?statusid=<?= $portfolio['id'] ?>" class="<?= ($portfolio['status'] == 'active') ? 'badge bg-success' : 'badge bg-danger' ?>">
                                            <?= $portfolio['status'] ?>
                                            </a>
                                        </td>
                                        <td>
                                           <div class="d-flex justify-content-around">
                                           <a href="edit.php?editid=<?= $portfolio['id'] ?>" class="text-primary">
                                                <i class="fa-3x fa fa-cut"></i>
                                            </a>
                                            <a href="store.php?delete_id=<?= $portfolio['id'] ?>" class="text-danger">
                                                <i class="fa-3x fa fa-trash-o"></i>
                                            </a>
                                           </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; ?>
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