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
    <title>Forget Password</title>

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
                            <?php
                            include 'connection.php';
                            if(isset($_GET['aid']))
                            {
                                $aid = $_GET['aid'];

                                $data = "SELECT * FROM B_admin WHERE admin_ID = '$aid'";
                                $query = mysqli_query($connect, $data);
                                    $fetch = mysqli_fetch_assoc($query);
                                    $email = $fetch['admin_email'];
            
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" value="<?php echo $email ?>" disabled placeholder="Email" required>
                                </div>
                                <div class="form-group" id="pass-div">
                                    <label>Password</label>
                                    <div class="password-container">
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password" id="password">
                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                    </div>
                                    </div>          
                                    <div class="form-group" id="cpass-div">
                                    <label>Confirm Password</label>
                                    <div class="cpassword-container">
                                        <input class="au-input au-input--full" type="password" name="confirm_password" placeholder="Confirm Password" id="password2">
                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img2">
                                    </div>
                                </div>
                                <button class="au-btn au-btn--green m-b-20" type="submit" name="psubmit">submit</button>
                                <button class="au-btn au-btn--green m-b-20" type="button" name="back" onclick="location.assign('login.php');">back</button>
                            </form>
                            <?php } else { ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                </div>
                                <button class="au-btn au-btn--green m-b-20" type="submit" name="submit">submit</button>
                                <button class="au-btn au-btn--green m-b-20" type="button" name="back" onclick="location.assign('login.php');">back</button>
                            </form>
                            <?php } ?>
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

        let eye_icon2 = document.getElementById('img2');
        let password2 = document.getElementById('password2');

        eye_icon2.onclick = function() {
            if(password2.type == "password")
            {
                password2.type = "text";
                eye_icon2.src = "images/eye-open.png";
            }
            else
            {
                password2.type = "password";
                eye_icon2.src = "images/eye-close.png";
            }
        }
    </script>

</body>

</html>
<!-- end document-->
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include 'connection.php';

   if(isset($_POST['psubmit']))
   {
        $aid = $_GET['aid'];
            
        $password = $_POST['password'];

        $confirm_password = $_POST['confirm_password'];

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@' , $password);
        $number = preg_match('@[0-9]@' , $password);
        $symbol = preg_match('@[^\w]@' , $password);
    
    if($password != $confirm_password) 
    {
        echo "<script>alert('Error: Password and Confirm Password must be the same');</script>";
    }
    else if(!$uppercase || !$lowercase || !$number || !$symbol || strlen($password) < 8)
    {
        echo "<script>alert('Weak Password (Password should contain atleast One Upper,One lower,One number, and One symbol)')</script>";
    } 
    else 
    {   
        $mpassword = md5($password);
        $insertpassword = "UPDATE B_admin SET admin_password = '$mpassword' WHERE admin_ID = '$aid'";
        $insert = mysqli_query($connect, $insertpassword);
        if($insert)
            echo "<script>alert('Successfully Updated'); window.open('login.php','_self');</script>";
        else
            echo mysqli_error($connect);
    }                                                        
   }
?>

<?php
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];

        $data = "SELECT * FROM B_admin WHERE admin_email = '$email'";
        $query = mysqli_query($connect, $data);
            $fetch = mysqli_fetch_assoc($query);
            if($email == $fetch['admin_email']) 
            {
                $aid = $fetch['admin_ID'];
                echo "<script>window.location.href='forgetpassword.php?aid=$aid'</script>";
            }
            else 
                echo "<script>alert('Email is incorrect');</script>";
    }
?>
