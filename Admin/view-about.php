<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['v'];
 $sele="SELECT * FROM cs_about WHERE about_id='$uid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);
?>
<div class="col-md-12 main_content">
    <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-8">
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Person Information</h4>
              </div>
              <div class="col-md-4 text-right">
                  <a class="btn btn-sm btn-dark card_top_btn" href="all-about.php"><i class="fa fa-th"></i> All About Us</a>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                  <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                          <td>Person Name</td>
                          <td>:</td>
                          <td><?= $info['about_name']; ?></td>
                      </tr>
                      <tr>
                          <td>Person Designation</td>
                          <td>:</td>
                          <td><?= $info['about_desig']; ?></td>
                      </tr>
                      <tr>
                          <td>Person Title</td>
                          <td>:</td>
                          <td><?= $info['about_title']; ?></td>
                      </tr>
                      <tr>
                          <td>Person Image</td>
                          <td>:</td>
                          <td>
                            <?php if($info['about_image']!=''){ ?>
                            <img src="uploads/<?= $info['about_image']; ?>" height="100px" width="100px" alt="your photo">
                          <?php }else {?>
                            <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                          <?php } ?>
                          </td>
                      </tr>
                  </table>
              </div>
              <div class="col-md-2"></div>
          </div>
      </div>
      <div class="card-footer text-center">
          .
      </div>
    </div>
</div>
<?php
  get_footer();
?>
