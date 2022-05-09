<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['v'];
 $sele="SELECT * FROM cs_course WHERE course_id='$uid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);
?>
<div class="col-md-12 main_content">
    <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-8">
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Course Information</h4>
              </div>
              <div class="col-md-4 text-right">
                  <a class="btn btn-sm btn-dark card_top_btn" href="all-courses.php"><i class="fa fa-th"></i> All Course Information</a>
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
                          <td>Course Name</td>
                          <td>:</td>
                          <td><?= $info['course_name']; ?></td>
                      </tr>
                      <tr>
                          <td>Course Details</td>
                          <td>:</td>
                          <td><?= $info['course_details']; ?></td>
                      </tr>
                      <tr>
                          <td>Course Teacher</td>
                          <td>:</td>
                          <td><?= $info['course_teacher']; ?></td>
                      </tr>
                      <tr>
                          <td>Course Seat</td>
                          <td>:</td>
                          <td><?= $info['course_seat']; ?></td>
                      </tr>
                      <tr>
                          <td>Course Duration</td>
                          <td>:</td>
                          <td><?= $info['course_duration']; ?></td>
                      </tr>
                      <tr>
                          <td>Teacher Image</td>
                          <td>:</td>
                          <td>
                            <?php if($info['course_image']!=''){ ?>
                            <img src="uploads/<?= $info['course_image']; ?>" height="200px" width="250px" alt="your photo">
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
