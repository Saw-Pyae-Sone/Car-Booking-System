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
        <title>Booking</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <link rel="stylesheet" href="star.css">

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
        <style>

            .button-24 {
            margin-top: 2em;
            margin-bottom: 2em;
            background: #FF4742;
            border: 1px solid #FF4742;
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            }

            .button-24:hover,
            .button-24:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
            }

            .button-24:active {
            opacity: .5;
            }

            .button-25 {
            margin-top: 2em;
            margin-bottom: 2em;
            background: #7a7979;
            border: 1px solid #7a7979;
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            }
        </style>
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
                        <h2>Booking</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="booking.php">Booking</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
            
        <!-- Booking Start -->
        <div class="container-fluid">
            <div class="section-header text-center">
                <p>Booking</p>
                <h2>Fill up Booking Form</h2>
            </div>
            <div class="row">
                <div class="col-md-8 border border-5 rounded">
                    <?php
                        error_reporting(0);
                        include 'connection.php';
                        date_default_timezone_set('Asia/Yangon');

                        $sid = $_GET['sid'];
                    ?>
                    <h3 class="text-center">Choose Your Desired Date </h3>
                    <div class="row">
                        <?php
                        for($i=0; $i<30; $i++)
                        {
                            $days = date('Y-m-d', strtotime('+'.$i.' day'));

                            $Motocount = 0;
                            $Carcount = 0;
                            $book = "SELECT * FROM booking WHERE BK_date = '$days'";
                            $run = mysqli_query($connect,$book);
                            while($fetch = mysqli_fetch_array($run))
                            {
                                if($fetch['BK_vehicle'] == "car")
                                {
                                    $Carcount++;
                                }
                                else if ($fetch['BK_vehicle'] == "motocycle")
                                {
                                    $Motocount++;
                                }
                            }

                            if($Carcount == 2)
                            {
                        ?>
                        <div class="col-md-2 mt-2">
                            <button class="button-25" onclick="Bclick<?php echo $i ?>()" id="BTN-<?php echo $i; ?>" value="<?php echo $days; ?>" disabled><?php echo $days; ?></button>
                        </div>
                        <?php
                            }
                            else if($Motocount == 3)
                            {
                        ?>
                        <div class="col-md-2 mt-2">
                            <button class="button-25" onclick="Bclick<?php echo $i ?>()" id="BTN-<?php echo $i; ?>" value="<?php echo $days; ?>" disabled><?php echo $days; ?></button>
                        </div>
                        <?php
                            }
                            else if($Motocount == 2 && $Carcount == 1)
                            {
                        ?>
                        <div class="col-md-2 mt-2">
                            <button class="button-25" onclick="Bclick<?php echo $i ?>()" id="BTN-<?php echo $i; ?>" value="<?php echo $days; ?>" disabled><?php echo $days; ?></button>
                        </div>
                        <?php        
                            }
                            else
                            {
                        ?>
                        <div class="col-md-2 mt-2">
                            <button class="button-24" onclick="Bclick<?php echo $i ?>()" id="BTN-<?php echo $i; ?>" value="<?php echo $days; ?>"><?php echo $days; ?></button>
                        </div>
                        <?php
                            }        
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-form">
                        <form method="post" enctype="multipart/form" action="">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left fa-2x mr-1 mb-1" onclick="location.assign('service.php');" style="color: red; cursor:pointer;"></i>
                                    <h5>Choose Service Again</h5>
                                </div>
                            </div>
                            <?php
                                $shows = "SELECT * FROM customer WHERE C_ID = '$id'";
                                $runshow = mysqli_query($connect,$shows);

                                $cdata=mysqli_fetch_assoc($runshow);
                            ?>
                            <div class="control-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required="required" value ="<?php echo $cdata['C_name']?>"/>
                            </div>
                            <div class="control-group mt-3">
                                <input type="tel" class="form-control" name="phone" placeholder="Your Phone" required="required" value ="<?php echo $cdata['C_phone']?>"/>
                            </div>
                            <div class="control-group mt-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" value ="<?php echo $cdata['C_email']?>"/>
                            </div>
                            <div class="control-group mt-3">
                                <?php
                                    $sid = $_GET['sid'];
                                    $selects = "SELECT * FROM services WHERE S_ID = '$sid'";
                                    $runservice = mysqli_query($connect,$selects);

                                    $fetch1=mysqli_fetch_assoc($runservice);

                                ?>
                                 <select name="aservice" class="form-control" required readonly>
                                    <option value="<?php echo $fetch1['S_ID']?>"><?php echo $fetch1['S_name']?></option>
                                </select>
                            </div>
                            <div class="control-group mt-3">
                                <input type="text" class="form-control" placeholder="Price" value="<?php echo $fetch1['S_price']?>" readonly>
                            </div>
                            <div class="control-group mt-3">
                                <input type="text" class="form-control" value="<?php echo $fetch1['S_vehicle']?>" name="vehicles" readonly placeholder="Vehicle">
                            </div>
                            <div class="control-group mt-3">
                                <select name="time" class="form-control" required>
                                    <option selected disabled>Please Select Drop Off Time</option>
                                    <option value="9 to 12">9 to 12 am</option>
                                    <option value="1 to 3">1 to 3 pm</option>
                                </select>
                            </div>
                            <div class="control-group mt-3">
                                <input type="text" class="form-control" name="inputdate" required id="Bdate" placeholder="Date" readonly required>
                            </div>
                            <div class="control-group mt-3">
                                <textarea class="form-control" name="comment" placeholder="Comment" required="required" data-validation-required-message="Please enter your message"></textarea>
                            </div>
                            <div class="mt-3">
                                <input class="btn btn-custom" type="submit" name="submit" value="Submit Booking">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->

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

        <script>
            for (let i = 0; i < 30; i++) {
                
                const functionName = "Bclick" + i;

                window[functionName] = function() 
                {
                
                    var btnval = document.getElementById("BTN-" + i).value;
                    document.getElementById("Bdate").value = btnval;

                }
            } 
        </script>
    </body>
</html>
    <?php
        if(isset($_POST['submit']))
        {
            
            $C_ID = $_SESSION['C_ID'];
            $name = $connect -> real_escape_string ($_POST['name']);
            $phone = $connect -> real_escape_string ($_POST['phone']);
            $email = $connect -> real_escape_string ($_POST['email']);
            $S_ID = $connect -> real_escape_string ($_POST['aservice']);
            $vehicle = $connect -> real_escape_string ($_POST['vehicles']);
            $time = $connect -> real_escape_string ($_POST['time']);
            $cdate = $connect -> real_escape_string ($_POST['inputdate']);
            $comment = $connect -> real_escape_string ($_POST['comment']);

            $add = false;
            $carcount = 0;
            $motocount = 0;
            $ctime = null;
            $book2 = "SELECT * FROM booking WHERE BK_date = '$cdate'";
            $run2 = mysqli_query($connect,$book2);
            while($fetch1 = mysqli_fetch_array($run2))
            {
                if($fetch1['BK_dropoff_time'] == $time)
                {
                                     
                    if($fetch1['BK_vehicle'] == "car")
                    {
                        $carcount++;
                        $ctime = $fetch1['BK_dropoff_time'];
                    }
                    else
                    {
                        $motocount++;
                    }
                }
                else
                {
                    if($fetch1['BK_vehicle'] == "car")
                    {
                        $carcount++;
                        $ctime = $fetch1['BK_dropoff_time'];
                    }
                    else 
                    {
                        $motocount++;
                    }
                }
            }

            if($vehicle == "car")
            {
                if($motocount == 1 && $carcount == 1)
                {
                    echo "<script>alert('Car Acception Limit is full for Your Chose Day')</script>";
                }
                else if($carcount > 0 && $carcount < 2)
                {
                    if($time == $ctime)
                    {
                        echo "<script>alert('$time Time is not available at $cdate. Please select another Drop Off time.')</script>";         
                    }
                    else
                    {
                        $add = true;             
                    }
                }
                else if ($motocount > 0 && $motocount < 2)
                {
                     $add = true;
                }

                else
                {
                    $add = true;
                }
            }
            else
            {
                if($carcount < 2 || $motocount < 2)
                {
                    $add = true;
                }
            }

            if($add == true)
            {
                $insert = "INSERT INTO booking(BK_name,BK_phone,BK_email,BK_comment,BK_dropoff_time,BK_date,BK_vehicle,BK_confirm,BK_pay,BK_cancel,S_ID,C_ID) 
                values('$name','$phone','$email','$comment','$time','$cdate','$vehicle','Unconfirm','Unpaid','Uncancelled','$S_ID','$C_ID')";
                $runinsert = mysqli_query($connect,$insert);
                if($runinsert)
                {
                    echo "<script>alert('Successfully Booked')</script>";
                }
            }
        }
    ?>