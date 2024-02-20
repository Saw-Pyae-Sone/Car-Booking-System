<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    $id = $_SESSION['C_ID'];
   
    if(!isset($id) || empty($id))
    {
       echo "<script>window.open('../Home/login.php','_self');</script>";
    }
?>
 <!-- Top Bar Start -->
 <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.php">
                                <h1>Three<span>B</span></h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon - Fri, 8:00 - 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+959 583 445 656</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>nvl.testingemail@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <div class="nav-item dropdown">
                                <a href="servicetypes.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Service Type</a>
                                <div class="dropdown-menu">
                                    <a href="servicetypes.php#motocycle" class="dropdown-item">Motorcycle</a>
                                    <a href="servicetypes.php#car" class="dropdown-item">Car</a>
                                </div>
                            </div>
                            <a href="Partnership.php" class="nav-item nav-link">Business Partnerships</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="review.php" class="nav-item nav-link">Review</a>
                            <a href="service.php" class="nav-item nav-link" id='service'>Service</a>
                            <div class="nav-item dropdown">
                                <?php
                                    include 'connection.php';
                                    $profile = "SELECT * FROM customer WHERE C_ID = '$id'";
                                    $run = mysqli_query($connect, $profile);
                                    $fetch = mysqli_fetch_assoc($run);
                                ?>
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="img/<?php echo $fetch['C_profile']?>" alt="<?php echo $fetch['C_profile']?>" style="width: 40px; height: 42px;" class="img-fluid rounded-circle"></a>
                                <div class="dropdown-menu">
                                    <a href="editprofile.php" class="dropdown-item">Edit Profile</a>
                                    <a href="History.php" class="dropdown-item">History</a>
                                    <a href="logout.php" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-custom" href="service.php">Get Appointment</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#service').hide();

        $(window).on('resize', function() {
        if ($(window).width() >= 990) {
            $('#service').hide();
        } else {
            $('#service').show();
        }
        });
    });
    </script>