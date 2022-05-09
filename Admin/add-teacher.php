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
   $image=$_FILES['pic'];
   $imageName='';
   if($image['name']!=''){
     $imageName='teacher-'. time() .'-'  . rand(100000,9999999). '.' . pathinfo($image['name'],PATHINFO_EXTENSION);
       }
   if (!empty($name)) {
     if (!empty($image)) {
      if (!empty($email)) {

       $insert="INSERT INTO cs_teacher(teacher_name,teacher_desig,teacher_details,teacher_pic)
       VALUES('$name','$phone','$email','$imageName')";

       if (mysqli_query($con,$insert)){
        move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
        header('Location:all-teachers.php');
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
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Teacher Registration</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a class="btn btn-sm btn-dark card_top_btn" href="all-teachers.php"><i class="fa fa-th"></i> All Teachers</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Teacher Name:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="name">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Teacher Designation:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="phone">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Teacher Details:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="email">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Teacher Image:</label>
                                        <div class="col-sm-7">
                                          <input type="file" id="" name="pic" onchange="readURL(this)"><br><br>
                                          <img id="blah" src="images/avatar.png" alt="your image" height="200" width="200" />
                                        </div>
                                      </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark submit_btn">UPLOAD</button>
                                </div>
                              </div>
                          </form>
                        </div>
<?php
  get_footer();
?>
