<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Verification</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- ICON -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
       
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
                        <h2>Verification Form</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="two_factor_code.php">Verification Code</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <p>Verification Form</p>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin: auto;">
                        <div class="location-form">
                            <h3>Fill Out Your Verification Code</h3>
                            <span>Enter the code we just send on your <strong> <?php echo $_SESSION['email'] ?> </strong> </span>
                            <form method="post" action="">
                                <div class="control-group mt-2">
                                    <input type="text" class="form-control" name="code" placeholder="Your Verification Code" required="required" id="input"/>
                                </div>
                                <div>
                                    <input class="btn btn-custom" type="submit" value="Submit" name="btncode" style="margin-bottom: 15px;">
                                </div>
                            </form>
                            <form action="" method="POST">
                                <input class="btn btn-custom" type="submit" value="Resend" name="btnresend">
                            </form>
                            <?php
                               echo $msg;
                            ?>
                            <div style="margin-top: 20px;">
                                <a href="login.php" style="color: #ffffff;"><i class="fa fa-arrow-left" style="color: #ffffff;"></i> Back</a>
                            </div>
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
    </body>
</html>
<?php

    error_reporting(E_ALL);
    include 'connection.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['btncode']))
    {
        $code = $connect -> real_escape_string ($_POST['code']);
        if($code == $_SESSION['random_code'])
        {
            $semail = $_SESSION['email'];
            $fetch = "SELECT C_ID FROM customer WHERE C_email = '$semail'";
            $run = mysqli_query($connect,$fetch);
            $output = mysqli_fetch_assoc($run);

            $_SESSION['C_ID'] = $output['C_ID'];
            echo "<script>alert('Successfully Logged In!');</script>";
            echo "<script>window.open('../Customer/index.php','_self');</script>";
        }          
        else
        {
            echo "<script>alert('Your Verification Code is incorrect and try again!');</script>";
        }                             
    }

    if(isset($_POST['btnresend']))
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
         $mail->addAddress($_SESSION['email']);
         $mail->Subject = 'Verification Code';
         $mail->Body = 'Your verification code is: ' . $random_code;
         $mail -> send();
         if (!$mail->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         } else {
            $_SESSION['random_code'] = $random_code;
             echo 'Message has been sent';
         }
    }
?>
