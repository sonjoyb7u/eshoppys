<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Product\Products;

$products = new Products();

?>

<div class="row">
    <div class="col-8 mx-auto text-center">
        <div class="latestProductTitle my-4 py-1">
            <h1 class="text-uppercase">Our Latest Products</h1>
            <!-- <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Aliquam accusantium lorem consectetur adipisicing elit.</p> -->
        </div>
    </div>
</div>

<div class="row">
    <?php

    $product = $products->readProduct();
    foreach ($product as $value):

    ?>
    <div class="col-10 mx-auto col-md-6 col-lg-3">
        <div class="singleLatestProduct mt-4">
            <div class="singleProduct">
                <img src="<?= Utility::FRONT_IMAGEVIEW . '/' . $value['picture']; ?>" alt="Laptop-Product-1" class="img-fluid">
                <a href="<?= Utility::FRONT_WEBVIEW ?>static/single_product.php?id=<?= $value['id']; ?>">
                    <span class="singleProductView" data-toggle="modal" data-target="#singleProductModel"><i class="fas fa-eye mr-2"></i>Quick View</span></a>
                <a href="<?= Utility::FRONT_WEBVIEW ?>static/add_to_cart.php" class="singleProductCart text-capitalize"><i class="fas fa-dolly mr-2"></i>add to cart</a>
                <hr>
                <h5 class="singleProductheading ext-capitalize text-center my-3"><?php echo $value['title']; ?></h5>
                <h6 class="singleProductheading text-center">
                    <span class="singleProductOldprice mx-2 text-muted">$ <?php echo $value['cost']; ?></span>
                    <span>$<?php echo $value['special_price']; ?></span>
                </h6>
            </div>
        </div>

    </div>
    <?php endforeach; ?>
    <!-- Single Product Finished -->

    <div class="m-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
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




<!--  Latest Product Section Modal Begin -->
    <?php include_once (Utility::getFrontElement('latest_Product_modal.php')); ?>
<!--  Latest Product Section modal Finished -->