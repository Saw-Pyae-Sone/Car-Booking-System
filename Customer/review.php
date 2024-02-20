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
        <title>Reviews</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <link rel="stylesheet" href="css/star.css">

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
                        <h2>Review</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="review.php">Reviews</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="location">
            <div class="container">
                <div class="section-header text-center">
                    <p>Tell us what you think about us</p>
                    <h2>Reviews</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="./img/reviewimg.jpg" alt="image" class="img-fluid" style="height: 440px;">
                    </div>
                    <div class="col-md-6">
                        <div class="location-form">
                            <h3>Reviews</h3>
                            <form method="post" action="">
                                <div class="control-group">
                                    <input type="text" class="form-control" placeholder="Subject" required="required" name="subject"/>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" placeholder="Message" required="required" name="message"></textarea>
                                </div>
                                <div class="stars">
                                    <input type="radio" name="star" id="star-1" value="5"/>
                                    <label class="star-1" for="star-1"></label>
                                    <input type="radio" name="star" id="star-2" value="4"/>
                                    <label class="star-2" for="star-2"></label>
                                    <input type="radio" name="star" id="star-3" value="3"/>
                                    <label class="star-3" for="star-3"></label>
                                    <input type="radio" name="star" id="star-4" value="2"/>
                                    <label class="star-4" for="star-4"></label>
                                    <input type="radio" name="star" id="star-5" value="1"/>
                                    <label class="star-5" for="star-5"></label>
                                </div>
                                <div>
                                    <input class="btn btn-custom" type="submit" name="submit" value="submit">
                                </div>
                            </form>
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
    </body>
</html>
<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
        $cid = $_SESSION['C_ID'];
        $subject = $connect -> real_escape_string ($_POST['subject']);
        $message = $connect -> real_escape_string ($_POST['message']);
        $stars = $connect -> real_escape_string ($_POST['star']);
        
        $numstar = (int)$stars;

		$insert = "INSERT INTO reviews(R_subject,R_message,Rating_star,C_ID) values('$subject','$message','$numstar','$cid')";
		$runinsert = mysqli_query($connect,$insert);
		if($runinsert)
		{
			echo "<script>alert('Your Review Message Successfully Send');</script>";
		}
    }
?>
