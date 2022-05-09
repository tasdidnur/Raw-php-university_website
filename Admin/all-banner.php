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
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> All Banner Information</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                        <?php if($_SESSION['role']==1){ ?>
                                          <a class="btn btn-sm btn-dark card_top_btn" href="add-banner.php"><i class="fa fa-th"></i> Add Banner</a>
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
                                        <th scope="col">Title</th>
                                        <th scope="col">Subtitle</th>
                                        <th scope="col">Button</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Manage</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $sel="SELECT * FROM cs_banner ORDER BY ban_id";
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
                                        <td><?php echo substr($data['ban_title'],0,20); ?>...</td>
                                        <td><?= substr($data['ban_subtitle'],0,20); ?>...</td>
                                        <td><?= substr($data['ban_button'],0,20); ?>...</td>
                                        <td><?= substr($data['ban_url'],0,10); ?>...</td>
                                        <td>
                                          <?php if($data['ban_image']!=''){ ?>
                                          <img src="uploads/<?= $data['ban_image']; ?>" height="30px" width="30px" alt="your photo">
                                        <?php }else {?>
                                          <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <a href="view-banner.php?vb=<?= $data['ban_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                            <a href="edit-banner.php?e=<?= $data['ban_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                                            <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
                                            <a href="delete-banner.php?db=<?= $data['ban_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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
