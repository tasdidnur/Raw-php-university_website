<?php
//print_r($_SERVER);
//echo ($_SERVER['PHP_SELF']);
$link=explode('/',$_SERVER['PHP_SELF']);
// print_r($link);
$page=$link[3];
?>
<section class="hero-wrap hero-wrap-2" style="background-image:url(images/xbg_1.jpg.pagespeed.ic.4zslKVf4er.jpg)">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">
        <?php
           if($page=='about.php'){echo "About Us";}
           elseif($page=='courses.php'){echo "Courses";}
           elseif($page=='teacher.php'){echo "Certified Teacher";}
           elseif($page=='blog.php'){echo "Blogs";}
           elseif($page=='contact.php'){echo "Contact Us";}
           else {echo "Page name";}
         ?>
        </h1>
        <p class="breadcrumbs">
          <span class="mr-2">
            <a href="index.html">Home <i class="ion-ios-arrow-forward"></i>
            </a>
          </span>
          <span>
            <?php
             if($page=='about.php'){echo "ABOUT US";}
             elseif($page=='courses.php'){echo "COURSES";}
             elseif($page=='teacher.php'){echo "TEACHERS";}
             elseif($page=='blog.php'){echo "BLOGS";}
             elseif($page=='contact.php'){echo "CONTACT";}
             else {echo "Page name";}
           ?>
          </span>
        </p>
      </div>
    </div>
  </div>
</section>
