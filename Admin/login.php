<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- password box -->
    <link rel="stylesheet" href="css/imgshowhide.css" media="all">
    
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/logo.png" alt="Three-B" class="img-fluid" width="200vw" height="200vh">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="password-container">
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password" id="password" required>
                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                    </div>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="forgetpassword.php">Forgot Password?</a>
                                    </label>
                                </div>
                                <div class="form-group mt-2">
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="btnlogin" id="loginbtn">log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <!-- img show and hide -->
    <script>
        let eye_icon = document.getElementById('img');
        let password = document.getElementById('password');

        eye_icon.onclick = function() {
            if(password.type == "password")
            {
                password.type = "text";
                eye_icon.src = "images/eye-open.png";
            }
            else
            {
                password.type = "password";
                eye_icon.src = "images/eye-close.png";
            }
        }
    </script>

</body>

</html>
<!-- end document-->

<?php
    include 'connection.php';

    if(isset($_POST['btnlogin']))
    {
        $email =  $connect -> real_escape_string($_POST['email']);
        $password =  $connect -> real_escape_string(md5($_POST['password']));

        $data = "SELECT * FROM B_admin WHERE admin_email = '$email'";
        $login = mysqli_query($connect, $data);


            if($login->num_rows > 0)
            {   
                $fetch = mysqli_fetch_assoc($login);

                if($password == $fetch['admin_password']) 
                {
                    echo "<script>alert('Successfully Logged In!');</script>";
                    echo "<script>window.open('index.php','_self');</script>";

                    $_SESSION['admin_ID'] = $fetch['admin_ID'];
                }
                else
                {
                    echo "<script>alert('Password is incorrect');</script>";
                }
        }
        else
        {
            echo "<script>alert('Email is incorrect');</script>";
        }                                                          
    }
?>   