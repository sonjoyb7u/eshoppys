<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Format;
use Eshoppy\Product\Products;
use Eshoppy\Carts\Carts;



$id = $_GET['id'];

$products = new Products();
$product = $products->showProduct($id);

$value = $product;



ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_default_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $front_default;

?>


<?php

ob_start(); //Output Buffer Started...

?>



<section class="banner">
    <div class="bannerSingleProduct d-flex align-items-center justify-content-center pl-3 pl-lg-5 text-center">
        <div>
            <h1 class="text-capitalize textTitle textSlanted display-3">
                Ecommerce-Shoppy
            </h1>
            <h1 class="text-capitalize font-weight-bold display-4 text-light">
                Single Product
            </h1>
        </div>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadCrumb">
                <li class="breadcrumb-item breadCrumbLink"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">Single Product Page</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Single Products Section Begin -->
<section class="singleProducts py-4">
    <div class="container">
        <div class="row ml-2">
            <div class="col-12 mx-auto col-lg-4 text-center my-5">
                <div class="singleProductImgContainer">
                    <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" class="img-fluid" alt=""/>
                </div>
                <div class="row singleProductPhotos mt-3">
                    <!-- single photo -->
                    <div class="col-2 col-sm-2 singleProductPhoto p-1">
                        <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" class="img-fluid" alt=""/>
                    </div>
                    <!-- endo of single photo -->
                    <!-- single photo -->
                    <div class="col-2 col-sm-2 singleProductPhoto p-1">
                        <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" class="img-fluid" alt=""/>
                    </div>
                    <!-- endo of single photo -->
                    <!-- single photo -->
                    <div class="col-2 col-sm-2 singleProductPhoto p-1">
                        <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" class="img-fluid" alt=""/>
                    </div>
                    <!-- endo of single photo -->
                    <!-- single photo -->
                    <div class="col-2 col-sm-2 singleProductPhoto p-1">
                        <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" class="img-fluid" alt=""/>
                    </div>
                    <!-- endo of single photo -->
                    <!-- single photo -->
                    <div class="col-2 col-sm-2 singleProductPhoto p-1">
                        <img src="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>" class="img-fluid" alt=""/>
                    </div>
                    <!-- endo of single photo -->
                    <!-- single photo -->
                    <div class="col-2 col-sm-2 singleProductPhoto p-1">
                        <img src="<?= Utility::FRONT_IMAGEVIEW . $product['picture']; ?>" class="img-fluid" alt=""/>
                    </div>
                    <!-- endo of single photo -->
                </div>
            </div>
            <!-- info -->
            <div class="col-12 mx-auto col-lg-8 singleProductInfo my-5 px-lg-5">
                <!-- ratings -->
                <div class="ratings">
                    <span class="ratingIcon"><i class="fas fa-star"></i></span>
                    <span class="ratingIcon"><i class="fas fa-star"></i></span>
                    <span class="ratingIcon"><i class="fas fa-star"></i></span>
                    <span class="ratingIcon"><i class="fas fa-star"></i></span>
                    <span class="ratingIcon"><i class="far fa-star"></i></span>
                    <span class="text-capitalize">(25 customer reviews)</span>
                </div>
                <!-- end of ratings -->
                <h2 class="text-uppercase my-2"><?php echo $value['title']; ?></h2>
                <h2>$ <?= $value['special_price'];?> - $ <?= $value['cost'];?></h2>
                <p class="lead text-muted">
                    <?= Format::textShort($value['short_description'], 80); ?>
                </p>
                <!-- colors -->
<!--                <h5 class="text-uppercase">-->
<!--                    colors :-->
<!--                    <span-->
<!--                        class="d-inline-block productsColor productsColorBlack mr-2"-->
<!--                    ></span>-->
<!--                    <span-->
<!--                        class="d-inline-block productsColor productsColorRed mr-2"-->
<!--                    ></span>-->
<!--                    <span-->
<!--                        class="d-inline-block productsColor productsColorBlue mr-2"-->
<!--                    ></span>-->
<!--                </h5>-->
                <!-- end of colors -->
                <!-- sizes -->
<!--                <h5 class="text-uppercase">-->
<!--                    sizes : <span class="mx-2">xs</span> <span class="mx-2">s</span>-->
<!--                    <span class="mx-2">m</span> <span class="mx-2">l</span>-->
<!--                    <span class="mx-2">xl</span>-->
<!--                </h5>-->
                <div class="d-flex flex-wrap mt-2">
                    <!-- cart buttons -->
                    <div class="addCart">
                        <form action="<?= Utility::ADMIN_WEBVIEW ?>Carts/storeProcess.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="title" value="<?php echo $product['title']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="sId" value="<?php echo $_SESSION['guest']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="picture" value="<?= Utility::FRONT_IMAGEVIEW . $value['picture']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="unit_price" value="<?php echo $product['unit_price']; ?>">
                            </div>

                            <div class="form-group">
                                <input type="number" value="1" name="qty" class="p-2">
                            </div>

                            <button type="submit" class="btn btnBlack my-2 mx-2">wishlist</button>
                            <button type="submit" class="btn btnYellow my-2 mx-2">add to cart</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Single Products Section Finished -->

<!-- product info -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="col mx-auto">
                <div class="productInformation mb-5 p-4">
                    <!-- product info links -->
                    <div
                        class="d-flex justify-content-around flex-wrap my-3 text-center"
                    >
                        <a href="#" class="productInfoLink">
                            <h4 class="text-capitalize">description</h4>
                        </a>
                        <a href="#" class="productInfoLink">
                            <h4 class="text-capitalize">additional information</h4>
                        </a>
                        <a href="#" class="productInfoLink">
                            <h4 class="text-capitalize">reviews (25)</h4>
                        </a>
                    </div>

                    <!-- end of product info links -->
                    <p class="lead text-light">
                        <?= Format::textShort($value['description'], 150); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of product info -->



<!-- Featured Products Section Begin -->
<?php include_once (Utility::getFrontElement('featured_Product.php')); ?>
<!-- Featured Products Section Finished -->









<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_page_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...


echo str_replace('##Page Content##', $front_page_content, $front_default_layout);

?>
















