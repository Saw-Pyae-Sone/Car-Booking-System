<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- password box -->
        <link rel="stylesheet" href="css/imgshowhide.css" media="all">

        <!-- POP UP FORM -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
       
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
                        <h2>Login Form</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <p>Login Form</p>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin: auto;">
                        <div class="location-form">
                            <h3>Fill out Login Form</h3>
                            <form method="post" action="">
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="required" />
                                </div>
                                <div class="control-group">
                                    <div class="password-container">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="required" id="password"/>
                                        <img src="img/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label>
                                        <a href="forgotpass.php">Forgotten Password?</a>
                                    </label>
                                </div>
                                <div>
                                    <input class="btn btn-custom" type="submit" value="Login" name="btnlogin" data-mdb-toggle="modal" data-mdb-target="#codeform">
                                </div>
                            </form>
                            <div class="control-group" style="padding-top: 5px;">
                                <p>
                                    Don't you have account?
                                    <a href="register.php">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->
        
        <!-- POP UP start -->

        <!-- POP UP End -->
        
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
        </script>
    </body>
</html>
<?php

    error_reporting(E_ALL ^ E_NOTICE);
    include 'connection.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['btnlogin']))
    {

        $email = $connect -> real_escape_string($_POST['email']);
        $password = $connect -> real_escape_string(md5($_POST['password']));

        $Edata = "SELECT * FROM customer WHERE C_email = '$email' ";
        $login = mysqli_query($connect, $Edata);


            if($login->num_rows > 0)
            {   
                $fetch = mysqli_fetch_assoc($login);

                if($password == $fetch['C_password']) 
                {
                    require 'phpmailer/src/Exception.php';
                    require 'phpmailer/src/PHPMailer.php';
                    require 'phpmailer/src/SMTP.php';

                    $random_code = strval(mt_rand(100000, 999999));

                    $mail = new PHPMailer(true);

                    $mail -> isSMTP();
                    $mail -> Host = 'smtp.gmail.com';
                    $mail -> SMTPAuth = true;
                    $mail -> Username ='nvl.testingemail@gmail.com';
                    $mail -> Password ='axbbayidnohonxoc';
                    $mail -> SMTPSecure ='ssl';
                    $mail -> Port = 465;

                    $mail->setFrom('nvl.testingemail@gmail.com', 'Three-B');
                    $mail->addAddress($email);
                    $mail->Subject = 'Verification Code';
                    $mail->Body = 'Your verification code is: ' . $random_code;
                    $mail -> send();
                    if (!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message has been sent';
                        $_SESSION['random_code'] = $random_code;
                        $_SESSION['email'] = $email;
                    }

                    $ban = "SELECT * FROM customer WHERE C_email = '$email'";
                    $banrun = mysqli_query($connect,$ban);
                    if (!$banrun) {
                        echo "Error: " . mysqli_error($connect);
                        exit;
                    }
                    $data = mysqli_fetch_assoc($banrun);
                    if (!$data) {
                        echo "No data found for user $email";
                        exit;
                    }

                    $now = new DateTime(date('Y-m-d'));
                    $logindate = DateTime::createFromFormat('Y-m-d', $data['C_login_time']);
                    if (!$logindate) {
                        $errors = DateTime::getLastErrors();
                        echo "Error: " . implode(", ", $errors['errors']);
                        exit;
                    }

                    $interval = $now->diff($logindate);
                    $interval_months = $interval->format('%m');

                    echo "$interval_months";
                    if($data['C_status'] == "Active")
                    {
                        if($interval_months >= 6)
                        {
                            $bancustomer = "UPDATE customer set C_status = 'Ban' where C_email = '$email'";
                            $Cban = mysqli_query($connect,$bancustomer);
                            
                            
                            $startDate = new DateTime(date('Y-m-d')); 
                            $startDate->add(new DateInterval('P14D'));
                            $newDate = $startDate->format('Y-m-d'); 
                            $Cid = $data['C_ID'];
                            $reason = 'Your account has been Frozen';

                            $bantable = "INSERT INTO ban(B_from,B_to,B_reason,C_ID) values (now(), '".$newDate."', '".$reason."', '".$Cid."')";
                            $banUse = mysqli_query($connect,$bantable); 

                            echo "<script>alert('Your account got banned!');</script>";
                        }
                        else
                        {
                            $time = "UPDATE customer set C_login_time = now(), C_status = 'Active' WHERE C_email = '$email'";
                            $run = mysqli_query($connect,$time);
                            echo "<script>alert(' Verification Code has been send to your Email!');</script>";
                            echo "<script>window.open('two_factor_code.php','_self');</script>";
                        }
                    }
                    else if($data['C_status'] == "Ban" || $data['C_status'] == "Inactive")
                    {
                        $cuid = $data['C_ID'];
                        $CDate = new DateTime(date('Y-m-d'));  
                        
                        $bquery = "SELECT * FROM ban WHERE C_ID = '$cuid'";
                        $go = mysqli_query($connect,$bquery);
                        $output = mysqli_fetch_assoc($go);

                        if($output['B_to'] <=  $CDate)
                        {
                            $delete = "DELETE FROM ban WHERE C_ID = '$cuid'";
                            $goes = mysqli_query($connect, $delete);

                            $renew = "UPDATE customer set C_login_time = now(), C_status = 'Active' WHERE C_ID = '$cuid'";
                            $new = mysqli_query($connect,$renew);
                            echo "<script>alert(' Verification Code has been send to your Email!');</script>";
                            echo "<script>window.open('two_factor_code.php','_self');</script>";
                        }
                    }
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
