<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['e'];
 $sele="SELECT * FROM cs_user WHERE user_id='$uid'" ;
 $qe=mysqli_query($con,$sele);
 $data=mysqli_fetch_assoc($qe);

 if(!empty($_POST)){
   $eid=$_POST['eid'];
   $name=$_POST['name'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $image=$_FILES['pic'];
   $imageName='';

   if($image['name']!=''){
     $imageName='user-'. time() .'-'  . rand(100000,9999999). '.' . pathinfo($image['name'],PATHINFO_EXTENSION);
       }

   $update="UPDATE cs_user SET  user_name='$name', user_phone='$phone', user_email='$email' WHERE user_id='$eid'";

   if(mysqli_query($con,$update)){
     if($imageName!=''){
     $upd="UPDATE cs_user SET user_photo='$imageName' WHERE user_id='$eid'";
     mysqli_query($con,$upd);
     move_uploaded_file($image['tmp_name'], 'uploads/'. $imageName);
     header('Location:view-user.php?v='.$eid);
     }
     header('Location:view-user.php?v='.$eid);
   }else {
     header('Location:edit.php?e='.$eid);
   }

 }

?>
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                          <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Update User Information</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All user</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                 <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Name:</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="eid" value="<?= $data['user_id']; ?>">
                      <input type="text" class="form-control" id="" name="name" value="<?= $data['user_name']; ?>">
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Phone:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="" name="phone" value="<?= $data['user_phone']; ?>">
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="" name="email" value="<?= $data['user_email']; ?>">
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Username:</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" id="" name="user" value="<?= $data['user_username']; ?>" disabled>
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
                         <option value='<?= $urole['role_id']; ?>'<?php if($data['role_id']==$urole['role_id']){echo "selected";}; ?>><?php echo $urole['role_name']; ?></option>
                       <?php } ?>
                       </select>
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-4">
                      <input type="file" id="" name="pic">
                    </div><br>
                    <div class="col-sm-3">
                      <?php if($data['user_photo']!=''){ ?>
                      <img src="uploads/<?= $data['user_photo']; ?>" height="100px" width="100px" alt="your photo">
                    <?php }else {?>
                      <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                    <?php } ?>
                    </div>
                  </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark submit_btn">UPDATE</button>
            </div>
          </div>
      </form>
    </div>
<?php
  get_footer();
?>
