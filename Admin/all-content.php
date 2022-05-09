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
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Content Information</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <table class="table table-bordered table-striped table-hover custom_table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Page</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Subtitle</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Manage</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $sel="SELECT * FROM cs_content NATURAL JOIN cs_page ORDER BY content_id ASC";
                                        $sq=mysqli_query($con,$sel);
                                        $id=1;
                                        while ($data=mysqli_fetch_assoc($sq)) {
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
                                        <td><?php echo substr($data['page_name'],0,20); ?></td>
                                        <td><?php echo substr($data['content_title'],0,20); ?></td>
                                        <td><?= substr($data['content_subtitle'],0,30); ?></td>
                                        <td><?= substr($data['content_details'],0,40); ?></td>

                                        <td>
                                          <?php if($data['content_image']!=''){ ?>
                                          <img src="uploads/<?= $data['content_image']; ?>" height="30px" width="30px" alt="your photo">
                                        <?php }else {?>
                                          <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                                        <?php } ?>
                                        </td>
                                        <td>
                                          <a href="edit-content.php?e=<?= $data['content_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
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
