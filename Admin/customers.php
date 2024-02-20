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
    <title>Customers of the Year</title>

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

             <!-- BREADCRUMB-->
             <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="index.php">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Customer of the Year</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- Service Form Start -->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                            <div class="card">
                             
                            <div class="card-body card_block">
								
                                <?php
                                    if(isset($_POST['btn']))
                                    {
                                        $year = $_POST['year'];

                                        include "connection.php";

                                        $sql = "SELECT c.C_ID, COUNT(b.BK_ID) as num_of_booking, c.C_name
                                        FROM customer c 
                                        JOIN booking b ON b.C_ID = c.C_ID
                                        WHERE YEAR(b.BK_date) = '$year'
                                        AND b.BK_cancel = 'Uncancelled'
                                        GROUP BY C_ID";
                                        $result = mysqli_query($connect, $sql);
                                        while($r = mysqli_fetch_assoc($result))
                                        {
                                          if($r['num_of_booking']>2)
                                          {
                                            $dataPoints[] = array('y' => $r['num_of_booking'], 'label' => array($r['C_name']));
                                          }
                                        }
                                        sort($dataPoints);

                                ?>
                                    <div style="margin-left: 55em; margin-bottom: 1em;">
                                        <form action="" method="post">
                                            <select name="year" id="year" class="btn btn-gray" required>
                                                <option value="<?php echo $year ?>" selected disabled><?php echo $year ?></option>
                                            </select>
                                            <input type="submit" value="Change" name="btn" class="btn btn-success">
                                        </form>
                                    </div>
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                                <?php
                                    }
                                    else
                                    {
                                        $cyear = date("Y");

                                        $sql = "SELECT c.C_ID, COUNT(b.BK_ID) as num_of_booking, c.C_name
                                        FROM customer c 
                                        JOIN booking b ON b.C_ID = c.C_ID
                                        WHERE YEAR(b.BK_date) = '$cyear' 
                                        AND b.BK_cancel = 'Uncancelled' 
                                        GROUP BY C_ID";
                                        $result = mysqli_query($connect, $sql);
                                        while($r = mysqli_fetch_assoc($result))
                                        {
                                          if($r['num_of_booking']>2)
                                          {
                                            $dataPoints[] = array('y' => $r['num_of_booking'], 'label' => array($r['C_name']));
                                          }
                                        }
                                        sort($dataPoints);
                                ?>
                                    <div style="margin-left: 55em; margin-bottom: 1em;">
                                        <form action="" method="post">
                                            <select name="year" id="year" class="btn btn-gray" required>
                                                <option value="<?php echo $cyear ?>" selected disabled><?php echo $cyear ?></option>
                                            </select>
                                            <input type="submit" value="Change" name="btn" class="btn btn-success">
                                        </form>
                                    </div>
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                                <?php

                                    }
                                ?>
								
							</div>

                            </div>
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

    <!-- Chart -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
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

  <!-- Years -->
  <script>
        var max = new Date().getFullYear(),
            min = max - 9,
            select = document.getElementById('year');

        for (var i = max; i >= min; i--) {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
    }
    </script>

    <!-- Chart -->

    <script>
     window.onload = function() {
      
     var chart = new CanvasJS.Chart("chartContainer", {
       animationEnabled: true,
       title:{
         text: "Customers of the Year"
       },
       axisY: {
         title: "Number Of Bookings",
         includeZero: true,
       },
       data: [{
         type: "bar",
         yValueFormatString: "# Times",
         indexLabel: "{y}",
         indexLabelPlacement: "inside",
         indexLabelFontWeight: "bolder",
         indexLabelFontColor: "white",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
       }]
     });
     chart.render();
      
     }
     </script>
</body>
</html>
<!-- end document-->
