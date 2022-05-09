<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 if(!empty($_POST)){
   $name=htmlentities($_POST['name'],ENT_QUOTES);
   $phone=htmlentities($_POST['phone'],ENT_QUOTES);
   $email=htmlentities($_POST['email'],ENT_QUOTES);
   $user=htmlentities($_POST['user'],ENT_QUOTES);
   $pass=md5($_POST['pass']);
   $repass=md5($_POST['repass']);
   $role=$_POST['role'];
   $image=$_FILES['pic'];
   $imageName='';
   if($image['name']!=''){
     $imageName='user-'. time() .'-'  . rand(100000,9999999). '.' . pathinfo($image['name'],PATHINFO_EXTENSION);
       }
   if (!empty($name)) {
     if ($pass===$repass) {
      if (!empty($role)) {

       $insert="INSERT INTO cs_user(user_name,user_phone,user_email,user_username,user_password,role_id,user_photo)
       VALUES('$name','$phone','$email','$user','$pass','$role','$imageName')";

       if (mysqli_query($con,$insert)){
        move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
        header('Location:all-user.php');
       } else {
        echo "oops! didn't connect";
      }
    }else {
      echo "Please select your user role";
    }
    }
    else {
      echo "Your password didn't match.";
    }
   }else {
     echo "Please enter name.";
   }
  }

?>
<div class="col-md-12 main_content">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                      <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> User Registration</h4>
                </div>
                <div class="col-md-4 text-right">
                    <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All User</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="card-body">
             <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="" name="name">
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Phone:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="" name="phone">
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-7">
                  <input type="email" class="form-control" id="" name="email">
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Username:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="" name="user">
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Password:</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="" name="pass">
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Confirm Password:</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="" name="repass">
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Name:</label>
                <div class="col-sm-7">
                  <select class="form-control" id="" name="role">
                     <option value=''>Select User Role</option>
                     <?php

                        $selr="SELECT * FROM cs_role ORDER BY role_id";
                        $qr=mysqli_query($con,$selr);
                        while($urole=mysqli_fetch_assoc($qr)) {

                      ?>
                     <option value='<?= $urole['role_id']; ?>'><?php echo $urole['role_name']; ?></option>
                   <?php } ?>
                   </select>
                </div>
              </div>
              <div class="form-group row custom_form_group">
                <label class="col-sm-3 col-form-label">Photo</label>
                <div class="col-sm-7">
                  <input type="file" id="" name="pic" onchange="readURL(this)"><br><br>
                  <img id="blah" src="images/avatar.png" alt="your image" height="200" width="200" />
                </div>
              </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark submit_btn">REGISTRATION</button>
        </div>
      </div>
  </form>
</div>
<?php
  get_footer();
?>
