<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Forgot Password</title>
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
                        <h2>Forgot Password Form</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="forgotpass.php">Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <p>Forgot Password</p>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin: auto;">
                        <div class="location-form">
                            <h3>Enter the Email Address</h3>
                            <?php
                            include 'connection.php';
                            if(isset($_GET['cid']))
                            {
                                $cid = $_GET['cid'];

                                $data = "SELECT * FROM customer WHERE C_ID = '$cid'";
                                $query = mysqli_query($connect, $data);
                                $fetch = mysqli_fetch_assoc($query);
                                $email = $fetch['C_email'];
            
                            ?>
                            <form method="post" action="">
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>" disabled placeholder="Email" required="required" />
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
                                <div>
                                    <input class="btn btn-custom" type="submit" value="Submit" name="psubmit">
                                    <input class="btn btn-custom" type="button" value="Back" onclick="history.back();" style="margin-top: 20px;">
                                </div>
                            </form>
                            <?php } else { ?> 
                              <form method="post" action="">
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="required"/>
                                </div>
                                <div class="control-group">
                                    <input class="btn btn-custom" type="submit" value="Login" name="submit">
                                    <input class="btn btn-custom" type="button" value="Back" onclick="history.back();" style="margin-top: 20px;">
                                </div>
                            </form>
                             <?php } ?>  
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

   if(isset($_POST['psubmit']))
   {
        $cid = $_GET['cid'];
            
        $password = $connect -> real_escape_string($_POST['password']);
        $confirm_password = $connect -> real_escape_string($_POST['conpassword']);

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
        $insertpassword = "UPDATE customer SET C_password = '$mpassword' WHERE C_ID = '$cid'";
        $insert = mysqli_query($connect, $insertpassword);
        if($insert)
        {
            echo "<script>alert('Successfully Updated');</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
        else
        {
            echo mysqli_error($connect);
        }
    }                                                        
   }
?>

<?php
    if(isset($_POST['submit']))
    {
        $cemail = $_POST['email'];

        $data = "SELECT * FROM customer WHERE C_email = '$cemail'";
        $query = mysqli_query($connect, $data);
            $fetch = mysqli_fetch_assoc($query);
            if($cemail == $fetch['C_email']) 
            {
                $cid = $fetch['C_ID'];
                echo "<script>window.location.href='forgotpass.php?cid=$cid'</script>";
            }
            else
            {
                echo "<script>alert('Incorrect Email');</script>";
            }
    }
?>
