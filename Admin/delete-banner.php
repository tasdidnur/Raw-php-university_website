<?php
require_once('functions/function.php');
$did=$_GET['db'];
$delete="DELETE FROM cs_banner WHERE ban_id='$did'";

if(mysqli_query($con,$delete)){
   header('Location:all-banner.php');
}else {
  echo "Sorry";
}


?>
