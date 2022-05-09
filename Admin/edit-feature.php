<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $eid=$_GET['e'];
 $sele="SELECT * FROM cs_feature WHERE feature_id='$eid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);

 if(!empty($_POST)){
   $title=htmlentities($_POST['title'],ENT_QUOTES);
   $subtitle=htmlentities($_POST['subtitle'],ENT_QUOTES);
   $icon=htmlentities($_POST['icon'],ENT_QUOTES);
   $bg=htmlentities($_POST['bg'],ENT_QUOTES);

   if (!empty($title)) {
      if (!empty($subtitle)) {
         if(!empty($icon)){
       $update="UPDATE cs_feature SET feature_title='$title', feature_subtitle='$subtitle', feature_icon='$icon' , feature_bg='$bg' WHERE feature_id='$eid'";

       if (mysqli_query($con,$update)){
        header('Location:all-feature.php');
        }else {
        echo "oops! didn't connect";
       }
      }else {
      echo "Please enter icon class.";
     }
    }else {
      echo "Please enter subtitle.";
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
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Add Features Information</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a class="btn btn-sm btn-dark card_top_btn" href="all-feature.php"><i class="fa fa-th"></i> All Features</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Title:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="title" value="<?php echo $info['feature_title']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Subtitle:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="subtitle" value="<?= $info['feature_subtitle']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Icon Class:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="icon" value="<?= $info['feature_icon']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Background Class:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="bg" value="<?= $info['feature_bg']; ?>">
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
