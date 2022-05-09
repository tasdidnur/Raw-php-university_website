<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();

 $uid=$_GET['v'];
 $sele="SELECT * FROM cs_offer WHERE offer_id='$uid'";
 $qv=mysqli_query($con,$sele);
 $info=mysqli_fetch_assoc($qv);
?>
                        <div class="col-md-12 main_content">
                            <div class="card">
                              <div class="card-header">
                                  <div class="row">
                                      <div class="col-md-8">
                                            <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> View Offer Information</h4>
                                      </div>
                                      <div class="col-md-4 text-right">
                                          <a class="btn btn-sm btn-dark card_top_btn" href="all-offer.php"><i class="fa fa-th"></i> All Offers</a>
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
                                                  <td>Title</td>
                                                  <td>:</td>
                                                  <td><?= $info['offer_title']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Subtitle</td>
                                                  <td>:</td>
                                                  <td><?= $info['offer_subtitle']; ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Subject</td>
                                                  <td>:</td>
                                                  <td><?= $info['offer_icon']; ?></td>
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
