<?php
require_once('functions/manage.php');
get_header();

if(!empty($_POST)){
 $msname=htmlentities($_POST['name'],ENT_QUOTES);
 $msemail=htmlentities($_POST['email'],ENT_QUOTES);
 $mssubject=htmlentities($_POST['subject'],ENT_QUOTES);
 $msmessage=htmlentities($_POST['message'],ENT_QUOTES);

 //$send_message='Name: '.$msname.'\n'.'Email: '.$msemail.'\n'.'Subject: '.$mssubject.'\n'.'Message'.$msmessage;
 $insert="INSERT INTO cs_messsge(con_name,con_email,con_sub,con_msg)VALUES('$msname','$msemail','$mssubject','$msmessage')";

   if(mysqli_query($con,$insert)){
     //mail('demo@gmail.com','senders subject',$send_message);
     header('Location:index.php');
    }else {
     echo "sorry didn,t";
   }

}
get_part('bread.php');
?>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <h3 class="mb-4">Address</h3>
              <p>198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <h3 class="mb-4">Contact Number</h3>
              <p>
                <a href="tel://1234567920">+ 1235 2355 98</a>
              </p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <h3 class="mb-4">Email Address</h3>
              <p>
                <a href="https://preview.colorlib.com/cdn-cgi/l/email-protection#0a63646c654a73657f7879637e6f24696567">
                  <span class="__cf_email__" data-cfemail="365f585059764f594344455f42531855595b">[email&#160;protected]</span>
                </a>
              </p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <h3 class="mb-4">Website</h3>
              <p>
                <a href="#">yoursite.com</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
      <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
          <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
            <form method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="7" class="form-control" placeholder="Message" name="message"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary py-3 px-5">SUBMIT</button>
              </div>
            </form>
          </div>
          <div class="col-md-6 d-flex align-items-stretch">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </section>
<?php
get_footer();
?>
