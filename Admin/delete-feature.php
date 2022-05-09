<?php
require_once('functions/function.php');
$did=$_GET['d'];
$delete="DELETE FROM cs_feature WHERE feature_id='$did'";

if(mysqli_query($con,$delete)){
   header('Location:all-feature.php');
}else {
  echo "Sorry";
}


?>
