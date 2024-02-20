<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    $id = $_SESSION['C_ID'];

    if(!isset($id) || empty($id))
    {
        echo "<script>window.open('../Home/login.php','_self');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <link rel="stylesheet" href="star.css">

        <!-- password box -->
        <link rel="stylesheet" href="css/imgshowhide.css" media="all">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
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
        <link href="css/editprofile.css" rel="stylesheet">

    </head>
   
    <body>
        <!-- Top Bar Start -->
        <?php
            include 'navBar.php';
        ?>
        <!-- Nav Bar End -->
        
        
        <!-- Contact Start -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Profile</h2>
                </div>
                    <div class="container rounded bg-white mt-5">
                        <div class="row">
                            <?php
                                include 'connection.php';
                                $get = "SELECT * FROM customer WHERE C_ID = '$id'";
                                $running = mysqli_query($connect,$get);
                                $fetch = mysqli_fetch_assoc($running);
                            ?>
                            <div class="col-md-4 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img src="img/<?php echo $fetch['C_profile']?>" alt="<?php echo $fetch['C_profile']?>" width="90" class="rounded-circle mt-5">
                                <span class="font-weight-bold"><?php echo $fetch['C_name']?></span>
                                <span class="text-black-50"><?php echo $fetch['C_email']?></span>
                            </div>
                            </div>
                            <div class="col-md-8">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1" onclick="history.back();"></i>
                                            <h6>Back to home</h6>
                                        </div>
                                        <h6 class="text-right">Edit Profile</h6>
                                    </div>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="row mt-2">
                                            <div class="col-md-6"><input type="text" class="form-control" name="name" value="<?php echo $fetch['C_name']?>"></div>
                                            <div class="col-md-6"><input type="text" class="form-control" name="phone" value="<?php echo $fetch['C_phone']?>"></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6"><input type="text" class="form-control" name="email" value="<?php echo $fetch['C_email']?>"></div>
                                            <div class="col-md-6">
                                                <div class="password-container">
                                                    <input type="password" class="form-control" name="password" required="required" id="password" placeholder="Enter New password"/>
                                                    <img src="img/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6"><input type="file" class="form-control" name="profile" value="<?php echo $fetch['C_profile']?>"></div>
                                            <div class="col-md-6"><input type="text" class="form-control" name="address" value="<?php echo $fetch['C_address']?>" required></div>
                                        </div>
                                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>    
                    </div>
            </div>
        </div>
        <!-- Contact End -->


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

        <!-- Password show and hide -->
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
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $cid = $_SESSION['C_ID'];

        $name = $connect -> real_escape_string ($_POST['name']);
        $email = $connect -> real_escape_string ($_POST['email']);
        $password = $connect -> real_escape_string ($_POST['password']);
        $phone = $connect -> real_escape_string ($_POST['phone']);
        $address = $connect -> real_escape_string ($_POST['address']);
        
        $pname = $connect -> real_escape_string($_FILES['profile']['name']);
        $tmp = $connect -> real_escape_string($_FILES['profile']['tmp_name']);

        move_uploaded_file($tmp,"img/$pname");

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@' , $password);
        $number = preg_match('@[0-9]@' , $password);
        $symbol = preg_match('@[^\w]@' , $password);

        if(!$uppercase || !$lowercase || !$number || !$symbol || strlen($password) < 8)
        {
            echo "<script>alert('Weak Password (Password should contain atleast One Upper,One lower,One number, and One symbol)')</script>";
        }
        else        
        {
            $password = md5($mpassword);
            $insert = "UPDATE customer SET C_name = '$name', C_email = '$email', C_password = '$mpassword', C_phone = '$phone', C_profile = '$pname', C_address = '$address' WHERE C_ID = '$cid'";
            $runinsert = mysqli_query($connect,$insert);
            if($runinsert)
            {
                echo "<script>alert('Account Successfully Updated');window.open('editprofile.php','_self');</script>";
            }
            else
                echo mysqli_connect_error($runinsert);
        }
    }
?>
