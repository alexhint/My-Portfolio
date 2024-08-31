<?php

include '../../config/database.php';

session_start();

if(isset($_POST['insert'])){
    

    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST['ratio']; 

    if($title && $year && $ratio){
        $query = "INSERT INTO skills (title,year,ratio) VALUES ('$title','$year','$ratio')";
        mysqli_query($db_connect,$query);
        $_SESSION['skills_success'] = "New Skill Added Successfull";
        header('location: skills.php');
    }

}

?>