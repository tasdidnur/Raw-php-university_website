<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['e'];
 $sele="SELECT * FROM cs_content NATURAL JOIN cs_page WHERE content_id='$uid'" ;
 $qe=mysqli_query($con,$sele);
 $data=mysqli_fetch_assoc($qe);

 if(!empty($_POST)){
   $eid=$_POST['eid'];
   $title=$_POST['title'];
   $subtitle=$_POST['subtitle'];
   $details=$_POST['details'];
   $image=$_FILES['pic'];
   $imageName='';
   if($image['name']!=''){
     $imageName='content-'. time() .'-'  . rand(100000,9999999). '.' . pathinfo($image['name'],PATHINFO_EXTENSION);
       }

   $update="UPDATE cs_content SET  content_title='$title', content_subtitle='$subtitle', content_details='$details' WHERE content_id='$eid'";

   if(mysqli_query($con,$update)){
     if($imageName!=''){
     $upd="UPDATE cs_content SET content_image='$imageName' WHERE content_id='$eid'";
     mysqli_query($con,$upd);
     move_uploaded_file($image['tmp_name'], 'uploads/'. $imageName);
     header('Location:all-content.php?v='.$eid);
     }
     header('Location:all-content.php?v='.$eid);
   }else {
     header('Location:edit-content.php?e='.$eid);
   }

 }

?>
    <div class="col-md-12 main_content">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                          <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Update Website Content</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-sm btn-dark card_top_btn" href="all-content.php"><i class="fa fa-th"></i> All Content</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                 <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Page:</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="eid" value="<?= $data['content_id']; ?>">
                      <input type="text" class="form-control" id="" name="page" value="<?= $data['page_name']; ?>" disabled>
                    </div>
                  </div>
                 <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Title:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" id="" name="title" value="<?= $data['content_title']; ?>">
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Subtitle:</label>
                    <div class="col-sm-7">
                      <textarea type="text" class="form-control" id="" name="subtitle" rows="5"><?= $data['content_subtitle']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Details:</label>
                    <div class="col-sm-7">
                      <textarea type="text" class="form-control" id="" name="details" rows="7"><?= $data['content_details']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row custom_form_group">
                    <label class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-4">
                      <input type="file" id="" name="pic">
                    </div><br>
                    <div class="col-sm-3">
                      <?php if($data['content_image']!=''){ ?>
                      <img src="uploads/<?= $data['content_image']; ?>" height="100px" width="100px" alt="your photo">
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
