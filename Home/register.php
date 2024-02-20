<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- password box -->
        <link rel="stylesheet" href="css/imgshowhide.css" media="all">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
            <?php
                include 'navBar.php';
            ?>
        <!-- Nav Bar End -->
        
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Register Form</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="register.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <p>Register Form</p>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin: auto;">
                        <div class="location-form">
                            <h3>Fill out register form</h3>
                            <form method="post" action="">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required="required"/>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="required"/>
                                </div>
                                <div class="control-group">
                                    <div class="password-container">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="password"/>
                                        <img src="img/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="cpassword-container">
                                        <input type="password" class="form-control" name="conpassword" placeholder="Confirm Password" required="required" id="password2"/>
                                        <img src="img/eye-close.png" class="img_fluid" alt="eye-closed" id="img2">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required="required"/>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" name="address" placeholder="Address" required="required"></textarea>
                                </div>
                                    <input class="btn btn-custom" type="submit" value="Register" name="btnregister">
                                    <input class="btn btn-custom" type="button" value="Back" onclick="history.back();" style="margin-top: 20px;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->
        
        
        <!-- Footer Start -->
            <?php
                include 'footer.php';
            ?>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <!-- img show and hide -->
        <script>
            let eye_icon = document.getElementById('img');
            let password = document.getElementById('password');

            eye_icon.onclick = function() {
                if(password.type == "password")
                {
                    password.type = "text";
                    eye_icon.src = "img/eye-open.png";
                }
                else
                {
                    password.type = "password";
                    eye_icon.src = "img/eye-close.png";
                }
            }

            let eye_icon2 = document.getElementById('img2');
            let password2 = document.getElementById('password2');

            eye_icon2.onclick = function() {
                if(password2.type == "password")
                {
                    password2.type = "text";
                    eye_icon2.src = "img/eye-open.png";
                }
                else
                {
                    password2.type = "password";
                    eye_icon2.src = "img/eye-close.png";
                }
            }
        </script>
    </body>
</html>
<?php

    error_reporting(E_ALL ^ E_NOTICE);
    include 'connection.php';

    if(isset($_POST['btnregister']))
    {

        $name = $connect -> real_escape_string($_POST['name']);
        $email = $connect -> real_escape_string($_POST['email']);
        $spassword = $connect -> real_escape_string($_POST['password']);
        $confirm_password = $connect -> real_escape_string($_POST['conpassword']);
        $phone = $connect -> real_escape_string($_POST['phone']);
        $address = $connect -> real_escape_string($_POST['address']);

        $uppercase = preg_match('@[A-Z]@', $spassword);
        $lowercase = preg_match('@[a-z]@' , $spassword);
        $number = preg_match('@[0-9]@' , $spassword);
        $symbol = preg_match('@[^\w]@' , $spassword);

        $run = "SELECT * FROM customer WHERE C_email = '$email'";
        $return = mysqli_query($connect,$run);
        $fetch = mysqli_fetch_array($return);
        if($email == $fetch['C_email'])
        {
            echo "<script>alert('Email Already Exists');</script>";
        }
        else if($spassword != $confirm_password) 
        {
            echo "<script>alert('Error: Password and Confirm Password must be the same');</script>";
        } 
        else if(!$uppercase || !$lowercase || !$number || !$symbol || strlen($spassword) < 8)
        {
            echo "<script>alert('Weak Password (Password should contain atleast One Upper,One lower,One number, and One symbol)')</script>";
        }
        else 
        {
            $gpassword = md5($spassword);
            $insert = "INSERT INTO customer(C_name,C_email,C_password,C_phone,C_profile,C_address,C_status,C_login_time) VALUES('$name','$email','$gpassword','$phone','user.png','$address','Active', now())";
            $return = mysqli_query($connect,$insert);
            if($return)
                echo "<script>alert('Successfully Created'); window.open('login.php','_self');</script>";
            else
                echo mysqli_error($connect);
        }                                                          
    }
?>
