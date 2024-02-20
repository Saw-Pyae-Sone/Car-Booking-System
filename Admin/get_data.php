<?php
session_start();
include 'connection.php';

$years = date('Y');

if(isset($_SESSION['year']))
{
  $years = $_SESSION['year']; 
}

$sql = "SELECT * FROM services";
$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);

$data = array();

for($i=1; $i<=$count; $i++)
{
  $out = mysqli_fetch_assoc($result);

  $bk = "SELECT COUNT(*) as num_services FROM booking WHERE S_ID = '$i' AND YEAR(BK_date) ='$years'";
  $con = mysqli_query($connect,$bk);


  while ($row = mysqli_fetch_assoc($con)) {
    if($row['num_services']>3)
    {
      $sql = "SELECT * FROM services WHERE S_ID = '$i'";
      $result = mysqli_query($connect, $sql);
      $r = mysqli_fetch_assoc($result);
      $data[] = array('y' => $row['num_services'], 'label' => array($r['S_name']));
    }
  }
}

echo json_encode($data);
?>
