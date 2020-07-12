<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;

?>


<!DOCTYPE html>
<html lang="en">
<?php include_once (Utility::getFrontElement('head.php')); ?>
<body>

<!-- Header Section Begin -->
<?php include_once (Utility::getFrontElement('header.php')); ?>
<!-- Header-Top Finished -->

<!-- Slider-section Begin -->

<!-- Slider-section Finished -->

<!-- Service Section Begin -->

<!-- Service Section Finished -->

<!-- Product Banner Section Begin -->

<!-- Product Banner Section Finished -->

<!-- Product Category Section Begin -->

<!-- Product Category Section Finished -->

<!-- Latest Product Section Begin -->
<section class="">


    <!-- Latest Product Begin -->
        ##Page Content##
    <!-- Latest Product Finished -->


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
