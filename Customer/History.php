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
        <title>History</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- DatabaseTable table_assests css and bootstrap link -->
        <link rel="stylesheet" href="table_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="table_assets/css/atlantis.min.css">
        <link href="table_assets/styles.css" rel="stylesheet" />
        <link href="table_assets/prism.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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
                        <h2>Bookings History</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="contact.php">History</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Table Start -->
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                
            <div class="card-body card_block">
                
                <h5 id="addrow" class="pb-2">History Of Bookings</h5>
                <div class="bd-example">

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                                <?php
                                    include 'connection.php';
                                    $fetch = "SELECT * FROM booking WHERE C_ID = '$id'";
                                    $run = mysqli_query($connect,$fetch);
                                    $count = mysqli_num_rows($run);
                                ?>
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Drop Off time</th>
                                    <th>Date</th>
                                    <th>Vehicle</th>
                                    <th>Confrim</th>
                                    <th>Cancel</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Drop Off time</th>
                                    <th>Date</th>
                                    <th>Vehicle</th>
                                    <th>Confrim</th>
                                    <th>Cancel</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                                $counter = 1;
                                for ($i=0; $i < $count ; $i++) 
                                { 
                                        $data = mysqli_fetch_array($run);
                                    
                                        $sid = $data['S_ID'];
                                        
                                        $squery = "SELECT * FROM services WHERE S_ID = '$sid'";
                                        $srun = mysqli_query($connect,$squery);
                                        $sdata = mysqli_fetch_array($srun);
                                ?>
                                    <tr>
                                        <td><?php echo $counter;?></td>
                                        <td><?php echo $sdata['S_name'];?></td>
                                        <td><?php echo $data['BK_name'];?></td>
                                        <td><?php echo $data['BK_phone'];?></td>
                                        <td><?php echo $data['BK_email'];?></td>
                                        <td><?php echo $data['BK_comment'];?></td>
                                        <td><?php echo $data['BK_dropoff_time'];?></td>
                                        <td><?php echo $data['BK_date'];?></td>
                                        <td><?php echo $data['BK_vehicle'];?></td>
                                        <td><?php echo $data['BK_confirm'];?></td>
                                        <td><?php echo $data['BK_cancel'];?></td>
                                        <td>
                                            <form action="" method="post" enctype="multipart/form">
                                            <div class="form-button-action">
                                                <button type="submit" class="btn btn-success btn-md" name="cancel" value="<?php echo $data['BK_ID'];?>">Cancel</button>
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
        <!-- Table End -->


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
<?php
    include 'connection.php';
    if(isset($_POST['cancel']))
	{
		$bkid = $_POST['cancel'];
        $_SESSION['bkid'] = $bkid;

		echo "<script>location.href ='contact.php?bkid=$bkid';</script>";
	}
?>
