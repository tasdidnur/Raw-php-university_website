<?php
require_once('functions/function.php');
$did=$_GET['d'];
$delete="DELETE FROM cs_user WHERE user_id='$did'";

if(mysqli_query($con,$delete)){
   header('Location:all-user.php');
}else {
  echo "Sorry";
}


?>
