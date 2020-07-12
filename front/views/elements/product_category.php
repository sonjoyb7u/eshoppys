<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Categories\Categories;

$categories = new Categories();


?>


<section class="productCategories py-4">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto col-md-6 col-lg-3 align-self-center">
                <h5 class="text-uppercase font-weight-bold">Product Categories</h5>
                <p class="text-capitalize ml-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryView font-weight-bold text-capitalize ml-2"><i class="fas fa-th mr-1"></i><span class="productCategoryText">View All Product Category</span></a>
                <div class="CategoryUnderline ml-2"></div>
            </div>
            <div class="col-10 mx-auto col-md-6 col-lg-9 my-3">
                <div id="productCategoriesRight" class="owl-carousel owl-theme">
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-1.jpg" alt="Notebook Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="#" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Notebook</h6>
                                <p class="mb-0">20 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-2.jpg" alt="Tablet Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="#" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Tablet</h6>
                                <p class="mb-0">15 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-3.jpg" alt="Mobile Phone Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Mobile Phone</h6>
                                <p class="mb-0">25 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-5.jpg" alt="Headphone Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Headphone</h6>
                                <p class="mb-0">20 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-6.jpg" alt="GameController Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Game Controler</h6>
                                <p class="mb-0">20 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-7.jpg" alt="Tablet Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Ipod Player</h6>
                                <p class="mb-0">15 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-9.jpg" alt="Mobile Phone Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Sound Box</h6>
                                <p class="mb-0">25 items</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <div class="item productCategoryRight">
                            <img src="<?= Utility::FRONT_ASSETS ?>img/category/category-4.jpg" alt="Mobile Phone Category Image-1" class="img-fluid productCategoriesImage">
                            <a href="<?= Utility::FRONT_WEBVIEW ?>static/product_category.php" class="productCategoryHeading">
                                <h6 class="text-capitalize mb-0">Laptop Bag</h6>
                                <p class="mb-0">25 items</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>