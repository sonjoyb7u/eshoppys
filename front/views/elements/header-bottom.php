<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Product\Products;

$products = new Products();


?>



<section id="sectionNavbarBottom">
    <nav id="navbarBottom" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="navbarHeader">
                <a class="navbar-brand navbarLogo" href="<?= Utility::FRONT_WEBURL ?>"><img src="<?= Utility::FRONT_ASSETS ?>img/logo/logo-3.png" alt="Logo3" class="">
                    <!-- <img src="./img/logo/logo-1.png" alt="Logo" class=""> -->
                </a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBtnMenu">
                  <span class="sr-only mr-right">Toggle Search</span>
                  <i class="fas fa-search"></i>
                </button> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBtnMenu">
                    <span class="navbar-toggler-icon ml-5 navbarToggleIcon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarBtnMenu">
                <ul class="navbar-nav navbarActive mx-auto font-weight-bold">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"><i class="fas fa-th mr-2"></i>Product Categories

                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php">Laptop/Notebook</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= Utility::FRONT_ASSETS ?>static/product_category.php">Tablet</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= Utility::FRONT_ASSETS ?>static/product_category.php">Mobile-phone</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= Utility::FRONT_ASSETS ?>static/product_category.php">Sound-box</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= Utility::FRONT_ASSETS ?>static/product_category.php">Ipod-player</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= Utility::FRONT_ASSETS ?>static/product_category.php">Head-phone</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Utility::FRONT_WEBVIEW ?>static/single_product.php?id=<?= $value['id']; ?>">Single Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= Utility::FRONT_WEBVIEW ?>static/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Utility::FRONT_WEBVIEW ?>static/portfolio.php">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Utility::FRONT_WEBVIEW ?>static/blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Utility::FRONT_WEBVIEW ?>static/contact.php">Contact Us</a>
                    </li>
                </ul>
                <form action="#" method="post">
                    <div class="input-group searchBox">
                        <input class="form-control inputSearchBox" type="text" name="" placeholder="Search Here">
                        <div class="input-group-append">
                            <button class="btn btnSearchIcon" type="submit"><i class="fas fa-search searchIcon"></i></button>
                        </div>
                    </div>
                </form>
            </div>
    </nav>
</section>