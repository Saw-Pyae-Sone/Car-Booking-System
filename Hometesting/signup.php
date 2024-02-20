<?php
          error_reporting(E_ALL ^ E_NOTICE);
        // error_reporting(E_ALL);
        // ini_set('display_errors', 1);
          $msg='';
          include 'connection.php';
          if(isset($_POST['btnsignup']))
          {     
                $name = $_POST['txtname'];
                $email = $_POST['txtemail'];
                $password = $_POST['txtpassword'];
                $confirmpassword = $_POST['txtconfirmpassword'];
                $phone = $_POST['txtphone'];
                $profile = $_POST['txtprofile'];
                $address = $_POST['txtaddress'];
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@' , $password);
                $number = preg_match('@[0-9]@' , $password);
                $symbol = preg_match('@[^\w]@' , $password);

                $run = "SELECT C_email FROM customer WHERE C_email = '$email'";
                $return = mysqli_query($connect,$run);
                $fetch = mysqli_fetch_array($return);

                if($email == $fetch['C_email'])
                {
                    $msg = 'Email Already Exists.';
                }
                else if($password !== $confirmpassword)
                {
                    $msg = 'Your password and confirm password do not match.';
                }
                else if(!$uppercase || !$lowercase || !$number || !$symbol || strlen($password) < 8)
                {
                    $msg = 'Weak Password.';
                }
                else 
                {
                    $gpassword = md5($password);
                    $insert = "INSERT INTO customer(C_name,C_email,C_password,C_phone,C_profile,C_address) VALUES('$name','$email','$gpassword','$phone','$profile','$address')";
                    $return = mysqli_query($connect,$insert);
                    if($return)
                        echo "<script>alert('Successfully Created');
                              location.assign('login.php');</script>";
                    else
                        echo mysqli_error($connect);
                }   
                    
          }
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
    <title>Sign Up</title>

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
                        <!-- <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div> -->
                        <h2 class="text-center">Sign Up</h2>
                        <div class="login-form">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="txtname" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="txtemail" placeholder="Email" id="email"  required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="password-container">
                                        <input class="au-input au-input--full" type="password" name="txtpassword" placeholder="Password" id="password"  required>
                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="cpassword-container">
                                        <input class="au-input au-input--full" type="password" name="txtconfirmpassword" placeholder="confirmPassword" id="password2"  required>
                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="au-input au-input--full" type="tel" name="txtphone" required placeholder="Phone Number">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-6 mt-2">
                                        <label for="file-input" class="form-control-label">Profile Picture</label>
                                    </div>
                                    <div class="col-12 col-md-6 mt-2">
                                        <input type="file" id="file-input" name="txtprofile" class="form-control-file">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class="form-control-label">Address</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="txtaddress" id="textarea-input" rows="2" placeholder="Address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p><?php echo $msg; ?></p>
                                </div>
                                <button class="au-btn au-btn--green m-b-20" type="submit" name="btnsignup">Sign Up</button>
                                <button class="au-btn au-btn--green m-b-20" type="button" onclick="location.assign('login.php');">back</button>
                            </form>
                            <!-- <div class="register-link">
                                <p>
                                    Already Have Account?
                                    <a href="login.php">Log In</a>
                                </p>
                            </div> -->
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

