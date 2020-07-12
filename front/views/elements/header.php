<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;

?>


<header>
    <!-- Navbar-Top Section Begin -->
    <?php include_once (Utility::getFrontElement('header-top.php')); ?>
    <!-- Navbar-Top Section Finished -->

    <!-- Header-Bottom Section Begin -->
    <?php include_once (Utility::getFrontElement('header-bottom.php')); ?>
    <!-- Header-Bottom Section Finished -->
</header>