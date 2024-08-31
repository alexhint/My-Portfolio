<?php

include "../config/database.php";
session_start();

if(isset($_POST['signupBtn'])){

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];

$name_regex = '/^(?! $)[a-zA-Z ]*$/';
$email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
$password_regex_upper = '/^(?=.*?[A-Z])/';
$password_regex_lower  = '/^(?=.*?[a-z])/';
$password_regex_digit  = '/^(?=.*?[0-9])/';
$password_regex_char  = '/^(?=.*?[#?!@$%^&*-])/';
$password_regex_length = '/^.{8,16}/';

$flag = false;


if(!$name){
    $_SESSION['name_error'] = "name field is required!!";
    $flag = true;
    header("location: signup.php");
}else if(!preg_match($name_regex,$name)){
    $flag = true;
    $_SESSION['name_error'] = "name field can't accept any numeric character!!";
    header("location: signup.php");
}else{
    $_SESSION['old_name'] = $name;
    header("location: signup.php");
}


if(!preg_match($email_regex,$email)){
    $flag = true;
    $_SESSION['email_error'] = "please enter a valid email!!";
    header("location: signup.php");
}else if(!$email){
    $flag = true;
    $_SESSION['email_error'] = "email field is required!!";
    header("location: signup.php");
}else{
    $_SESSION['old_email'] = $email;
    header("location: signup.php");
}

if(!$password){
    $flag = true;
    $_SESSION['password_error'] = "password field is required!!";
    header("location: signup.php");
}else if(!preg_match($password_regex_upper,$password)){
    $flag = true;
    $_SESSION['password_error'] = "please enter at least one upper case!!";
    header("location: signup.php");
}else if(!preg_match($password_regex_lower,$password)){
    $flag = true;
    $_SESSION['password_error'] = "please enter At least one lower case English letter!!";
    header("location: signup.php");
}else if(!preg_match($password_regex_digit,$password)){
    $flag = true;
    $_SESSION['password_error'] = "please enter At least one digit!!";
    header("location: signup.php");
}else if(!preg_match($password_regex_char,$password)){
    $flag = true;
    $_SESSION['password_error'] = "please enter At least one special character!!";
    header("location: signup.php");
}else if(!preg_match($password_regex_length,$password)){
    $flag = true;
    $_SESSION['password_error'] = "please enter Minimum eight in length!!";
    header("location: signup.php");
}


if(!$c_password){
    $flag = true;
    $_SESSION['cpassword_error'] = "confirm password field is required!!";
    header("location: signup.php");
}else if($c_password != $password){
    $flag = true;
    $_SESSION['cpassword_error'] = "credential doesn't match!!";
    header("location: signup.php");
}



if(!$flag){

   $encyrpt_pass = sha1($password);
   $query = "INSERT INTO users (name,password,email) VALUES ('$name','$encyrpt_pass','$email')";
   mysqli_query($db_connect,$query);
   $_SESSION['register_complete'] = "Congretulatons!! Register Complete,";
   $_SESSION['register_name'] = "$name";
   $_SESSION['register_email'] = "$email";

   header('location: signin.php');
}


}


// register page end


// login page start


if(isset($_POST['loginbtn'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower  = '/^(?=.*?[a-z])/';
    $password_regex_digit  = '/^(?=.*?[0-9])/';
    $password_regex_char  = '/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length = '/^.{8,16}/';
    $flag = false;

    if(!preg_match($email_regex,$email)){
        $flag = true;
        $_SESSION['email_error'] = "please enter a valid email!!";
        header("location: signin.php");
    }else if(!$email){
        $flag = true;
        $_SESSION['email_error'] = "email field is required!!";
        header("location: signin.php");
    }
    
    if(!$password){
        $flag = true;
        $_SESSION['password_error'] = "password field is required!!";
        header("location: signin.php");
    }else if(!preg_match($password_regex_upper,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter at least one upper case!!";
        header("location: signin.php");
    }else if(!preg_match($password_regex_lower,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter At least one lower case English letter!!";
        header("location: signin.php");
    }else if(!preg_match($password_regex_digit,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter At least one digit!!";
        header("location: signin.php");
    }else if(!preg_match($password_regex_char,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter At least one special character!!";
        header("location: signin.php");
    }else if(!preg_match($password_regex_length,$password)){
        $flag = true;
        $_SESSION['password_error'] = "please enter Minimum eight in length!!";
        header("location: signin.php");
    }



    // login proccess start

    if(!$flag){
        $encrypt = sha1($password);
        $query = "SELECT COUNT(*) AS 'valid' FROM users WHERE email='$email' AND password='$encrypt'";
        $connect = mysqli_query($db_connect,$query);

        $result = mysqli_fetch_assoc($connect);
        
        if($result['valid'] == 1){

            $query = "SELECT * FROM users WHERE email='$email' AND password='$encrypt'";
            $connect = mysqli_query($db_connect,$query);
            $author = mysqli_fetch_assoc($connect);

            $_SESSION['author_name'] = $author['name'];
            $_SESSION['temp_name'] = $author['name'];
            $_SESSION['author_id'] = $author['id'];
            $_SESSION['author_email'] = $author['email'];
            $_SESSION['author_img'] = $author['image'];

            header('location: ../backend/home/home.php');


        }else{
            $_SESSION['login_failed'] = "credential doesn't match!!";
            header("location: signin.php");
        }
    }

}





?>