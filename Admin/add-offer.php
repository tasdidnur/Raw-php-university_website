<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 if(!empty($_POST)){
   $title=htmlentities($_POST['title'],ENT_QUOTES);
   $subtitle=htmlentities($_POST['subtitle'],ENT_QUOTES);
   $icon=htmlentities($_POST['icon'],ENT_QUOTES);

   if (!empty($title)) {
      if (!empty($subtitle)) {
         if(!empty($icon)){
       $insert="INSERT INTO cs_offer(offer_title,offer_subtitle,offer_icon)
       VALUES('$title','$subtitle','$icon')";

       if (mysqli_query($con,$insert)){
        header('Location:all-offer.php');
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
                                              <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Add Offer Information</h4>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <a class="btn btn-sm btn-dark card_top_btn" href="all-banner.php"><i class="fa fa-th"></i> All Offers</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Title:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="title">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Subtitle:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="subtitle">
                                        </div>
                                      </div>
                                      <div class="form-group row custom_form_group">
                                        <label class="col-sm-3 col-form-label">Offer Icon Class:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" id="" name="icon">
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
