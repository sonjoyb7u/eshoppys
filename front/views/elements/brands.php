<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;

?>


<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto text-center">
                <div class="brandTitle py-1">
                    <h1 class="text-uppercase">Our Brand</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="ourBrand my-5">
        <div class="container-fluid">
            <div class="row">
                <!-- compnay carousel -->
                <div class="col-6 col-md-6 col-lg-4 mx-auto py-5">
                    <div
                        id="brandCarousel"
                        class="carousel slide "
                        data-ride="carousel"
                    >
                        <div class="carousel-inner">
                            <!-- single item -->
                            <div class="carousel-item active">
                                <img
                                    src="<?= Utility::FRONT_ASSETS ?>/img/brand/brand1.jpg"
                                    class="d-block w-100"
                                    alt="Brand company"
                                />
                            </div>
                            <!-- end single item -->
                            <!-- single item -->
                            <div class="carousel-item ">
                                <img
                                    src="<?= Utility::FRONT_ASSETS ?>/img/brand/brand2.jpg"
                                    class="d-block w-100"
                                    alt="Brand company"
                                />
                            </div>
                            <!-- end single item -->
                            <!-- single item -->
                            <div class="carousel-item ">
                                <img
                                    src="<?= Utility::FRONT_ASSETS ?>/img/brand/brand3.jpg"
                                    class="d-block w-100"
                                    alt="Brand company"
                                />
                            </div>
                            <!-- end single item -->
                            <!-- single item -->
                            <div class="carousel-item ">
                                <img
                                    src="<?= Utility::FRONT_ASSETS ?>/img/brand/brand4.jpg"
                                    class="d-block w-100"
                                    alt="Brand company"
                                />
                            </div>
                            <!-- end single item -->
                            <!-- single item -->
                            <div class="carousel-item ">
                                <img
                                    src="<?= Utility::FRONT_ASSETS ?>/img/brand/brand5.jpg"
                                    class="d-block w-100"
                                    alt="Brand company"
                                />
                            </div>
                            <!-- end single item -->
                            <!-- single item -->
                            <div class="carousel-item">
                                <img
                                    src="<?= Utility::FRONT_ASSETS ?>/img/brand/brand6.jpg"
                                    class="d-block w-100"
                                    alt="Brand company"
                                />
                            </div>
                            <!-- end single item -->
                        </div>
                        <a
                            href="#brandCarousel"
                            class="carousel-control-prev brandCarouselPrev"
                            role="button"
                            data-slide="prev"
                        >
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <a
                            href="#brandCarousel"
                            class="carousel-control-next brandCarouselNext"
                            role="button"
                            data-slide="next"
                        >
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
