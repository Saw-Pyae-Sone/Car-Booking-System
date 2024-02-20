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
        <title>Service Types</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

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
                        <h2>Service Types</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="contact.php">Service Types</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center"  id="motocycle">
                    <p>Services</p>
                    <h2>Services For Motorcycle</h2>
                </div>
                <div class="row">
                    <?php
                        include 'connection.php';

                        $sdisplay = "SELECT * FROM services where S_vehicle = 'motocycle'";
                        $run = mysqli_query($connect, $sdisplay);
                        while($fetch=mysqli_fetch_assoc($run))
                        {
                            $img="../Admin/service_img/".$fetch['S_image'];
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="<?php echo $img ?>" alt="<?php echo $img ?>"  style="width: 60px; height: 60px;" class="img-fluid" loading="lazy">
                            <h3><?php echo $fetch['S_name'] ?></h3>
                            <p><?php echo $fetch['S_status'] ?></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="section-header text-center" id="car">
                    <p>Services</p>
                    <h2>Services For Car</h2>
                </div>
                <div class="row mt-5">
                    <?php
                        include 'connection.php';

                        $sdisplay = "SELECT * FROM services where S_vehicle = 'car'";
                        $run = mysqli_query($connect, $sdisplay);
                        while($fetch=mysqli_fetch_assoc($run))
                        {
                            $img="../Admin/service_img/".$fetch['S_image'];
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="<?php echo $img ?>" alt="<?php echo $img ?>"  style="width: 60px; height: 60px;" class="img-fluid" loading="lazy">
                            <h3><?php echo $fetch['S_name'] ?></h3>
                            <p><?php echo $fetch['S_status'] ?></p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
    </body>
</html>
