<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/BitmCtg/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Carts\Carts;

$carts = new Carts();
$cart = $carts->readCart();


ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_default_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $front_default;

?>


<?php

ob_start(); //Output Buffer Started...

?>


<section class="shoppingCart p_100"> <!-- Cart Content Begin -->
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-6 col-lg-8">
                <div class="cartProductList">
                    <h3 class="cartSingleTitle">Total Product</h3>
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
//                            include_once 'readProcess.php';
                            $sl = 1;
                            foreach ($cart as $value):

                            ?>
                            <tr>
                                <th scope="row">
                                    <a href="#">
                                        <i class="fa fa-times text-muted" aria-hidden="true"></i>
                                    </a>
                                </th>
                                <td><?= $sl; ?></td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex mr-5" style="width: 70px; height: 70px;">
                                            <img src="<?= Utility::FRONT_IMAGEVIEWONE .'Carts/upload/images/' . $value['picture']; ?>" alt="Headphone-Cart-1">
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="media-body">
                                        <h4><?= $value['product_title'] ?></h4>
                                    </div>
                                </td>
                                <td><p><?= $value['unit_price'] ?></p></td>
                                <td><input type="text" placeholder="01" value="<?= $value['qty'] ?>"></td>
                                <td><p><?= $value['total_price'] ?></p></td>
                            </tr>
                            <?php
                                $sl++;
                                endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cardProductListBtn">
                        <div class="col-md-4 float-left clearCartBtn">
                            <button type="submit" value="submit" class="btn form-control clearCart">Clear Cart</button>
                        </div>
                        <div class="col-md-4 float-right totalCartBtn">
                            <button type="submit" value="submit" class="btn form-control totalCart">Total Update</button>
                        </div>
                    </div>

                    <div class="cartTotals">
                        <h3 class="cartSingleTitle">Total Cart Amount</h3>
                        <div class="cartTotalInner">
                            <ul>
                                <li><a href="#"><span>Cart Subtotal</span> $600.00</a></li>
                                <li><a href="#"><span>Shipping</span> Free</a></li>
                                <li><a href="#"><span>Totals</span> $600.00</a></li>
                            </ul>
                        </div>
                        <a href="#">
                            <button type="submit" class="btn btn-primary form-control updateBtn">Update Cart</button>
                        </a>
                        <a href="checkOutPage.html">
                            <button type="submit" class="btn btn-primary form-control checkoutBtn">Proceed To checkout</button>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-10 col-md-6 col-lg-4">
                <div class="totalAmount">
                    <div class="cuponBox">
                        <h3 class="cartSingleTitle">Cupon Code</h3>
                        <div class="cuponBoxInner">
                            <input type="text" placeholder="Enter your code here">
                            <button type="submit" class="btn btn-primary submitBtn">Apply Cupon</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>









<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_page_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...

$pagetitle = "Add-to-Carts";
$breadcrumbLink = "Carts Page";

echo str_replace(['##Page Title##', '##Breadcrumb Link##', '##Page Content##'], [$pagetitle, $breadcrumbLink, $front_page_content], $front_default_layout);

?>
