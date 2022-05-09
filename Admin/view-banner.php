<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['vb'];
 $sele="SELECT * FROM cs_banner WHERE ban_id='$uid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);
?>
                        <div class="col-md-12 main_content">
                            <div class="card">
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Banner Information</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                          <a class="btn btn-sm btn-dark card_top_btn" href="all-banner.php"><i class="fa fa-th"></i> All Banner</a>
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
                                                  <td>Banner Title</td>
                                                  <td>:</td>
                                                  <td><?= $info['ban_title']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Banner Subtitle</td>
                                                  <td>:</td>
                                                  <td><?= $info['ban_subtitle']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Banner Button</td>
                                                  <td>:</td>
                                                  <td><?= $info['ban_button']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Banner URL</td>
                                                  <td>:</td>
                                                  <td><?= $info['ban_url']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Photo</td>
                                                  <td>:</td>
                                                  <td>
                                                    <?php if($info['ban_image']!=''){ ?>
                                                    <img src="uploads/<?= $info['ban_image']; ?>" height="100px" width="100px" alt="your photo">
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
