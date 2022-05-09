<?php
require_once('functions/function.php');
$did=$_GET['d'];
$delete="DELETE FROM cs_messsge WHERE con_id='$did'";

if(mysqli_query($con,$delete)){
   header('Location:all-message.php');
}else {
  echo "Sorry";
}


?>
