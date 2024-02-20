<?php
    include 'connection.php'; 
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
    <title>Service</title>

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
                                            <li class="list-inline-item">Service</li>
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
                            if(isset($_POST['edit']))
                            {
                                $sid = $_POST['edit'];
                                
                                $query = "SELECT * FROM services where S_ID = '$sid'";
                                $run = mysqli_query($connect,$query);
                                $fetch2 = mysqli_fetch_assoc($run);
                        ?>
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Service</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Service Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="select_box">
                                                    <?php
                                                        $stid = $fetch2['ST_ID'];
                                                        $select1 = "SELECT * FROM service_type WHERE ST_ID='$stid'";
                                                        $run1 = mysqli_query($connect,$select1);
                                                        $fetch1=mysqli_fetch_assoc($run1);
                                                    ?>
                                                    <option value="<?php echo $fetch1['ST_ID']?>" selected><?php echo $fetch1['ST_name']?></option>
                                                <?php

                                                    $select = "SELECT * FROM service_type WHERE ST_ID !='$stid'";
                                                    $run = mysqli_query($connect,$select);

                                                    while($fetch=mysqli_fetch_assoc($run))
                                                    {
                                                ?>
                                                        <option value="<?php echo $fetch['ST_ID']?>" required><?php echo $fetch['ST_name']?></option>
                                                <?php
                                                    }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="service name" class=" form-control-label">Service Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email" name="service_name" value="<?php echo $fetch2['S_name']?>" placeholder="Enter Service Type Name..." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="service_image" value="<?php echo $fetch2['S_image']?>" class="form-control-file" accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Price (USD)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="hf-email" name="price" value="<?php echo $fetch2['S_price']?>" placeholder="Enter Price..." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Vehicle</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="vehicle" class="form-control">
                                                        <?php 
                                                            if($fetch2['S_vehicle'] === "car") 
                                                            {
                                                        ?>
                                                            <option value="car">Car</option>
                                                            <option value="motocycle">Motocycle</option>
                                                        <?php } else { ?>
                                                            <option value="car">Motocycle</option>
                                                            <option value="motocycle">Car</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="status" id="textarea-input" rows="9" placeholder="Content..." class="form-control"><?php echo $fetch2['S_status']?></textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" value="<?php echo $fetch2['S_ID']; ?>" class="btn btn-primary btn-sm" name="update">
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
                        <?php } else{?>
                        <div class="row mb-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Service</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Service Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="select_box">
                                                    <option selected disabled>Please select Service Type</option>
                                                <?php
                                                    include 'connection.php';
                                                    $select = "SELECT * FROM service_type";
                                                    $run = mysqli_query($connect,$select);

                                                    while($fetch=mysqli_fetch_assoc($run))
                                                    {
                                                ?>
                                                        <option value="<?php echo $fetch['ST_ID']?>"><?php echo $fetch['ST_name']?></option>
                                                <?php
                                                    }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="service name" class=" form-control-label">Service Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-email" name="service_name" placeholder="Enter Service Type Name..." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="service_image" class="form-control-file" accept="image/*" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Price (USD)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="hf-email" name="price" placeholder="Enter Price..." class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Vehicle</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="vehicle" class="form-control">
                                                        <option selected disabled>Please select Vehicle Type</option>
                                                        <option value="car">Car</option>
                                                        <option value="motocycle">Motocycle</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="status" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                            <i class="fa fa-dot-circle-o"></i> Insert
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
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="card">
                             
                            <div class="card-body card_block">
								
								<h5 id="addrow" class="pb-2">Service</h5>
								<div class="bd-example">

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Service Type</th>
													<th>Service Name</th>
													<th>Image</th>
													<th>Price(USD)</th>
													<th>Vehicle Type</th>
													<th>Status</th>
													<th width="10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                    <th>#</th>
													<th>Service Type</th>
													<th>Service Name</th>
													<th>Image</th>
													<th>Price(USD)</th>
													<th>Vehicle Type</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
                                            <?php
												$fetch = 'SELECT * FROM services';
												$run = mysqli_query($connect,$fetch);
												$count = mysqli_num_rows($run);

												$counter = 1;
												for ($i=0; $i < $count ; $i++) 
												{ 
														$data = mysqli_fetch_array($run);

                                                        $stid = $data['ST_ID'];

                                                        $query = "SELECT * FROM service_type WHERE ST_ID = '$stid'";
                                                        $trun = mysqli_query($connect,$query);
                                                        $tdata = mysqli_fetch_array($trun);
												?>
													<tr>
														<td><?php echo $counter;?></td>
														<td><?php echo $tdata['ST_name'];?></td>
														<td><?php echo $data['S_name'];?></td>
														<td><img src="./service_img/<?php echo $data['S_image'];?>" style="height:500, weidth:200,"></td>
														<td><?php echo $data['S_price'];?></td>
														<td><?php echo $data['S_vehicle'];?></td>
														<td><?php echo $data['S_status'];?></td>
														<td>
                                                            <form action="" method="post" enctype="multipart/form">
															<div class="form-button-action">
																<button type="submit" value="<?php echo $data['S_ID']; ?>" name="edit" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Update">
																	<i class="fa fa-edit"></i>
																</button>
																<button type="submit" value="<?php echo $data['S_ID'];?>" name="delete" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove">
																	<i class="fa fa-times"></i>
																</button>
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

</html>
<!-- end document-->
<?php
	if(isset($_POST['submit']))
	{   
        $servicename=$connect -> real_escape_string($_POST['service_name']);
        $price =$connect -> real_escape_string ($_POST['price']);
        $vehicle = $connect -> real_escape_string ($_POST['vehicle']);
        $status = $connect -> real_escape_string ($_POST['status']);
		$servicetype = $connect -> real_escape_string ($_POST['select_box']);

        $image = $_FILES['service_image']['name'];
        $path ="service_img/";
        
        if($image)
        {
            $filename = $path."".$image;
            $copy = copy($_FILES['service_image']['tmp_name'],$filename);
            if(!$copy)
                exit("Problem occured. Can't upload image!");
        }

		$insert = "INSERT INTO services(S_name,S_image,S_price,S_vehicle,S_status,ST_ID) values('$servicename','$image','$price','$vehicle','$status','$servicetype')";
		$runinsert = mysqli_query($connect,$insert);
		if($runinsert > 0)
		{
			echo "<script>alert('The service has been added');
			location.assign('service.php');</script>";
		}
	}

    if(isset($_POST['update']))
    {
        $sid = $_POST['update'];
        
        $servicename=$connect -> real_escape_string($_POST['service_name']);
        $price =$connect -> real_escape_string ($_POST['price']);
        $vehicle = $connect -> real_escape_string ($_POST['vehicle']);
        $status = $connect -> real_escape_string ($_POST['status']);
		$servicetype = $connect -> real_escape_string ($_POST['select_box']);

        $image = $_FILES['service_image']['name'];
        $path ="service_img/";
        
        if($image)
        {
            $filename = $path."".$image;
            $copy = copy($_FILES['service_image']['tmp_name'],$filename);
            if(!$copy)
                exit("Problem occured. Can't upload image!");
        }

        $update = "UPDATE services SET S_name = '$servicename', S_image = '$image', S_price = '$price', S_vehicle = '$vehicle', S_status = '$status', ST_ID = '$servicetype' WHERE S_ID = '$sid'";
        $run = mysqli_query($connect,$update);
        if($run)
        {
           echo "<script>alert('The service has been updated');location.assign('service.php');</script>";
        }
    }

    if(isset($_POST['delete']))
    {
        $sid = $_POST['delete'];

        $delete = "DELETE FROM services where S_ID = '$sid'";
        $run = mysqli_query($connect,$delete);
        if($run)
        {
            echo "<script>alert('service has been deleted');location.assign('service.php');</script>";
        }
    }
?>