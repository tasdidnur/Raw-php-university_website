<?php
require_once('functions/manage.php');
get_header();
?>
    <section class="home-slider owl-carousel">
      <?php
       $bansel="SELECT * FROM cs_banner ORDER BY ban_id DESC";
       $bq=mysqli_query($con,$bansel);
       while($banner=mysqli_fetch_assoc($bq)){
       ?>
      <div class="slider-item" style="background-image:url(Admin/uploads/<?php echo $banner['ban_image'];?>);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate">
              <h1 class="mb-4"><?php echo $banner['ban_title'];?></h1>
              <p><?php echo $banner['ban_subtitle'];?></p>
              <p>
                <a href="<?php echo $banner['ban_url'];?>" class="btn btn-primary px-4 py-3 mt-3"><?php echo $banner['ban_button'];?></a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </section>
    <section class="ftco-services ftco-no-pb">
      <div class="container-wrap">
        <div class="row no-gutters">
          <?php
           $featsel="SELECT * FROM cs_feature ORDER BY feature_id";
           $feq=mysqli_query($con,$featsel);
           while($feature=mysqli_fetch_assoc($feq)){
           ?>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate <?= $feature['feature_bg'];?>">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <span class="<?= $feature['feature_icon'];?>"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading"><?= $feature['feature_title'];?></h3>
                <p><?= $feature['feature_subtitle'];?></p>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
      <div class="container">
        <?php
         $ofcon1="SELECT * FROM cs_content WHERE content_id=1";
         $bcon1=mysqli_query($con,$ofcon1);
         $content1=mysqli_fetch_assoc($bcon1);
         ?>
        <div class="row d-flex">
          <div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
            <div class="img" style="background-image:url(Admin/uploads/<?= $content1['content_image']; ?>);border"></div>
          </div>
          <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
            <h2 class="mb-4"><?= $content1['content_title']; ?></h2>
            <p><?= $content1['content_subtitle']; ?></p>
            <div class="row mt-5">
              <?php
               $ofsel="SELECT * FROM cs_offer ORDER BY offer_id ASC LIMIT 0,4";
               $bq=mysqli_query($con,$ofsel);
               while($offer=mysqli_fetch_assoc($bq)){
               ?>
              <div class="col-lg-6">
                <div class="services-2 d-flex">
                  <div class="icon mt-2 d-flex justify-content-center align-items-center">
                    <span class="<?= $offer['offer_icon'] ?>"></span>
                  </div>
                  <div class="text pl-3">
                    <h3><?= $offer['offer_title'] ?></h3>
                    <p><?= $offer['offer_subtitle'] ?></p>
                  </div>
                </div>
              </div>
             <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image:url(images/xbg_3.jpg.pagespeed.ic.jTVL4IaShH.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <?php
         $ofcon2="SELECT * FROM cs_content WHERE content_id=2";
         $bcon2=mysqli_query($con,$ofcon2);
         $content2=mysqli_fetch_assoc($bcon2);
         ?>
        <div class="row justify-content-center mb-5 pb-2 d-flex">
          <div class="col-md-6 align-items-stretch d-flex">
            <div class="img img-video d-flex align-items-center" style="background-image:url(images/xabout-2.jpg.pagespeed.ic.WZ3QXRP_6S.jpg)">
              <div class="video justify-content-center">
                <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                  <span class="ion-ios-play"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
            <h2 class="mb-4"><?= $content2['content_title']; ?></h2>
            <?= $content2['content_details']; ?>
          </div>
        </div>
        <div class="row d-md-flex align-items-center justify-content-center">
          <div class="col-lg-12">
            <div class="row d-md-flex align-items-center">
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon">
                    <span class="flaticon-doctor"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="18">0</strong>
                    <span>Certified Teachers</span>
                  </div>
                </div>
              </div>
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon">
                    <span class="flaticon-doctor"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="401">0</strong>
                    <span>Students</span>
                  </div>
                </div>
              </div>
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon">
                    <span class="flaticon-doctor"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="30">0</strong>
                    <span>Courses</span>
                  </div>
                </div>
              </div>
              <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                  <div class="icon">
                    <span class="flaticon-doctor"></span>
                  </div>
                  <div class="text">
                    <strong class="number" data-number="50">0</strong>
                    <span>Awards Won</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section">
      <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <?php
             $ofcon3="SELECT * FROM cs_content WHERE content_id=3";
             $bcon3=mysqli_query($con,$ofcon3);
             $content3=mysqli_fetch_assoc($bcon3);
             ?>
            <h2 class="mb-4">
              <?= $content3['content_title']; ?>
            </h2>
            <p><?= $content3['content_subtitle']; ?></p>
          </div>
        </div>
        <div class="row">
          <?php
           $ofcorse="SELECT * FROM cs_course ORDER BY course_id LIMIT 0,4";
           $bq=mysqli_query($con,$ofcorse);
           while($course=mysqli_fetch_assoc($bq)){
           ?>
          <div class="col-md-3 course ftco-animate">
            <div class="img" style="background-image:url(Admin/uploads/<?php echo $course['course_image'];?>)"></div>
            <div class="text pt-4">
              <p class="meta d-flex">
                <span>
                  <i class="icon-user mr-2"></i><?php echo $course['course_teacher'];?> </span>
                <span>
                  <i class="icon-table mr-2"></i><?= $course['course_seat'];?> seats </span>
                <span>
                  <i class="icon-calendar mr-2"></i><?= $course['course_duration'];?> Years </span>
              </p>
              <h3>
                <a href="#"><?= $course['course_name'];?></a>
              </h3>
              <p><?= $course['course_details'];?></p>
              <p>
                <a href="#" class="btn btn-primary">Apply now</a>
              </p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
      <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <?php
             $ofcon4="SELECT * FROM cs_content WHERE content_id=4";
             $bcon4=mysqli_query($con,$ofcon4);
             $content4=mysqli_fetch_assoc($bcon4);
             ?>
            <h2 class="mb-4"><?= $content4['content_title']; ?></h2>
            <p><?= $content4['content_subtitle']; ?></p>
          </div>
        </div>
        <div class="row">
          <?php
           $ofteac="SELECT * FROM cs_teacher ORDER BY teacher_id LIMIT 0,4";
           $bq=mysqli_query($con,$ofteac);
           while($teacher=mysqli_fetch_assoc($bq)){
           ?>
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div class="img align-self-stretch" style="background-image: url(Admin/uploads/<?php echo $teacher['teacher_pic'];?>);"></div>
              </div>
              <div class="text pt-3 text-center">
                <h3><?php echo $teacher['teacher_name'];?></h3>
                <span class="position mb-2"><?php echo $teacher['teacher_desig'];?></span>
                <div class="faded">
                  <p><?php echo $teacher['teacher_details'];?></p>
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate">
                      <a href="#">
                        <span class="icon-twitter"></span>
                      </a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#">
                        <span class="icon-facebook"></span>
                      </a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#">
                        <span class="icon-google-plus"></span>
                      </a>
                    </li>
                    <li class="ftco-animate">
                      <a href="#">
                        <span class="icon-instagram"></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-md-6 py-5 px-md-5">
            <div class="py-md-5">
              <div class="heading-section heading-section-white ftco-animate mb-5">
                <?php
                 $ofcon5="SELECT * FROM cs_content WHERE content_id=5";
                 $bcon5=mysqli_query($con,$ofcon5);
                 $content5=mysqli_fetch_assoc($bcon5);
                 ?>
                <h2 class="mb-4"><?= $content5['content_title']; ?></h2>
                <p><?= $content5['content_subtitle']; ?></p>
              </div>
              <form action="#" class="appointment-form ftco-animate">
                <div class="d-md-flex">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name">
                  </div>
                  <div class="form-group ml-md-4">
                    <input type="text" class="form-control" placeholder="Last Name">
                  </div>
                </div>
                <div class="d-md-flex">
                  <div class="form-group">
                    <div class="form-field">
                      <div class="select-wrap">
                        <div class="icon">
                          <span class="ion-ios-arrow-down"></span>
                        </div>
                        <select name="" id="" class="form-control">
                          <option value="">Select Your Course</option>
                          <option value="">Art Lesson</option>
                          <option value="">Language Lesson</option>
                          <option value="">Music Lesson</option>
                          <option value="">Sports</option>
                          <option value="">Other Services</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group ml-md-4">
                    <input type="text" class="form-control" placeholder="Phone">
                  </div>
                </div>
                <div class="d-md-flex">
                  <div class="form-group">
                    <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                  </div>
                  <div class="form-group ml-md-4">
                    <input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <?php
             $ofcon6="SELECT * FROM cs_content WHERE content_id=6";
             $bcon6=mysqli_query($con,$ofcon6);
             $content6=mysqli_fetch_assoc($bcon6);
             ?>
            <h2 class="mb-4">
              <?= $content6['content_title']; ?>
            </h2>
            <p><?= $content6['content_subtitle']; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_1.jpg');">
                <div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading">
                  <a href="#">Skills To Develop Your Child Memory</a>
                </h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0">
                    <a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                  </p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat">
                      <span class="icon-chat"></span> 3 </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_2.jpg');">
                <div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading">
                  <a href="#">Skills To Develop Your Child Memory</a>
                </h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0">
                    <a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                  </p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat">
                      <span class="icon-chat"></span> 3 </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('images/image_3.jpg');">
                <div class="meta-date text-center p-2">
                  <span class="day">26</span>
                  <span class="mos">June</span>
                  <span class="yr">2019</span>
                </div>
              </a>
              <div class="text bg-white p-4">
                <h3 class="heading">
                  <a href="#">Skills To Develop Your Child Memory</a>
                </h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center mt-4">
                  <p class="mb-0">
                    <a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                  </p>
                  <p class="ml-auto mb-0">
                    <a href="#" class="mr-2">Admin</a>
                    <a href="#" class="meta-chat">
                      <span class="icon-chat"></span> 3 </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <?php
             $ofcon7="SELECT * FROM cs_content WHERE content_id=7";
             $bcon7=mysqli_query($con,$ofcon7);
             $content7=mysqli_fetch_assoc($bcon7);
             ?>
            <h2 class="mb-4"><?= $content7['content_title']; ?></h2>
            <p><?= $content7['content_subtitle']; ?></p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <?php
                $abcon="SELECT * FROM cs_about ORDER BY about_id LIMIT 0,5";
                $abq=mysqli_query($con,$abcon);
                while($about=mysqli_fetch_assoc($abq)){
               ?>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image:url(Admin/uploads/<?= $about['about_image']; ?>)"></div>
                  <div class="text ml-2">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p><?= $about['about_title']; ?></p>
                    <p class="name"><?= $about['about_name']; ?></p>
                    <span class="position"><?= $about['about_desig']; ?></span>
                  </div>
                </div>
              </div>
               <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-gallery">
      <div class="container-wrap">
        <div class="row no-gutters">
          <div class="col-md-3 ftco-animate">
            <a href="images/image_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image:url(images/xcourse-1.jpg.pagespeed.ic.5C1Ta0pYda.jpg)">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
          <div class="col-md-3 ftco-animate">
            <a href="images/image_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image:url(images/ximage_2.jpg.pagespeed.ic.__ePxgvLdY.jpg)">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
          <div class="col-md-3 ftco-animate">
            <a href="images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image:url(images/ximage_3.jpg.pagespeed.ic.eS72JKpT5C.jpg)">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
          <div class="col-md-3 ftco-animate">
            <a href="images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image:url(images/ximage_4.jpg.pagespeed.ic.ztjwaWw5K3.jpg)">
              <div class="icon mb-4 d-flex align-items-center justify-content-center">
                <span class="icon-instagram"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
<?php
get_footer();
?>
