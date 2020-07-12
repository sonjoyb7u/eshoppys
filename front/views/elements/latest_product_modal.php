<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;


?>


<div class="modal fade" id="singleProductModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
                <h5 class="modal-title text-capitalize">product infomation</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--end of  modal header -->
            <!-- modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center">
                        <img src="<?= Utility::FRONT_ASSETS ?>img/products/product-1.jpg" class="img-fluid" alt="" />
                        <!-- ratings -->
                        <div class="ratings my-4">
                            <span class="ratingIcon"><i class="fas fa-star"></i></span>
                            <span class="ratingIcon"><i class="fas fa-star"></i></span>
                            <span class="ratingIcon"><i class="fas fa-star"></i></span>
                            <span class="ratingIcon"><i class="fas fa-star"></i></span>
                            <span class="ratingIcon"><i class="far fa-star"></i></span>
                            <span class="text-capitalize">(25 customer reviews)</span>
                        </div>
                        <!-- end of ratings -->
                        <h2 class="text-uppercase my-3">Latest Laptop-1</h2>
                        <h2>$10.00 - $200.00</h2>
                        <p class="lead text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi,
                            porro.
                        </p>
                        <!-- colors -->
                        <h5 class="text-uppercase">
                            colors :
                            <span class="d-inline-block productsColor productsColorBlack mr-2"></span>
                            <span class="d-inline-block productsColor productsColorRed mr-2"></span>
                            <span class="d-inline-block productsColor productsColorBlue mr-2"></span>
                        </h5>
                        <!-- end of colors -->
                        <!-- sizes -->
                        <h5 class="text-uppercase">
                            sizes : <span class="mx-3">xs</span> <span class="mx-2">s</span>
                            <span class="mx-2">m</span> <span class="mx-2">l</span>
                            <span class="mx-2">xl</span>
                        </h5>
                        <div class="d-flex flex-wrap m-auto">
                            <!-- cart buttons -->
                            <div class="d-flex my-3">
                                <span class="btn btnBlack my-2 mx-1">-</span>
                                <span class="btn btnBlack my-2 mx-1">4</span>
                                <span class="btn btnBlack my-2 mx-1">+</span>
                            </div>
                            <button class="btn btnBlack my-4 mx-2">wishlist</button>
                            <button class="btn btnYellow my-4 mx-2">add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">close modal</button>
            </div>
        </div>

    </div>
</div>