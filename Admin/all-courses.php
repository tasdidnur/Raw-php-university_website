<?php
 require_once('functions/function.php');
 needLogged();
 if($_SESSION['role']==1 || $_SESSION['role']==2 || $_SESSION['role']==3){
 get_header();
 get_sidebar();
?>
<div class="col-md-12 main_content">
    <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-8">
                    <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Course Information</h4>
              </div>
              <div class="col-md-4 text-right">
                <?php if($_SESSION['role']==1){ ?>
                  <a class="btn btn-sm btn-dark card_top_btn" href="add-course.php"><i class="fa fa-th"></i> Add Course</a>
                <?php } ?>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
      <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Details</th>
                <th scope="col">Course Teacher</th>
                <th scope="col">Course Seat</th>
                <th scope="col">Course Duration</th>
                <th scope="col">Image</th>
                <th scope="col">Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $course="SELECT * FROM cs_course ORDER BY course_id";
                $sc=mysqli_query($con,$course);
                $id=1;
                while ($data=mysqli_fetch_assoc($sc)) {

               ?>
              <tr>
               <td>
                  <?php
                   $count=$id++;
                    if($count<10) {
                      echo "0".$count;
                    }else {
                      echo "sorry";
                    }
                   ?>
                </td>
                <td><?php echo substr($data['course_name'],0,20); ?>...</td>
                <td><?= substr($data['course_details'],0,20); ?>...</td>
                <td><?= substr($data['course_teacher'],0,20); ?>...</td>
                <td><?= substr($data['course_seat'],0,10); ?>...</td>
                <td><?= substr($data['course_duration'],0,10); ?>...</td>
                <td>
                  <?php if($data['course_image']!=''){ ?>
                  <img src="uploads/<?= $data['course_image']; ?>" height="30px" width="30px" alt="your photo">
                <?php }else {?>
                  <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                <?php } ?>
                </td>
                <td>
                    <a href="view-course.php?v=<?= $data['course_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                    <a href="edit-course.php?e=<?= $data['course_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                    <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
                    <a href="delete-course.php?db=<?= $data['course_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                    <?php } ?>
                </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>
      </div>
      <div class="card-footer text-center">
          .
      </div>
    </div>
</div>
<?php
  get_footer();
}else {
  header('Location:index.php');
}
?>
