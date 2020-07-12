<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Db\Db;
use Eshoppy\Product\Products;
use Eshoppy\Carts\Carts;


$cart_id = $_GET['cart_id'];

$carts = new Carts();

$cart = $carts->editCart($cart_id);


ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_LAYOUTS . '/dashboard_default.php' );

$dashboard_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $login_layout;
?>

<?php

ob_start(); //Output Buffer Started...

?>



<!-- Main content -->
<section class="content" style="margin-left: 16%;">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit/Update Product:</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="updateProcess.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sId">Session Id</label>
                            <input type="text" name="sId" class="form-control" id="sId" value="<?php echo $cart['sId']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Product Id</label>
                            <select class="form-control select2" style="width: 100%;" name="product_id">
                                <option selected="selected">Select Product Id</option>
                                <?php
                                $products = new Products();
                                $product = $products->readProduct();

                                foreach ($product as $value):

                                    ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['id']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="banner_image">Cart Image</label>
                            <img src="upload/images/<?php echo $cart['picture']; ?>" alt="" width="100px" height="100px">
                            <?php echo $cart['picture']; ?>
                            <br/>
                            <input type="file" name="picture" id="banner_image" class="form-control">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                        </div>
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" name="product_title" class="form-control" id="product_title" value="<?php echo $cart['product_title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" name="qty" class="form-control" id="qty" value="<?php echo $cart['qty']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Unit Price</label>
                            <input type="number" name="unit_price" class="form-control" id="unit_price" value="<?php echo $cart['unit_price']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="total_price">Total Price</label>
                            <input type="number" name="total_price" class="form-control" id="total_price" value="<?php echo $cart['total_price']; ?>">
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="cart_id" value="<?php echo $cart['cart_id']; ?>">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                    <!-- /.box-body -->

                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>









<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_LAYOUTS . '/dashboard_default.php' );
$dashboard_main_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...

echo str_replace('##DASHBOARD-MAIN-CONTENT##', $dashboard_main_content, $dashboard_layout);

?>
