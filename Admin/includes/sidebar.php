<section>
        <div class="container-fluid content_part_full">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                  <div class="user_part">
                    <?php if($_SESSION['image']!=''){ ?>
                    <img src="uploads/<?php echo $_SESSION['image']; ?>" alt="your photo">
                  <?php }else {?>
                    <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                  <?php } ?>

                    <h4><?php echo $_SESSION['user']; ?></h4>
                    <p><i class="fa fa-circle"></i> Online <?php echo $_SESSION['role']; ?></p>
                  </div>
                  <div class="menu">
                      <ul>
                        <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
                        <?php if($_SESSION['role']==1 || $_SESSION['role']==3){ ?>
                        <li><a href="all-user.php"><i class="fa fa-user-circle"></i> User</a></li>
                        <?php } ?>
                        <?php if($_SESSION['role']==1 || $_SESSION['role']==2){  ?>
                        <li><a href="all-banner.php"><i class="fa fa-bandcamp"></i> Banner</a></li>
                        <?php  } ?>
                        <li><a href="all-offer.php"><i class="fa fa-gift"></i> All Offers</a></li>
                        <li><a href="all-feature.php"><i class="fa fa-book"></i> All Feauters</a></li>
                        <li><a href="all-content.php"><i class="fa fa-rocket"></i> All Contents</a></li>
                        <li><a href="all-message.php"><i class="fa fa-comments"></i> All Messages</a></li>
                        <li><a href="all-teachers.php"><i class="fa fa-user-o"></i> All Teachers</a></li>
                        <li><a href="all-courses.php"><i class="fa fa-university"></i> All Courses</a></li>
                        <li><a href="all-about.php"><i class="fa fa-id-card"></i> About Us</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                      </ul>
                  </div>
                </div>
                <div class="col-md-10 content_part">
                    <div class="row custom_bread_part">
                        <div class="col-md-12 bread">
                             <ul>
                               <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                               <li><a href="#"><i class="fa fa-angle-double-right"></i> Dashboard</a></li>
                             </ul>
                        </div>
                    </div>
                <div class="row">
