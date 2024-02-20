<header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="index.php">
                                    <img src="images/logo.jpg" alt="Three-B" class="img-fluid" width="100px" height="50px"/>
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="profile.php">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="sendEmail.php">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="inbox.php">
                                                <i class="zmdi zmdi-notifications"></i>Messages</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="menu-sidebar2__content js-scrollbar2">
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
                                <a href="inbox.php">
                                    <i class="fas fa-chart-bar"></i>Inbox</a>
                            </li>
                            <li>
                                <a href="profile.php">
                                    <i class="zmdi zmdi-account"></i>Account</a>
                            </li>
                            <li>
                                <a href="service.php">
                                    <i class="zmdi zmdi-account"></i>Service</a>
                            </li>
                            <li>
                                <a href="serviceType.php">
                                    <i class="zmdi zmdi-account"></i>Service Type</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tasks"></i>Bookings
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="confirmedBookings.php">
                                            <i class="fa fa-bookmark"></i>Comfirmed Booking</a>
                                    </li>
                                    <li>
                                        <a href="cancelledBookings.php">
                                            <i class="fa fa-bookmark"></i>Cancelled Booking</a>
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
                                    <i class="fas fa-tasks"></i>Ban / Warning / Delete
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
                                            <i class="fas fa-user"></i>Warnings Cancel Accounts</a>
                                    </li>
                                    <li>
                                        <a href="warninginactiveAccounts.php">
                                            <i class="fas fa-user"></i>Warnings Active Accounts</a>
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
                                    <i class="fa fa-envelope"></i>Send Email</a>
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
                                            <i class="fa fa-arrow-up-right-dots"></i>Popular Services</a>
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
                            <li>
                                <a href="signout.php">
                                    <i class="fa fa-envelope"></i>Sign Out</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>