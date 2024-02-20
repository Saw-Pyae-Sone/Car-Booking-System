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
        <title>Services</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

        <!-- Image -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        <!-- Top Bar and Nav Bar Start -->
        <?php
            include 'navBar.php';
        ?>
        <!-- Top Bar and Nav Bar End -->

        <div class="col-lg-2 col-md-4 mt-4">
            <form class="d-flex" method="post">
                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit" name="submit"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

         <!-- Search Start -->
         <?php
          include 'connection.php';
          if(isset($_POST['submit']))
          {
            $input = $connect -> real_escape_string ($_POST['search']);
         ?>
         <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Services</p>
                    <h2>Choose Service For Your <?php echo $input?></h2>
                </div>
                <div class="row">
                    
                        <?php                  
                                $sql = "SELECT * FROM services WHERE S_name like '%$input%' or S_vehicle like '%$input%' or S_price like '%$input%'";
                                $run = mysqli_query($connect,$sql);
                                if(mysqli_num_rows($run) > 0 )
                                {
                                    while($row = mysqli_fetch_assoc($run))
                                    {
                                        $image = $row['S_image'];
                        ?>
                        <div class="col-md-4">
                            <div class="price-item featured-item">
                                <div class="price-header">
                                    <div>
                                        <img src="../Image/<?php echo $image ?>" alt="<?php echo $image ?>" style="padding-bottom: 10px; width: 100px; height: 100px;" class="img-fluid" loading="lazy">
                                    </div>
                                    <h3><?php echo $row['S_name']?></h3>
                                    <h2><span>$</span><strong><?php echo $row['S_price']?></strong></h2>
                                </div>
                                <div class="price-body">
                                    <h2><span>Vehicle Type:</span><strong><?php echo $row['S_vehicle']?></strong></h2>
                                </div>
                                <div class="price-footer">
                                    <a class="btn btn-custom" href="booking.php?sid=<?php echo $output['S_ID']?>">Book Now</a>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <nav class="navbar">
                </nav>
                <div class="section-header text-center">
                    <p>Services</p>
                    <h2>Choose Service For Your Motorcycle</h2>
                </div>
                <div class="row">
                <?php
                    include 'connection.php';
                    $serviceplan = "SELECT * FROM services where S_vehicle = 'motocycle'";
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

        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Services</p>
                    <h2>Choose Service For Your Car</h2>
                </div>
                <div class="row">
                <?php
                    $serviceplan = "SELECT * FROM services where S_vehicle = 'car'";
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
        <?php } ?>
    </div> 
        <!-- Search End -->
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>