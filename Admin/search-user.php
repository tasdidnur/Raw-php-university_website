<?php
 require_once('functions/function.php');
 needLogged();
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
                                          <a class="btn btn-sm btn-dark card_top_btn" href="add-user.php"><i class="fa fa-th"></i> Form</a>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <form class="form-inline" method="get" action="search-user.php">
                                        <div class="form-group mx-sm-3 mb-2">
                                          <input type="text" class="form-control" id="" name="search" placeholder="Search Here">
                                        </div>
                                          <button type="submit" class="btn btn-primary mb-2">SEARCH</button>
                                        </form>
                                    </div>
                                  </div>
                                  <table class="table table-bordered table-striped table-hover custom_table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">User Image</th>
                                        <th scope="col">Manage</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $id=1;
                                        $search=$_GET['search'];
                                        $sel="SELECT * FROM cs_user NATURAL JOIN cs_role WHERE user_name LIKE '%$search%' OR user_phone LIKE '%$search%' OR role_name LIKE '%$search%'";
                                        $sq=mysqli_query($con,$sel);

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
                                        <td><?php echo $data['user_name']; ?></td>
                                        <td><?= $data['user_phone']; ?></td>
                                        <td><?= $data['user_email']; ?></td>
                                        <td><?= $data['user_username']; ?></td>
                                        <td><?= $data['role_name']; ?></td>
                                        <td>
                                          <?php if($data['user_photo']!=''){ ?>
                                          <img src="uploads/<?= $data['user_photo']; ?>" height="30px" width="30px" alt="your photo">
                                        <?php }else {?>
                                          <img src="images/avatar.png" height="30px" width="30px" alt="your photo">
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <a href="view-user.php?v=<?= $data['user_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                            <a href="edit.php?e=<?= $data['user_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                                            <a href="delete-user.php?d=<?= $data['user_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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
?>
