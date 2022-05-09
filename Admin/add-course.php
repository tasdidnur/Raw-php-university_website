<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 if(!empty($_POST)){
   $name=$_POST['name'];
   $details=$_POST['details'];
   $teacher=$_POST['teacher'];
   $seat=$_POST['seat'];
   $duration=$_POST['duration'];
   $image=$_FILES['pic'];
   $imageName='';
   if($image['name']!=''){
     $imageName='course-'. time() .'-'  . rand(100000,9999999). '.' . pathinfo($image['name'],PATHINFO_EXTENSION);
       }
   if (!empty($name)){
     if (!empty($image)){
      if (!empty($teacher)){

       $insert="INSERT INTO cs_course(course_name,course_details,course_teacher,course_seat,course_duration,course_image)
       VALUES('$name','$details','$teacher','$seat','$duration','$imageName')";

       if (mysqli_query($con,$insert)){
        move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
        header('Location:all-courses.php');
       } else {
        echo "oops! didn't connect";
      }
    }else {
      echo "Please enter teacher name.";
    }
    }
    else {
      echo "Your enter image.";
    }
   }else {
     echo "Please enter course name.";
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
                      <a class="btn btn-sm btn-dark card_top_btn" href="all-courses.php"><i class="fa fa-th"></i> All Courses</a>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div>
          <div class="card-body">
               <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Course Name:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="name">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Course Details:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="details">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Course Teacher:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="teacher">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Course Seat:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="seat">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Course Duration:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="duration">
                  </div>
                </div>
                <div class="form-group row custom_form_group">
                  <label class="col-sm-3 col-form-label">Course Image:</label>
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
