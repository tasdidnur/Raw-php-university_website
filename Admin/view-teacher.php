<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['v'];
 $sele="SELECT * FROM cs_teacher WHERE teacher_id='$uid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);
?>
<div class="col-md-12 main_content">
    <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-8">
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Teacher Information</h4>
              </div>
              <div class="col-md-4 text-right">
                  <a class="btn btn-sm btn-dark card_top_btn" href="all-teachers.php"><i class="fa fa-th"></i> All Teacher Information</a>
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
                          <td>Teacher Name</td>
                          <td>:</td>
                          <td><?= $info['teacher_name']; ?></td>
                      </tr>
                      <tr>
                          <td>Teacher Designation</td>
                          <td>:</td>
                          <td><?= $info['teacher_desig']; ?></td>
                      </tr>
                      <tr>
                          <td>Teacher Details</td>
                          <td>:</td>
                          <td><?= $info['teacher_details']; ?></td>
                      </tr>
                      <tr>
                          <td>Teacher Image</td>
                          <td>:</td>
                          <td>
                            <?php if($info['teacher_pic']!=''){ ?>
                            <img src="uploads/<?= $info['teacher_pic']; ?>" height="100px" width="100px" alt="your photo">
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
