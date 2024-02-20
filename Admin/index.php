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

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- DatabaseTable table_assests css and bootstrap link -->
    <link rel="stylesheet" href="table_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="table_assets/css/atlantis.min.css">
	<link href="table_assets/styles.css" rel="stylesheet" />
	<link href="table_assets/prism.css" rel="stylesheet" />

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
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    <!-- <button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php
                                        include 'connection.php';
                                         $scustomer = "SELECT COUNT(C_ID) as num_of_customers FROM customer";
                                         $crun = mysqli_query($connect, $scustomer);
                                         while($fetchc = mysqli_fetch_assoc($crun))
                                        {
                                    ?>
                                        <h2 class="number"><?php echo $fetchc['num_of_customers']?></h2>
                                    <?php
                                        }
                                    ?>                               
                                    <span class="desc">customers online</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php
                                         $service = "SELECT COUNT(s.S_ID) as total_services FROM services s JOIN booking b ON b.S_ID = s.S_ID";
                                         $srun = mysqli_query($connect, $service);
                                         while($fetchc = mysqli_fetch_assoc($srun))
                                        {
                                    ?>
                                        <h2 class="number"><?php echo $fetchc['total_services']?></h2>
                                    <?php
                                        }
                                    ?> 
                                    <span class="desc">number of services</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php
                                        $cyear = date('Y');
                                         $service = "SELECT COUNT(*) as total_cancel FROM booking, contact_us WHERE contact_us.BK_ID = booking.BK_ID AND booking.BK_cancel = 'Uncancelled'
                                         AND YEAR(booking.BK_date) = '$cyear'";
                                         $srun = mysqli_query($connect, $service);
                                         while($fetchc = mysqli_fetch_assoc($srun))
                                        {
                                    ?>
                                        <h2 class="number"><?php echo $fetchc['total_cancel']?></h2>
                                    <?php
                                        }
                                    ?> 
                                    <span class="desc">cancel requests</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php
                                        $cdate = date('Y');
                                         $service = "SELECT SUM(s.S_price) as total_earnings FROM services s JOIN booking b ON b.S_ID = s.S_ID WHERE YEAR(b.BK_date) = '$cdate'";
                                         $srun = mysqli_query($connect, $service);
                                         while($fetchc = mysqli_fetch_assoc($srun))
                                        {
                                    ?>
                                        <h2 class="number">$<?php echo $fetchc['total_earnings']?></h2>
                                    <?php
                                        }
                                    ?> 
                                    <span class="desc">total earnings</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">

                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                            </div>
                            <div class="col-xl-12 mt-5">
                                <?php
                                    $cyear = date("Y");

                                    $income = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0);

                                    foreach ($income as $key => $value)
                                    {
                                        $fetch = "SELECT SUM(s.S_price) as total_earnings
                                        FROM services s
                                        JOIN booking b ON b.S_ID = s.S_ID
                                        WHERE YEAR(b.BK_date) = '$cyear'
                                        AND MONTH(b.BK_date) = '$key'
                                        AND b.BK_pay = 'Paid'";

                                        $run = mysqli_query($connect,$fetch);
                                        $row = mysqli_fetch_assoc($run);
                                        if($row['total_earnings']>0)
                                            $income[$key] = $row['total_earnings'];
                                    }

                                    foreach($income as $key => $value)
                                    {
                                        $edataPoints[] = array('y' => $value, 'label' => date("M", mktime(0, 0, 0, $key)));
                                    }
                                ?>
                          
                                <div id="dchartContainer" style="height: 370px; width: 100%;"></div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 mt-5">
                            <div class="card">
                             
                             <div class="card-body card_block">
                                <?php
                                    $cdate = date("d");
                                    $cyear = date("Y");
                                    $cmonth = date("m");
                                ?>

                                 <h5 id="addrow" class="pb-2 mb-3">Daily Servicing Records of  Day <?php echo $cdate ?></h5>
                                 <div class="bd-example">
 
                                     <div class="table-responsive">
                                         <table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                             <thead>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>Name</th>
                                                         <th>Phone</th>
                                                         <th>Email</th>
                                                         <th>Service</th>
                                                         <th>Comment</th>
                                                         <th>Drop Off Time</th>
                                                         <th>Date</th>
                                                         <th>Vehicle</th>
                                                         <th>Confirm</th>
                                                         <th>Pay</th>
                                                         <th>Cancel</th>
                                                     </tr>
                                                 </thead>
                                                 <tfoot>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>Name</th>
                                                         <th>Phone</th>
                                                         <th>Email</th>
                                                         <th>Service</th>
                                                         <th>Comment</th>
                                                         <th>Drop Off Time</th>
                                                         <th>Date</th>
                                                         <th>Vehicle</th>
                                                         <th>Confirm</th>
                                                         <th>Pay</th>
                                                         <th>Cancel</th>
                                                     </tr>
                                                 </tfoot>
                                                 <tbody>
                                                 <?php
                                                     include 'connection.php';
 
                                                     $fetch = "SELECT * FROM booking b JOIN services s ON b.S_ID = s.S_ID WHERE DAY(b.BK_date) = '$cdate' AND YEAR(b.BK_date) = '$cyear' AND MONTH(b.BK_date) = '$cmonth'";
                                                     $run = mysqli_query($connect,$fetch);
                                                     $count = mysqli_num_rows($run);
 
                                                     $counter = 1;
                                                     for ($i=0; $i < $count ; $i++) 
                                                     { 
                                                             $data = mysqli_fetch_array($run);
                                                     ?>
                                                         <tr>
                                                             <td><?php echo $counter;?></td>
                                                             <td><?php echo $data['BK_name'];?></td>
                                                             <td><?php echo $data['BK_phone'];?></td>
                                                             <td><?php echo $data['BK_email'];?></td>
                                                             <td><?php echo $data['S_name'];?></td>
                                                             <td><?php echo $data['BK_comment'];?></td>
                                                             <td><?php echo $data['BK_dropoff_time'];?></td>
                                                             <td><?php echo $data['BK_date'];?></td>
                                                             <td><?php echo $data['BK_vehicle'];?></td>
                                                             <td><?php echo $data['BK_confirm'];?></td>
                                                             <td><?php echo $data['BK_pay'];?></td>
                                                             <td><?php echo $data['BK_cancel'];?></td>
                                                         </tr>
                                                     <?php
                                                         $counter++;
                                                         } 
                                                     ?>
                                                 </tbody>
                                             </table>
                                     </div>
 
                                 </div>
                                 
                             </div>
 
                             </div>
                            </div>
                            <div class="col-xl-12">
                                <?php
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
                                        $cdataPoints[] = array('y' => $r['num_of_booking'], 'label' => array($r['C_name']));
                                      }
                                    }
                                    sort($cdataPoints);
                                ?>

                                <div id="cchartContainer" style="height: 370px; width: 100%;"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

    <!-- DatabaseTable table_assests js file link-->
    <script src="table_assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="table_assets/js/atlantis.min.js"></script>
    <script src="table_assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="table_assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="table_assets/js/core/popper.min.js"></script>
    <script src="table_assets/js/core/bootstrap.min.js"></script>
    <script src="table_assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="table_assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="table_assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="table_assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="table_assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="table_assets/prism.js"></script>
    <script src="table_assets/prism-normalize-whitespace.min.js"></script>

    <!-- Pie Chart -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <!-- Table -->
    <script type="text/javascript">
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});

		$('#multi-filter-select').DataTable( {
			"pageLength": 5,
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		});

		// Add Row
		$('#add-row').DataTable({
			"pageLength": 5,
		});

		var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

		$('#addRowButton').click(function() {
			$('#add-row').dataTable().fnAddData([
				$("#addName").val(),
				$("#addPosition").val(),
				$("#addOffice").val(),
				action
				]);
			$('#addRowModal').modal('hide');

		});
	});

    </script>

    <!-- Chart -->
    <script>
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText.trim());
            var dataPoints = [];

            if(Array.isArray(data)){
                dataPoints = data.map(function(row) {
                return {
                    y: parseFloat(row.y),
                    label: row.label
                };
                });
            }
            else {
                console.log('Data is not an array!');
            }

            console.log(dataPoints);

            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                animationEnabled: true,
                title: {
                text: "Yearly Popular Services"
                },
                subtitles: [{
                text: "Services",
                fontSize: 16
                }],
                data: [{
                type: "pie",
                indexLabelFontSize: 18,
                radius: 80,
                indexLabel: "{label} - {y}",
                dataPoints: dataPoints
                }]
            });

            chart.render();
            }
        };
        xhr.open("GET", "get_data.php", true);
        xhr.send();
    </script>

    <!-- Earnings -->
    <script>
     window.onload = function () {
      
     var lchart = new CanvasJS.Chart("dchartContainer", {
       title: {
         text: "Monthly Earnings"
       },
       axisY: {
         title: "Price Range",
         prefix: "$"
       },
       axisX: {
         title: "Months"
       },
       data: [{
         type: "line",
         yValueFormatString: "$#,##0",
         dataPoints: <?php echo json_encode($edataPoints, JSON_NUMERIC_CHECK); ?>
       }]
     });
     lchart.render();

     var cchart = new CanvasJS.Chart("cchartContainer", {
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
         dataPoints: <?php echo json_encode($cdataPoints, JSON_NUMERIC_CHECK); ?>
       }]
     });
     cchart.render();
      
     }
     </script>
</body>

</html>
<!-- end document-->
