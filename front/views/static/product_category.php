<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;

use Eshoppy\Product\Products;
$products = new Products();

use Eshoppy\Categories\Categories;
$categories = new Categories();

use Eshoppy\Brands\Brands;
$brands = new Brands();


ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_default_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $front_default;

?>


<?php

ob_start(); //Output Buffer Started...

?>

<!-- Banner Section Begin -->
<section class="banner">
    <div class="bannerProductCategory d-flex align-items-center justify-content-center pl-3 pl-lg-5 text-center">
        <div>
            <h1 class="text-capitalize textTitle textSlanted display-3">
                Ecommerce-Shoppy
            </h1>
            <h1 class="text-capitalize font-weight-bold display-4 text-light">
                Product Category
            </h1>
        </div>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadCrumb">
                <li class="breadcrumb-item breadCrumbLink"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">Product Category Page</li>
            </ol>
        </nav>
    </div>
</section>
<!-- Banner Section Finished -->

<!-- product Category Section Begin -->
<section class="productCategory mt-5">
    <div class="container">
        <div class="row">

            <!-- Products Category infomation Left-Side -->
            <div class="col-12 col-md-4 col-lg-3 mx-auto my-3 mx-5 px-5 text-capitalize align-self-center">
                <!-- Products Category Left-Side Bar -->
                <div class="productCategoriesTitle my-4">
                    <h6 class="text-uppercase font-weight-bold">Shop by categories</h6>
                    <div class="productCategoriesUnderline"></div>
                </div>
                <?php
                    $category = $categories->readCategories();
                    foreach ($category as $value):
                ?>
                <!-- single link -->
                <a href="#" class="d-block productCategoriesLink">
                    <p class="mb-0"><?= $value['name']; ?></p>
                </a>
                <!-- end of single link -->
                <?php
                    endforeach;
                ?>
                <!-- end of single link -->
                <div class="productCategoriesTitle my-4">
                    <h6 class="text-uppercase font-weight-bold">Shop by Brands</h6>
                    <div class="productCategoriesUnderline"></div>
                </div>
                <?php
                $brand = $brands->readBrand();
                foreach ($brand as $value):
                ?>
                <!-- single link -->
                <a href="#" class="d-block productCategoriesLink">
                    <p class="mb-0"><?= $value->title; ?></p>
                </a>
                <?php
                    endforeach;
                ?>

                <!-- end of single link -->
                <!-- end of title -->
                <div class="productCategoriesTitle my-4">
                    <h6 class="text-uppercase font-weight-bold">Shop by Price</h6>
                    <div class="productCategoriesUnderline"></div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="priceRange" class="priceRange">range : $0 - $1000</label>
                        <input type="range" name="price-range" class="formControlRange" id="priceRange">
                    </div>
                    <div class="input-group searchBox">
                        <div class="input-group-append">
                            <button class="btn btnProductCategorySearchIcon" type="submit"><i class="fas fa-search searchIcon"></i></button>
                            <input class="form-control productCategorySearchBox" type="text" name="" placeholder="Search Here">
                        </div>
                    </div>
                </form>
                <!-- end of title -->
                <div class="productCategoriesTitle my-4">
                    <h6 class="text-uppercase font-weight-bold">shop by color</h6>
                    <div class="productCategoriesUnderline"></div>
                </div>
                <!-- single color -->
                <a href="#">
                    <p class="text-capitalize mb-0">
                        <span class="d-inline-block productColor productColorBlack mr-2"></span>black (5)
                    </p>
                </a>
                <!-- end of single color -->
                <!-- single color -->
                <a href="#">
                    <p class="text-capitalize mb-0">
                        <span class="d-inline-block productColor productColorRed mr-2"></span>red (5)
                    </p>
                </a>
                <!-- end of single color -->
                <!-- single color -->
                <a href="#">
                    <p class="text-capitalize mb-0">
                        <span class="d-inline-block productColor productColorBlue mr-2"></span>blue (5)
                    </p>
                </a>
                <!-- end of single color -->
                <!-- single color -->
                <a href="#">
                    <p class="text-capitalize mb-0">
                        <span class="d-inline-block productColor productColorYellow mr-2"></span>yellow (5)
                    </p>
                </a>
                <!-- end of single color -->
                <!-- single color -->
                <a href="#">
                    <p class="text-capitalize mb-0">
                        <span class="d-inline-block productColor productColorGreen mr-2"></span>green (5)
                    </p>
                </a>
                <!-- end of single color -->
            </div>

            <!-- Products Category Right-Side Bar -->
            <div class="col-12 col-md-8 col-lg-9 mx-auto my-3 ">
                <div class="row">
                    <?php

                    $product = $products->readProduct();
                    foreach ($product as $value):

                    ?>
                    <!-- Single Products Begin -->
                    <div class="col-10 mx-auto col-md-6 col-lg-4">
                        <div class="singleLatestProduct mt-4">
                            <div class="singleProduct">
                                <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" alt="Laptop-Product-1" class="img-fluid">
                                <a href="#">
                                    <span class="singleProductView" data-toggle="modal" data-target="#singleProductModel"><i class="fas fa-eye mr-2"></i>Quick View</span></a>
                                <a href="#" class="singleProductCart text-capitalize"><i class="fas fa-dolly mr-2"></i>add to cart</a>
                                <hr>
                                <h5 class="singleProductheading ext-capitalize text-center my-3"><?php echo $value['title']; ?></h5>
                                <h6 class="singleProductheading text-center">
                                    <span class="singleProductOldprice mx-2 text-muted">$ <?php echo $value['cost']; ?></span>
                                    <span>$ <?php echo $value['special_price']; ?></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    ?>
                    <!-- Single Products Finished -->

                    <div class="m-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!--  Latest Products Section Modal Begin -->
                <?php include_once (Utility::getFrontElement('latest_Product_modal.php')); ?>
            <!--  Latest Products Section Modal Begin -->
        </div>
    </div>
</section>

<!-- Featured Products Section Begin -->
<?php include_once (Utility::getFrontElement('special_Product.php')); ?>
<!-- Featured Products Section Finished -->





<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_page_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...


echo str_replace('##Page Content##', $front_page_content, $front_default_layout);

?>
