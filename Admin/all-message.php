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
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Table All Data</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                        <?php if($_SESSION['role']==1){ ?>
                                          <a class="btn btn-sm btn-dark card_top_btn" href="all-message.php"><i class="fa fa-th"></i> All Messages</a>
                                        <?php } ?>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <table class="table table-bordered table-striped table-hover custom_table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Manage</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $sel="SELECT * FROM cs_messsge ORDER BY con_id";
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
                                        <td><?php echo substr($data['con_name'],0,40); ?></td>
                                        <td><?= substr($data['con_email'],0,40); ?></td>
                                        <td><?= substr($data['con_sub'],0,40); ?></td>
                                        <td><?= substr($data['con_msg'],0,40); ?></td>
                                        <td><?= substr($data['con_time'],0,40); ?></td>
                                        <td>
                                            <a href="view-message.php?v=<?= $data['con_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                            <?php if($_SESSION['role']==1 || $_SESSION['role']==2){?>
                                            <a href="delete-message.php?d=<?= $data['con_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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
