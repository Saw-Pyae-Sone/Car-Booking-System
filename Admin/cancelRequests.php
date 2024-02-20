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
    <title>Cancel Request</title>

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
                                            <li class="list-inline-item">Cancel Requests</li>
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
								
								<h5 id="addrow" class="pb-2">Cancel Requests</h5>
								<div class="bd-example">
                            
                                <div class="col-md-12">
                                <?php 
                                    include 'connection.php';
                                    $cancel = "SELECT * FROM booking, contact_us WHERE contact_us.BK_ID = booking.BK_ID AND booking.BK_cancel = 'Uncancelled'";
                                    $run = mysqli_query($connect,$cancel);
                                    while($fetch = mysqli_fetch_assoc($run))
                                    {
                                ?>
                                    <div class="card border border-secondary">
                                        <div class="card-header">
                                            <strong class="card-title font-monospace"><?php echo $fetch['CT_subject']; ?></strong>
                                        </div>
                                        <div class="card-body">

                                            <strong  style="display: block;">Name:<i class="pl-3 card-text"><?php echo $fetch['CT_name']; ?></i></strong>

                                            <strong style="display: block; margin-top: 20px;">Email:<i class="pl-3 card-text"><?php echo $fetch['CT_email']; ?></i></strong>
                                            
                                            <strong style="display: block; margin-top: 20px;">Message:<i class="pl-3 card-text"><?php echo $fetch['CT_message']; ?></i></strong>
                                        </div>
                                        <form action="" method="post">
                                        <div class="card-footer">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Email Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="hf-email" name="email" placeholder="Enter Email" class="form-control" required value="<?php echo $fetch['CT_email']; ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label" >Subject</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email" name="decision" placeholder="Enter Subject" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Message</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea id="textarea-input" name="reason" rows="5" placeholder="Enter message" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-md" name="cancel" value="<?php echo $fetch['BK_ID']; ?>">
                                                <i class="fa fa-dot-circle-o"></i> Send
                                            </button>
                                        </div>
                                        </form>
                                    </div>                                                                
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

    if(isset($_POST["cancel"]))
    {
       
        $BKID = $_POST["cancel"];

        $mail = new PHPMailer(true);
        

        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username ='nvl.testingemail@gmail.com'; 
        $mail -> Password ='axbbayidnohonxoc'; 
        $mail -> SMTPSecure ='ssl';
        $mail -> Port = 465;

        $mail -> setFrom('nvl.testingemail@gmail.com'); 
         
        $mail -> addAddress($_POST["email"]);

        $mail -> isHTML(true);
       

        $mail -> Subject = $_POST["decision"];
        $mail -> Body = $_POST["reason"];
        
        $mail -> send();
       

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $update = "UPDATE booking set BK_cancel = 'Cancelled' WHERE BK_ID = '$BKID'";
            $add = mysqli_query($connect, $update);
            if($update)
                echo "<script> alert('Cancel decision has been sent and updated'); document.location.href = 'cancelRequests.php';</script>";
            else
                echo mysqli_connect_error($connect);
        }
    }
?>
</html>
<!-- end document-->
