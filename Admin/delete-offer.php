<?php
require_once('functions/function.php');
$did=$_GET['d'];
$delete="DELETE FROM cs_offer WHERE offer_id='$did'";

if(mysqli_query($con,$delete)){
   header('Location:all-offer.php');
}else {
  echo "Sorry";
}


?>
