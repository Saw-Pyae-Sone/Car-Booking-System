<?php
    $connect = mysqli_connect('localhost','root','');
        if($connect)
            echo "connection secure <br>";
        echo mysqli_connect_error();
    
    $database = "CREATE DATABASE IF NOT EXISTS Three_b_booking";
    $return = mysqli_query($connect,$database);
        if($return)
            echo "successfully created <br>";
        echo mysqli_connect_error();
    $seldatabase = mysqli_select_db($connect,"Three_b_booking");
        if($seldatabase)
            echo "Selected Database<br>";
        echo mysqli_connect_error();

    $admin = "CREATE TABLE IF NOT EXISTS B_admin
            (
                admin_ID int primary key auto_increment not null,
                admin_name varchar(30),
                admin_email varchar(50),
                admin_password varchar(40),
                admin_profile varchar(50)
            );";
    $adreturn = mysqli_query($connect,$admin);
        if($adreturn)
            echo "admin table created <br>";
        echo mysqli_error($connect);
    
    $customer = "CREATE TABLE IF NOT EXISTS customer
                (   
                    C_ID int primary key auto_increment not null,
                    C_name varchar(50),
                    C_email varchar(50),
                    C_password varchar(40),
                    C_phone varchar(20),
                    C_profile varchar(255),
                    C_address text,
                    C_status varchar(20),
                    C_login_time date
                );";
    $creturn = mysqli_query($connect,$customer);
        if($creturn)
            echo "customer table created <br>";
        echo mysqli_error($connect);

    $reviews = "CREATE TABLE IF NOT EXISTS reviews
            (
                R_ID int primary key auto_increment not null,
                R_subject varchar(50),
                R_message text,
                Rating_star int,
                C_ID int not null,
                foreign key(C_ID) references customer(C_ID)  
            );";
    $return = mysqli_query($connect,$reviews);
        if($return)
            echo "reviews table created <br>";
        echo mysqli_error($connect);

    $ban = "CREATE TABLE IF NOT EXISTS ban
            (
                B_ID int primary key auto_increment not null,
                B_from date,
                B_to date,
                B_reason text,
                C_ID int not null,
                foreign key(C_ID) references customer(C_ID) 
            );";
    $breturn = mysqli_query($connect,$ban);
    if($breturn)
        echo "ban table created <br>";
    echo mysqli_error($connect);

    $service_type = "CREATE TABLE IF NOT EXISTS service_type
                (
                    ST_ID int primary key auto_increment not null,
                    ST_name varchar(30)
                );";
    $streturn = mysqli_query($connect,$service_type);
    if($streturn)
        echo "service type table created <br>";
    echo mysqli_error($connect);

    $service = "CREATE TABLE IF NOT EXISTS services
            (
                S_ID int primary key auto_increment not null,
                S_name varchar(30),
                S_image varchar(40),
                S_price int,
                S_vehicle varchar(20),
                S_status varchar(200),
                ST_ID int not null,
                foreign key(ST_ID) references service_type(ST_ID)
            );";
    $sreturn = mysqli_query($connect,$service);
    if($sreturn)
        echo "service table created <br>";
    echo mysqli_error($connect);

    $booking = "CREATE TABLE IF NOT EXISTS booking
            (
                BK_ID int primary key auto_increment not null,
                BK_name varchar(40),
                BK_phone varchar(20),
                BK_email varchar(50),
                BK_comment text,
                BK_dropoff_time varchar(20),
                BK_date date,
                BK_vehicle varchar(20),
                BK_confirm varchar(20),
                BK_pay varchar(20),
                BK_cancel varchar(20),
                S_ID int not null,
                foreign key(S_ID) references services(S_ID),
                C_ID int not null,
                foreign key(C_ID) references customer(C_ID)
            );";
    $bkreturn = mysqli_query($connect,$booking);
    if($bkreturn)
        echo "booking table created <br>";
    echo mysqli_error($connect);

    $contact = "CREATE TABLE IF NOT EXISTS contact_us
            (
                CT_ID int primary key auto_increment not null,
                CT_name varchar(40),
                CT_email varchar(50),
                CT_subject varchar(100),
                CT_message text,
                BK_ID int not null,
                foreign key(BK_ID) references booking(BK_ID)
            );";
    $ctreturn = mysqli_query($connect,$contact);
    if($ctreturn)
        echo "reviews table created <br>";
    echo mysqli_error($connect);
?>