<?php

session_start();

include '../../config/database.php';

if(isset($_POST['nameubtn'])){
    $name = $_POST['name'];

    if($name){
        $id = $_SESSION['author_id'];
        $update_query = "UPDATE users SET name='$name' WHERE id='$id'";
        mysqli_query($db_connect,$update_query);
        $_SESSION['nameupdate'] = "name update successfull";
        $_SESSION['author_name'] = $name;
        header("location: profile.php");
    }else{
        $_SESSION['nameError'] = "please fillup name field!";
        header("location: profile.php");
    }

}



if(isset($_POST['passubtn'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];

    if($old_pass && $new_pass && $con_pass){
        $id = $_SESSION['author_id'];
        $old_e = sha1($old_pass);
        $count_query = "SELECT COUNT(*) AS 'result' FROM `users` WHERE id='$id' AND password='$old_e'";
        $connect = mysqli_query($db_connect,$count_query);
        $result = mysqli_fetch_assoc($connect)['result'];

        if($result == 1){
            if($new_pass == $con_pass){
                $new_e = sha1($new_pass);
                $update_query = "UPDATE users SET password='$new_e' WHERE id='$id'";
                mysqli_query($db_connect,$update_query);
                $_SESSION['password_update'] = "password update successfull";
                header("location: profile.php");
            }else{
                $_SESSION['passError'] = "beta age mila then entry kor!";
        header("location: profile.php");
            }
        }else{
            $_SESSION['passError'] = "error paise";
        header("location: profile.php");
        }

    }else{
        $_SESSION['passError'] = "please fillup pass field!";
        header("location: profile.php");
    }

}



if(isset($_POST['imageubtn'])){
    $image = $_FILES['picture']['name'];
    $tmp = $_FILES['picture']['tmp_name'];
    if($image){
        $id = $_SESSION['author_id'];
        $authname = $_SESSION['author_name'];
        $explode = explode('.', $image);
        $extension = end($explode);
        $new_name = $id . "-" . $authname . '-' . date("d-m-Y") .'-'. rand(0,9999) ."." . $extension;

        $localpath = "../../public/uploads/profile/" . $new_name;

        if(move_uploaded_file($tmp,$localpath)){
            $update_query = "UPDATE users SET image='$new_name' WHERE id='$id'";
            mysqli_query($db_connect,$update_query);
            header("location: profile.php");
        }else{
           echo 'kharap';
        }


    }


    // if($name){
    //     $id = $_SESSION['author_id'];
    //     $update_query = "UPDATE users SET name='$name' WHERE id='$id'";
    //     mysqli_query($db_connect,$update_query);
    //     $_SESSION['nameupdate'] = "name update successfull";
    //     $_SESSION['author_name'] = $name;
    //     header("location: profile.php");
    // }else{
    //     $_SESSION['nameError'] = "please fillup name field!";
    //     header("location: profile.php");
    // }

}


?>
