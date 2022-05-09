<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['v'];
 $sele="SELECT * FROM cs_user NATURAL JOIN cs_role WHERE user_id='$uid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);
?>
                        <div class="col-md-12 main_content">
                            <div class="card">
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View User Information</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                          <a class="btn btn-sm btn-dark card_top_btn" href="all-user.php"><i class="fa fa-th"></i> All user</a>
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
                                                  <td>Name</td>
                                                  <td>:</td>
                                                  <td><?= $info['user_name']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Phone</td>
                                                  <td>:</td>
                                                  <td><?= $info['user_phone']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Email</td>
                                                  <td>:</td>
                                                  <td><?= $info['user_email']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Username</td>
                                                  <td>:</td>
                                                  <td><?= $info['user_username']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>User Role</td>
                                                  <td>:</td>
                                                  <td><?= $info['role_name']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Photo</td>
                                                  <td>:</td>
                                                  <td>
                                                    <?php if($info['user_photo']!=''){ ?>
                                                    <img src="uploads/<?= $info['user_photo']; ?>" height="100px" width="100px" alt="your photo">
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
