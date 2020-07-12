<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
//use Eshoppy\Session\Session;
//
//Session::init();


//if( array_key_exists('guest', $_SESSION) && !empty($_SESSION['guest']) ) {
//
//}
//else {
//    $_SESSION['guest'] = 'eshoppy_' . rand(11111, 99999). '_'. time();
//}
//
//echo $_SESSION['guest'];
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once (Utility::getFrontElement('head.php')); ?>
<body>

<!-- Header Section Begin -->
<?php include_once (Utility::getFrontElement('header.php')); ?>
<!-- Header-Top Finished -->
<?php
//echo session_id();
//?>
<!-- Slider-section Begin -->
<?php include_once (Utility::getFrontElement('banner.php')); ?>
<!-- Slider-section Finished -->

<!-- Service Section Begin -->
<?php include_once (Utility::getFrontElement('services.php'));?>
<!-- Service Section Finished -->

<!-- Product Category Section Begin -->
<?php include_once (Utility::getFrontElement('product_category.php'));?>
<!-- Product Category Section Finished -->

<!-- Latest Product Section Begin -->
<section class="pt-5">
  <div class="container">

    <?php include_once (Utility::getFrontElement('latest_product.php'));?>

  </div>

  <!--  Latest Product Section Modal Begin -->
    <?php include_once (Utility::getFrontElement('latest_product_modal.php'));?>
  <!--  Latest Product Section modal Finished -->

 </section>
<!-- Latest Product Section Finished -->


<!-- Our Brand Section Begin -->
<?php include_once (Utility::getFrontElement('brands.php')); ?>
<!-- Our Brand Section Finished -->

<!-- Newsletter Section Begin -->
<?php include_once (Utility::getFrontElement('newsletter.php')); ?>
<!-- Newsletter Section Finished -->

<!-- Footer Section Begin -->
<?php include_once (Utility::getFrontElement('footer.php')); ?>
<!-- Footer Section Finished -->




  <!-- JQuery -->
  <script src="<?= Utility::FRONT_ASSETS ?>/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="<?= Utility::FRONT_ASSETS ?>/js/bootstrap.bundle.min.js"></script>
  <script src="<?= Utility::FRONT_ASSETS ?>/js/bootstrap.min.js"></script>
  <!-- Owl-Carousel Plug-in -->
  <script src="<?= Utility::FRONT_ASSETS ?>/owl/owl.carousel.min.js"></script>
  <script src="<?= Utility::FRONT_ASSETS ?>/owl/owl.js"></script>
  <!-- FontAwesome JS -->
  <script src="<?= Utility::FRONT_ASSETS ?>/font-awesome/all.min.js"></script>
  <!-- Custom/Main Js -->
  <script src="<?= Utility::FRONT_ASSETS ?>/js/style.js"></script>

</body>
</html>
