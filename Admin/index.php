<?php
 require_once('functions/function.php');
 needLogged();
 get_header();
 get_sidebar();
?>
                        <div class="col-md-12 main_content">
                            Welcome <?php echo $_SESSION['name']; ?>
                        </div>
<?php
  get_footer();
?>
