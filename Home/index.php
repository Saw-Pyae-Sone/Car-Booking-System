<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    $id = $_SESSION['C_ID'];

    // if(!isset($id) || empty($id))
    // {
    //     echo "<script>window.open('../Home/login.php','_self');</script>";
    // }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <link rel="stylesheet" href="star.css">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

        <!-- Image -->
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

        <style>
            .checked
            {
                color: orange; 
            }
        </style>
    </head>

    <body>
        <!-- Top Bar and Nav Bar Start -->
        <?php
            include 'navBar.php';
        ?>
        <!-- Top Bar and Nav Bar End -->


        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-1.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="carousel-text">
                            <h3 class="h3">Washing & Detailing</h3>
                            <h1 class="h1">Keep your Car Newer</h1>
                            <p class="lead">
                                Car detailing is an art that takes time, patience, and a passion for perfection.
                            </p>
                            <a class="btn btn-custom" href="servicetypes.php">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-2.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="carousel-text">
                            <h3 class="h3">Washing & Detailing</h3>
                            <h1 class="h1">Quality service for you</h1>
                            <p class="lead">
                                Detailing is not just about making a car look good, it's about making it feel good too.
                            </p>
                            <a class="btn btn-custom" href="servicetypes.php">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/carousel-3.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="carousel-text">
                            <h3 class="h3">Washing & Detailing</h3>
                            <h1 class="h1">Exterior & Interior Washing</h1>
                            <p class="lead">
                                The best car detailing is invisible. It's when your car looks like it came straight from the factory.
                            </p>
                            <a class="btn btn-custom" href="servicetypes.php">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

        <!-- About Start -->
        <div class="about" id="about_us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/aboutus.jpg" alt="Image" loading="lazy">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>car washing and detailing</h2>
                        </div>
                        <div class="about-content">
                            <p>
                                Car washing is essential to keep your vehicle looking its best. Start by rinsing the car to remove loose dirt and debris, then use a car washing soap and a soft mitt to gently wash the car from top to bottom. Rinse the car thoroughly and dry it with a soft towel or chamois to prevent water spots.
                            </p>
                            <ul>
                                <li><i class="far fa-check-circle"></i>Premium washing</li>
                                <li><i class="far fa-check-circle"></i>Glass Polishing</li>
                                <li><i class="far fa-check-circle"></i>Paint Body Polishing</li>
                                <li><i class="far fa-check-circle"></i>Paint Protection Film</li>
                            </ul>
                            <a class="btn btn-custom" href="servicetypes.php">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>Our Services</h2>
                </div>
                <div class="row">
                    <?php
                        include 'connection.php';

                        $sdisplay = "SELECT * FROM services LIMIT 8";
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
        <!-- Service End -->
        
        
        <!-- Facts Start -->
        <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-user"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">
                                    <?php
                                         $scustomer = "SELECT COUNT(C_ID) as num_of_customers FROM customer";
                                         $crun = mysqli_query($connect, $scustomer);
                                         while($fetchc = mysqli_fetch_assoc($crun))
                                        {
                                    ?>
                                        <?php echo $fetchc['num_of_customers']?>
                                    <?php
                                        }
                                    ?>
                                </h3>
                                <p>Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-users"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">
                                    <?php
                                        $_SESSION['viewcount'] = 1000;
                                        $_SESSION['viewcount']+=1;
                                        if($_SESSION['viewcount'])
                                        {
                                    ?>
                                        <?php echo $_SESSION['viewcount'] ?>
                                    <?php
                                        }
                                    ?>
                                </h3>
                                <p>Number of Viewers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="facts-item">
                            <i class="fa fa-check"></i>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">
                                    <?php
                                         $sbooking = "SELECT COUNT(BK_ID) as num_of_bookings FROM booking";
                                         $brun = mysqli_query($connect, $sbooking);
                                         while($fetchb = mysqli_fetch_assoc($brun))
                                        {
                                    ?>
                                        <?php echo $fetchb['num_of_bookings']?>
                                    <?php
                                        }
                                    ?>
                                </h3>
                                <p>Number of Bookings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->
        
        
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Services</p>
                    <h2>Choose Your Service</h2>
                </div>
                <div class="row">
                <?php
                    $serviceplan = "SELECT * FROM services WHERE S_vehicle = 'car' LIMIT 3";
                    $goes = mysqli_query($connect,$serviceplan);
                    while($output= mysqli_fetch_assoc($goes))
                    {
                        $image = $output['S_image'];
                ?>
                    <div class="col-md-4">
                        <div class="price-item featured-item">
                            <div class="price-header">
                                <div>
                                    <img src="../Image/<?php echo $image ?>" alt="<?php echo $image ?>" style="padding-bottom: 10px; width: 100px; height: 100px;" class="img-fluid" loading="lazy">
                                </div>
                                <h3><?php echo $output['S_name']?></h3>
                                <h2><span>$</span><strong><?php echo $output['S_price']?></strong></h2>
                            </div>
                            <div class="price-body">
                                <h2><span>Vehicle Type:</span><strong><?php echo $output['S_vehicle']?></strong></h2>
                            </div>
                            <div class="price-footer">
                                <a class="btn btn-custom" href="booking.php?sid=<?php echo $output['S_ID']?>">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Price End -->
        
        
        <!-- Location Start -->
        <div class="location">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section-header text-left">
                            <p>Business Partnership</p>
                            <h2>The partners of THREE-B</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Chemical Guys</h3>
                                        <p>53/54 Street, Mandalay, MYM</p>
                                        <p><strong>Call:</strong>+095 232 3656</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Challenge Auto</h3>
                                        <p>Township Street, Yangon, MYM</p>
                                        <p><strong>Call:</strong>+095 356 4586</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Car Pro</h3>
                                        <p> Main Street, Yangon, MYM</p>
                                        <p><strong>Call:</strong>+095 202 3650</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>Auto Detail</h3>
                                        <p>Flower Street, Mandalay, MYM</p>
                                        <p><strong>Call:</strong>+095 685 9545</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img src="./img/hand.jpg" alt="Polish Image" style="width: 400px; height: 450px;" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <!-- Location End -->


        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>MEET CUSTOMERS</p>
                    <h2>Our Royal Customers</h2>
                </div>
                <div class="row">
                    <?php
                        $topcustomers = "SELECT * FROM customer WHERE C_status = 'Active' LIMIT 4";
                        $running = mysqli_query($connect,$topcustomers);
                        while($fetch=mysqli_fetch_assoc($running))
                        {
                            $cimage = $fetch['C_profile'];
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="./img/<?php echo $cimage?>" alt="<?php echo $cimage?>" loading="lazy">
                            </div>
                            <div class="team-text">
                                <h2><?php echo $fetch['C_name']?></h2>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Team End -->
        
        
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header text-center">
                    <p>Testimonial</p>
                    <h2>What our clients say</h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                <?php
                    $rcustomer = "SELECT * FROM reviews,customer WHERE customer.C_ID = reviews.C_ID ORDER BY reviews.C_ID DESC LIMIT 6";
                    $sql = mysqli_query($connect,$rcustomer);
                    $count = mysqli_num_rows($sql);
                    while($out = mysqli_fetch_assoc($sql))
                    {
                        ?>
                    <div class="testimonial-item">
                        <img src="img/<?php echo $out['C_profile'] ?>" alt="Image">
                        <div class="testimonial-text">
                            <h3><?php echo $out['C_name']?></h3>
                            <h4><?php echo $out['R_subject']?></h4>
                            <p>
                              <?php echo $out['R_message']?>
                            </p>
                            <div class="stars"> 
                                <?php
                                $rating = $out['Rating_star'];
                                for ($i = 1; $i <= 5; $i++) 
                                {
                                    if ($i <= $rating) {
                                    ?>
                                        <span class="fa fa-star fa-1x checked"></span>
                                    <?php
                                    } 
                                    else 
                                        {
                                    ?>
                                         <span class="fa fa-star fa-1x"></span>
                                    <?php
                                        }
                                }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

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
        
        <!-- Image -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


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