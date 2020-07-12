<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Carts\Carts;

$carts = new Carts();
$cart = $carts->readCart();

?>



<section id="sectionNavbarTop">
    <div class="container-fluid navbarTop pt-3 px-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-unstyled list-inline sectionTopLeft">
                        <li class="list-inline-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-language navbarIcon mr-2"></i>Language</a>
                            <div class="dropdown-menu text-center">
                                <a href="#" class="dropdown-item"><img src="<?= Utility::FRONT_ASSETS ?>img/flagIcon/ban1.png" alt="" class="mr-2">Bangla</a>
                                <a href="#" class="dropdown-item"><img src="<?= Utility::FRONT_ASSETS ?>img/flagIcon/usa1.png" alt="" class="mr-2">English</a>
                                <a href="#" class="dropdown-item"><img src="<?= Utility::FRONT_ASSETS ?>img/flagIcon/ind1.png" alt="" class="mr-2">Hindi</a>
                                <a href="#" class="dropdown-item"><img src="<?= Utility::FRONT_ASSETS ?>img/flagIcon/fra1.png" alt="" class="mr-2">Francian</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <ul class="list-unstyled list-inline float-right sectionTopRight">
                        <li class="list-inline-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user navbarIcon mr-2"></i>Account</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="far fa-user-circle accountIcon mr-2"></i>My Account</a>
                                <a href="<?= Utility::FRONT_WEBVIEW ?>static/login.php" class="dropdown-item"><i class="fas fa-sign-in-alt accountIcon mr-2"></i>Login/Sign-up</a>
                            </div>
                        </li>
                        <li class="list-inline-item dropdown"><a href="<?= Utility::FRONT_WEBVIEW ?>static/add_to_cart.php" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-shopping-cart navbarIcon mr-2 navbarCartIcon"></i>Cart<span class="badge badge-secondary myCartBadge"><?= count($cart); ?></span></a>
                            <div class="dropdown-menu">
                                <a href="<?= Utility::FRONT_WEBVIEW ?>static/add_to_cart.php" class="dropdown-item">My Cart</a>
                            </div>
                        </li>
                        <li class="list-inline-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-hand-holding-heart navbarIcon mr-2"></i>Wishlist<span class="badge badge-secondary myCartBadge">2</span></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Something Add Here...</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>