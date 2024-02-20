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
    <title>Warning Cancel Accounts</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

     <!-- DatabaseTable table_assests css and bootstrap link -->
     <link rel="stylesheet" href="table_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="table_assets/css/atlantis.min.css">
	<link href="table_assets/styles.css" rel="stylesheet" />
	<link href="table_assets/prism.css" rel="stylesheet" />
    
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
                                            <li class="list-inline-item">Warning Cancel Accounts</li>
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
								
								<h5 id="addrow" class="pb-2"> Warning 2-Times Booking Cancelled Accounts</h5>
								<div class="bd-example">

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Num_of_cancel</th>
													<th width="10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                    <th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Num_of_cancel</th>
                                                    <th>Action</th>
												</tr>
											</tfoot>
											<tbody>
											<?php
                                                include 'connection.php';

												$fetch = "SELECT c.C_ID, c.*, COUNT(b.BK_ID) as num_cancelled_bookings
                                                FROM customer c
                                                JOIN booking b ON c.C_ID = b.C_ID
                                                WHERE b.BK_cancel = 'Cancelled'
                                                GROUP BY c.C_ID
                                                HAVING num_cancelled_bookings < 3";
												$run = mysqli_query($connect,$fetch);
												$count = mysqli_num_rows($run);

												$counter = 1;
												for ($i=0; $i < $count ; $i++) 
												{ 
														$data = mysqli_fetch_array($run);
												?>
													<tr>
														<td><?php echo $counter;?></td>
														<td><?php echo $data['C_name'];?></td>
														<td><?php echo $data['C_email'];?></td>
														<td><?php echo $data['C_phone'];?></td>
														<td><?php echo $data['num_cancelled_bookings'];?></td>
														<td>
                                                            <form action="" method="post">
															<div class="form-button-action">
                                                                <button type="submit" class="btn btn-success btn-md" name="warning" value="<?php echo $data['C_ID']?>">Warning</button>
															</div>
                                                            </form>
														</td>
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

</body>
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["warning"]))
    {
        $CID = $_POST["warning"];

		$takingout = "SELECT * FROM customer WHERE C_ID = '$CID'";
		$running = mysqli_query($connect,$takingout);
		$fetch = mysqli_fetch_assoc($running);

        $mail = new PHPMailer(true);

        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username ='nvl.testingemail@gmail.com'; 
        $mail -> Password ='axbbayidnohonxoc'; 
        $mail -> SMTPSecure ='ssl';
        $mail -> Port = 465;

        $mail -> setFrom('nvl.testingemail@gmail.com'); 
         
        $mail -> addAddress($fetch['C_email']);

        $mail -> isHTML(true);

        $mail -> Subject = "Warning Message from ThreeB";
        $mail -> Body = "We would like to bring to your attention that you have canceled your bookings twice. 
		Please kindly review and comply with our business terms and conditions, and help us by minimizing booking cancellations. We appreciate your understanding and cooperation.";

        $mail -> send();
		
		echo "<script> alert('A warning message has been sent'); document.location.href = 'warningcancelAccounts.php';</script>";
    }
?>
</html>
<!-- end document-->
