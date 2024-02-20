<?php
session_start();
unset( $_SESSION['admin_ID']);
echo "<script>alert('Successfully Signed Out');window.open('login.php','_self');</script>";
?>