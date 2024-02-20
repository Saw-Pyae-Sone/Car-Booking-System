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
    <title>Ban Accounts</title>

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

    <!-- link for (FROM TO Datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
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
                                            <li class="list-inline-item">Ban Accounts</li>
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
                    <?php
                        if(isset($_POST['ban']))
                        {
                            $cid = $_POST['ban'];

                            $data = "SELECT * FROM customer WHERE C_ID = '$cid'";
                            $run = mysqli_query($connect,$data);
                            $fetch = mysqli_fetch_assoc($run);
                    ?>
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <div class="card" id="form">
                                    <div class="card-header">
                                        <strong>Ban</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Customer Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email" name="cname" placeholder="CustomerID" class="form-control" required value="<?php echo $fetch['C_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Ban Times</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <i class="fas fa-calendar-alt"></i><label for="from" class="pl-2">From:</label>
                                                    <input type="text" id="from" name="FROM" class="border border-2">
                                                    <i class="fas fa-calendar-alt ml-3"></i><label for="to" class="pl-2">To:</label>
                                                    <input type="text" id="to" name="TO" class="border border-2">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Reason</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea id="textarea-input" rows="9" placeholder="Reasons" class="form-control" name="reason"></textarea>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="Banbtn" value="<?php echo $fetch['C_ID']?>">
                                            <i class="fa fa-dot-circle-o"></i> Ban
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm" onclick="history.reset();">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php   
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="card">
                             
                            <div class="card-body card_block">
								
								<h5 id="addrow" class="pb-2">Ban Accounts</h5>
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
                                                error_reporting(E_ALL ^ E_NOTICE);
                                                include 'connection.php';

												$fetch = "SELECT c.C_ID, c.*, COUNT(b.BK_ID) as num_cancelled_bookings
                                                FROM customer c
                                                JOIN booking b ON c.C_ID = b.C_ID
                                                WHERE b.BK_cancel = 'Cancelled'
                                                GROUP BY c.C_ID
                                                HAVING num_cancelled_bookings >= 3";
												$run = mysqli_query($connect,$fetch);
												$count = mysqli_num_rows($run);

												$counter = 1;
												for ($i=0; $i < $count ; $i++) 
												{
														$data = mysqli_fetch_array($run);

                                                        $C_id = $data['C_ID'];
                                                        
                                                        $ban = "SELECT * FROM ban WHERE C_ID = '$C_id'";
                                                        $gett = mysqli_query($connect,$ban);
                                                        $bget = mysqli_fetch_assoc($gett);
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
                                                                <?php
                                                                    if(!$bget)
                                                                    {
                                                                ?>
                                                                <button type="submit" class="btn btn-success btn-md" name="ban" value="<?php echo $data['C_ID']?>">Ban</button>
                                                                <?php
                                                                    }
                                                                    else
                                                                    {
                                                                ?>
                                                                <button type="submit" class="btn btn-danger btn-md ml-3" name="undo" value="<?php echo $data['C_ID']?>">Undo</button>
                                                                <?php
                                                                    }
                                                                ?>
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

    <!-- Date Picker Js link -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

// Date picker
$( function() {
    $( "#from" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function( selectedDate ) {
            $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
    });
    $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function( selectedDate ) {
            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
    });
} );

    $( function() {
      $( "#from" ).datepicker({
        dateFormat: "yyyy-mm-dd"
      });
      $( "#to" ).datepicker({
        dateFormat: "yyyy-mm-dd"
      });
    } );

    </script>
</body>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php'; 

    if(isset($_POST['Banbtn']))
    {
        $cid = $connect -> real_escape_string($_POST['Banbtn']);
        $from = $connect -> real_escape_string(date($_POST['FROM']));
        $to = $connect -> real_escape_string(date($_POST['TO']));
        $reason = $connect -> real_escape_string($_POST['reason']);

        $newfrom = date("Y-m-d", strtotime($from));
        $newto = date("Y-m-d", strtotime($to));

        $baninsert = "INSERT INTO ban(B_from,B_to,B_reason,C_ID) values('$newfrom','$newto','$reason','$cid')";
        $add = mysqli_query($connect,$baninsert);
        if($add)
        {   
            $get = "SELECT * FROM customer WHERE C_ID = '$cid'";
            $run = mysqli_query($connect,$get);
            $data1 = mysqli_fetch_assoc($run);    
        
            $mail = new PHPMailer(true);
    
            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username ='nvl.testingemail@gmail.com'; 
            $mail -> Password ='axbbayidnohonxoc'; 
            $mail -> SMTPSecure ='ssl';
            $mail -> Port = 465;
    
            $mail -> setFrom('nvl.testingemail@gmail.com'); 
                
            $mail -> addAddress($data1["C_email"]);
    
            $mail -> isHTML(true);
    
            $mail -> Subject = "Your Account got banned for cancelling the booking 3 times";
            $mail -> Body = $reason;
    
            $mail -> send();

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $updatec = "UPDATE customer SET C_status = 'Ban' WHERE C_ID = $cid";
                $undo = mysqli_query($connect,$updatec);
                if($updatec) 
                {
                    echo "<script>alert('Account Successfully Banned and Updated'); location.href='bannedAccounts.php';</script>";
                }
            }
        }
        else
        {
            echo mysqli_connect_error($connect);
        }
    }

    if(isset($_POST['undo']))
    {
        $CID = $_POST['undo'];

        $undoupdate = "UPDATE customer SET C_status = 'Active' WHERE C_ID = '$CID'";
        $up = mysqli_query($connect, $undoupdate);

        $undoban = "DELETE FROM ban WHERE C_ID = '$CID'";
        $undo = mysqli_query($connect,$undoban);
        if($undo)
            echo "<script>alert('Banned Account Successfully Undo'); location.href='bannedAccounts.php';</script>";
        else
            echo mysqli_connect_error($connect);         
    }
?>
</html>
<!-- end document-->