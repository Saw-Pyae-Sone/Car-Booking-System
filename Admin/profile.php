<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    $aid = $_SESSION['admin_ID'];

    if(!isset($aid) || empty($aid))
    {
        echo "<script>window.open('../Admin/login.php','_self');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <script src="table_assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

    <!-- Title Page-->
    <title>Profile</title>

    <!-- password box -->
    <link rel="stylesheet" href="css/imgshowhide.css" media="all">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    
    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php include 'adminsidebar.php' ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php include 'adminheader.php' ?>
            <!-- END HEADER DESKTOP-->
                  <!-- Service Type Form Start -->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Profile</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <?php  
                                            include 'connection.php';
                                            $padmin = "SELECT * FROM b_admin WHERE admin_ID = '$aid'";
                                            $run = mysqli_query($connect,$padmin);
                                            $fetch = mysqli_fetch_assoc($run);
                                        ?> 
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email" name="name" value="<?php echo $fetch['admin_name']?>" placeholder="Enter Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email" name="email" value="<?php echo $fetch['admin_email']?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="password-container">
                                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password" id="password" required>
                                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img">
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Confirm Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="cpassword-container">
                                                        <input type="password" class="form-control" name="conpassword" placeholder="Confirm Password" id="password2" required>
                                                        <img src="images/eye-close.png" class="img_fluid" alt="eye-closed" id="img2">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label" >Profile</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="profile" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service Type Form End -->
            <!-- Footer start -->
                <?php include 'footer.php'; ?>
            <!-- Footer end -->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script>
        let eye_icon = document.getElementById('img');
        let password = document.getElementById('password');

        eye_icon.onclick = function() {
            if(password.type == "password")
            {
                password.type = "text";
                eye_icon.src = "images/eye-open.png";
            }
            else
            {
                password.type = "password";
                eye_icon.src = "images/eye-close.png";
            }
        }

        let eye_icon2 = document.getElementById('img2');
        let password2 = document.getElementById('password2');

            eye_icon2.onclick = function() {
                if(password2.type == "password")
                {
                    password2.type = "text";
                    eye_icon2.src = "images/eye-open.png";
                }
                else
                {
                    password2.type = "password";
                    eye_icon2.src = "images/eye-close.png";
                }
            }
    </script>

    <script type="text/javascript">
	// Optional
	Prism.plugins.NormalizeWhitespace.setDefaults({
		'remove-trailing': true,
		'remove-indent': true,
		'left-trim': true,
		'right-trim': true,
	});
	
	// handle links with @href started with '#' only
	$(document).on('click', 'a[href^="#"]', function(e) {
		// target element id
		var id = $(this).attr('href');

		// target element
		var $id = $(id);
		if ($id.length === 0) {
			return;
		}

		// prevent standard hash navigation (avoid blinking in IE)
		e.preventDefault();

		// top position relative to the document
		var pos = $id.offset().top - 80;

		// animated top scrolling
		$('body, html').animate({scrollTop: pos});
	});
</script>
</body>

</html>
<!-- end document-->
<?php
    if(isset($_POST['submit']))
    {
        $aid = $_SESSION['admin_ID'];

        $name = $connect -> real_escape_string($_POST['name']);
        $email = $connect -> real_escape_string($_POST['email']); 
        $password = $connect -> real_escape_string($_POST['password']); 
        $cpassword = $connect -> real_escape_string($_POST['conpassword']);

        $pname = $connect -> real_escape_string($_FILES['profile']['name']);
        $tmp = $connect -> real_escape_string($_FILES['profile']['tmp_name']);

        move_uploaded_file($tmp,"img/$pname");

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@' , $password);
        $number = preg_match('@[0-9]@' , $password);
        $symbol = preg_match('@[^\w]@' , $password);
        
        if($password != $cpassword) 
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
            $insert = "UPDATE b_admin SET admin_name = '$name', admin_email = '$email', admin_password = '$mpassword', admin_profile = '$pname' WHERE admin_ID = '$aid'";
            $runinsert = mysqli_query($connect,$insert);
            if($runinsert)
            {
                echo "<script>alert('Account Successfully Updated');window.open('profile.php','_self');</script>";
            }
            else
                echo mysqli_connect_error($runinsert);
        }
    }
?>
