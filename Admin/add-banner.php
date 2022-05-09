<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 if(!empty($_POST)){
   $title=htmlentities($_POST['title'],ENT_QUOTES);
   $subtitle=htmlentities($_POST['subtitle'],ENT_QUOTES);
   $button=htmlentities($_POST['button'],ENT_QUOTES);
   $url=htmlentities($_POST['url'],ENT_QUOTES);
   $image=$_FILES['pic'];
   $imageName='';
   if($image['name']!=''){
     $imageName='user-'. time() .'-'  . rand(100000,9999999). '.' . pathinfo($image['name'],PATHINFO_EXTENSION);
       }
   if (!empty($title)) {
     if (!empty($image)) {
      if (!empty($url)) {

       $insert="INSERT INTO cs_banner(ban_title,ban_subtitle,ban_button,ban_url,ban_image)
       VALUES('$title','$subtitle','$button','$url','$imageName')";

       if (mysqli_query($con,$insert)){
        move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
        header('Location:all-banner.php');
       } else {
        echo "oops! didn't connect";
      }
    }else {
      echo "Please enter url.";
    }
    }
    else {
      echo "Please upload image.";
    }
   }else {
     echo "Please enter title.";
   }
  }

?>
                        <div class="col-md-12 main_content">
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8">
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Add Banner Information</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a class="btn btn-sm btn-dark card_top_btn" href="all-banner.php"><i class="fa fa-th"></i> All Banner</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Banner Title:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="title">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Banner Subtitle:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="subtitle">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Banner Button:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="button">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Banner URL:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="url">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Banner Background Image</label>
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
