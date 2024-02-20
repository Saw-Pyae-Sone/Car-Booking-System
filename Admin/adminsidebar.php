<?php
session_start();
error_reporting(0);
include 'connection.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

<aside class="menu-sidebar2">
            <div class="logo bg-white">
                <a href="index.php">
                    <img src="images/logo.png" alt="Three-B" class="img-fluid ml-5 mt-4" width="160px" height="50px"/>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <?php
                        include 'connection.php';
                        $profile = 'SELECT * FROM b_admin';
                        $run = mysqli_query($connect,$profile);
                        $fetch = mysqli_fetch_assoc($run);
                    ?>
                    <div class="image img-cir img-120">
                        <img src="img/<?php echo $fetch['admin_profile']?>" alt="<?php echo $fetch['admin_profile']?>" />
                    </div>
                    <h4 class="name"><?php echo $fetch['admin_name']?></h4>
                    <a href="signout.php">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        
                        <li>
                            <a href="serviceType.php">
                                <i class="fas fa-copy"></i>Service Types</a>
                        </li>
                        <li>
                            <a href="service.php">
                                <i class="fas fa-copy"></i>Service</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tasks"></i>Booking 
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="confirmedBookings.php">
                                    <i class="fa fa-bookmark"></i>Confirmed Bookings</a>
                                </li>
                                <li>
                                    <a href="cancelledBookings.php">
                                    <i class="fa fa-bookmark"></i>Cancelled Bookings</a>
                                </li>
                                <li>
                                    <a href="cancelRequests.php">
                                    <i class="fa fa-bookmark"></i>Cancel Requests</a>
                                    <?php
                                        $booking = "SELECT count(CT_ID) as cancels FROM booking, contact_us WHERE contact_us.BK_ID = booking.BK_ID AND booking.BK_cancel = 'Uncancelled'";
                                        $run = mysqli_query($connect,$booking);
                                        $fetch = mysqli_fetch_assoc($run);
                                    ?>
                                    <span class="inbox-num"><?php echo $fetch['cancels']?></span>
                                </li>
                                <li>
                                    <a href="waitingBookings.php">
                                    <i class="fa fa-bookmark"></i>Waiting Bookings</a>
                                    <?php
                                        $booking = "SELECT count(BK_ID) as bookings FROM booking WHERE BK_confirm = 'Unconfirm' AND BK_cancel != 'Cancelled'";
                                        $run = mysqli_query($connect,$booking);
                                        $fetch = mysqli_fetch_assoc($run);
                                    ?>
                                    <span class="inbox-num"><?php echo $fetch['bookings']?></span>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Ban / Warning / Delete
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="banAccounts.php">
                                        <i class="fas fa-user"></i>Ban Accounts</a>
                                </li>
                                <li>
                                    <a href="bannedAccounts.php">
                                        <i class="fas fa-user"></i>Banned Accounts</a>
                                </li>
                                <li>
                                    <a href="warningcancelAccounts.php">
                                        <i class="fas fa-user"></i>Warning Cancel Accounts</a>
                                </li>
                                <li>
                                    <a href="warninginactiveAccounts.php">
                                        <i class="fas fa-user"></i>Warning Inactive Accounts</a>
                                </li>
                                <li>
                                    <a href="newAccounts.php">
                                    <i class="fas fa-user"></i>New Accounts</a>
                                </li>
                                <li>
                                    <a href="deleteAccounts.php">
                                    <i class="fas fa-user"></i>Delete Accounts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="sendEmail.php">
                                <i class="fa fa-envelope"></i> Send Email</a>
                        </li>
                        <li>
                            <a href="inbox.php">
                                <i class="fas fa-chart-bar"></i>Inbox</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-window-maximize"></i>Reports
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="popularservice.php">
                                    <i class="fa fa-arrow-up-right-dots"></i>Popular Service</a>
                                </li>
                                <li>
                                    <a href="Earnings.php">
                                    <i class="fa fa-coins"></i>Monthly Earnings</a>
                                </li>
                                <li>
                                    <a href="dailyrecords.php">
                                    <i class="fa-solid fa-record-vinyl"></i>Daily Records</a>
                                </li>
                                <li>
                                    <a href="customers.php">
                                    <i class="fa-solid fa-user"></i>Customers of the Year</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>