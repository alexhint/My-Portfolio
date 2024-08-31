<?php
session_start();


include '../../config/database.php';

if (isset($_POST['insert'])) {

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if ($title && $description && $subtitle && $image) {
        $tmp = $_FILES['image']['tmp_name'];
        $id = $_SESSION['author_id'];
        $authname = $_SESSION['author_name'];
        $explode = explode('.', $image);
        $extension = end($explode);
        $new_name = $id . "-" . $title . '-' . date("d-m-Y") . '-' . rand(0, 9999) . "." . $extension;

        $localpath = "../../public/uploads/portfolio/" . $new_name;

        if (move_uploaded_file($tmp, $localpath)) {
            $query = "INSERT INTO portfolios (title,subtitle,description,image) VALUES ('$title','$subtitle','$description','$new_name')";
            mysqli_query($db_connect, $query);
            $_SESSION['port_complete'] = "New Portfolio Insert Complete";
            header("location: portfolios.php");
        }
    } else {
        header('location: portfolios.php');
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db_connect, $port_query);
    $portfolio = mysqli_fetch_assoc($connect);

    if ($portfolio['image']) {
        $oldname = $portfolio['image'];
        $existspath = "../../public/uploads/portfolio/" . $oldname;

        if (file_exists($existspath)) {
            unlink($existspath);
            $delete_query = "DELETE FROM portfolios WHERE id='$id'";
            mysqli_query($db_connect, $delete_query);
            $_SESSION['port_complete_delete'] = "Portfolio Delete Successfull!!";
            header('location: portfolios.php');
        }
    }
}


if (isset($_GET['updateid'])) {
    $uid = $_GET['updateid'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $new_name = $id . "-" . $title . '-' . date("d-m-Y") . '-' . rand(0, 9999) . "." . $extension;
    $localpath = "../../public/uploads/portfolio/" . $new_name;

    if ($image) {
        $select_query_for_delete_img = "SELECT * FROM portfolios WHERE id='$uid'";
        $connect_select = mysqli_query($db_connect, $select_query_for_delete_img);
        $port = mysqli_fetch_assoc($connect_select);
        $oldimage = $port['image'];

        if ($oldimage) {
            $existspath =  "../../public/uploads/portfolio/" . $oldimage;
            if (file_exists($existspath)){
                unlink($existspath);
            }
        }
        if (move_uploaded_file($tmp, $localpath)) {
            $query = "UPDATE portfolios SET title='$title',subtitle='$subtitle',description='$description',image='$new_name' WHERE id='$uid'";
            mysqli_query($db_connect, $query);
            $_SESSION['port_complete'] = "Portfolio update Complete";
            header("location: portfolios.php");
        }
    } else {
        $query = "UPDATE portfolios SET title='$title',subtitle='$subtitle',description='$description' WHERE id='$uid'";
        mysqli_query($db_connect, $query);
        $_SESSION['port_complete'] = "Portfolio update Complete";
        header("location: portfolios.php");
    }
}


if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $select_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db_connect, $select_query);
    $portfolio = mysqli_fetch_assoc($connect);

    if ($portfolio['status'] == 'deactive') {
        $update_query = "UPDATE portfolios SET status='active' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);

        $_SESSION['port_complete'] = "Service Status Update Successfull!!";
        header('location: portfolios.php');
    }else{
        $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);

        $_SESSION['port_complete'] = "Service Status Update Successfull!!";
        header('location: portfolios.php');
    }

}




?>
