<?php
session_start();
unset($_SESSION['C_ID']);
echo "<script>alert('Successfully Signed Out');window.open('../Home/index.php','_self');</script>";
?>