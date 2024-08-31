<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../public/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/dashboard/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../public/dashboard/assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../public/dashboard/assets/css/main.min.css" rel="stylesheet">
    <link href="../public/dashboard/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../public/dashboard/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/dashboard/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="signin.php">Sign In</a></p>
            <form action="manage.php" method="POST">
            <div class="auth-credentials m-b-xxl">
                <label for="signUpUsername" class="form-label">Name</label>
                <input type="text" class="form-control m-b-md <?php echo (isset($_SESSION['name_error'])) ? 'is-invalid' : '' ?>" placeholder="Enter Name" name="username" value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name'] : ''; unset($_SESSION['old_name'])  ?>">
                <?php if(isset($_SESSION['name_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['name_error'] ?>*</div>
                <?php } unset($_SESSION['name_error']) ?>



                <label for="signUpEmail" class="form-label">Email address</label>
                <input type="text" class="form-control m-b-md"  placeholder="example@neptune.com" name="email" value="<?= (isset($_SESSION['old_email'])) ? $_SESSION['old_email'] : ''; unset($_SESSION['old_email'])  ?>">
                <?php if(isset($_SESSION['email_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['email_error'] ?>*</div>
                <?php } unset($_SESSION['email_error']) ?>

                <label for="signUpPassword" class="form-label">Password</label>
                <input id="rajakar" type="password" class="form-control"  placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="password">
                <div class="my-2">
                <input type="checkbox" onclick="myFun()">Show Password
                </div>
                <?php if(isset($_SESSION['password_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['password_error'] ?>*</div>
                <?php } unset($_SESSION['password_error']) ?>

                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control"  placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="c_password">
                <?php if(isset($_SESSION['cpassword_error'])) { ?>
                <div id="emailHelp" class="form-text m-b-md text-danger"><?php echo $_SESSION['cpassword_error'] ?>*</div>
                <?php } unset($_SESSION['cpassword_error']) ?>
            </div>

            <div class="auth-submit">
                <button type="submit" name="signupBtn" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="../public/dashboard/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../public/dashboard/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/dashboard/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../public/dashboard/assets/plugins/pace/pace.min.js"></script>
    <script src="../public/dashboard/assets/js/main.min.js"></script>
    <script src="../public/dashboard/assets/js/custom.js"></script>


    <script>
        function myFun() {
        var x = document.getElementById("rajakar");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
</body>
</html>