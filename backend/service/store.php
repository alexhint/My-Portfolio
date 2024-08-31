<?php
session_start();


include '../../config/database.php';

if (isset($_POST['insert'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if ($title && $description && $icon) {
        $query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";

        mysqli_query($db_connect, $query);
        $_SESSION['service_complete'] = "New Service Added Successfull!!";
        header('location: services.php');
    } else {
        header('location: services.php');
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM services WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    $_SESSION['service_complete_delete'] = "Service Delete Successfull!!";
    header('location: services.php');
}


if (isset($_GET['statusid'])) {
    $id = $_GET['statusid'];

    $select_query = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db_connect, $select_query);
    $service = mysqli_fetch_assoc($connect);

    if ($service['status'] == 'deactive') {
        $update_query = "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);

        $_SESSION['service_status'] = "Service Status Update Successfull!!";
        header('location: services.php');
    }else{
        $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);

        $_SESSION['service_status'] = "Service Status Update Successfull!!";
        header('location: services.php');
    }


    // $delete_query = "DELETE FROM services WHERE id='$id'";
    // mysqli_query($db_connect,$delete_query);
    //     $_SESSION['service_complete_delete'] = "Service Delete Successfull!!";
    //    header('location: services.php');
}


if (isset($_POST['update'])) {

    if(isset($_GET['update_id'])){
        $id = $_GET['update_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
    
        if ($title && $description && $icon) {
            $query =  "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
            mysqli_query($db_connect, $query);
            $_SESSION['service_complete'] = "Service Update Successfull!!";
            header('location: services.php');
        } else {
            header('location: services.php');
        }
    }
}
