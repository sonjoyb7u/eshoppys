<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Db\Db;
use Eshoppy\Product\Products;


$id = $_GET['id'];

$products = new Products();

$product = $products->editProduct($id);


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
                            <label for="brand_id">Brand Id</label>
                            <input type="number" name="category_id" class="form-control" id="category_id" value="<?php echo $product['brand_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category Id</label>
                            <input type="number" name="category_id" class="form-control" id="category_id" value="<?php echo $product['category_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="label_id">Label Id</label>
                            <input type="number" name="label_id" class="form-control" id="label_id" value="<?php echo $product['label_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" name="title" class="form-control" id="product_title" value="<?php echo $product['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image File : </label>
                            <img src="upload/images/<?php echo $product['picture']; ?>" alt="" width="100px" height="100px">
                            <?php echo $product['picture']; ?>
                            <br/>
                            <input type="file" name="picture" id="product_image" class="form-control">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3"><?php echo $product['short_description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <div class="box-body pad">
                                <form>
                                    <textarea class="form-control" id="description" name="description" rows="6" cols="70">                                               <?php echo $product['description']; ?>
                                    </textarea>
                                </form>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_sales">Total Sales</label>
                            <input type="text" name="total_sales" class="form-control" id="total_sales" value="<?php echo $product['total_sales']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="product_type">Product Type</label>
                            <input type="text" name="product_type" class="form-control" id="product_type" value="<?php echo $product['product_type']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_new">Product Is New</label>
                            <input type="text" name="is_new" class="form-control" id="is_new" value="<?php echo $product['is_new']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cost">Product Cost</label>
                            <input type="text" name="cost" class="form-control" id="cost" value="<?php echo $product['cost']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mrp">MRP</label>
                            <input type="text" name="mrp" class="form-control" id="mrp" value="<?php echo $product['mrp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="special_price">Product Special Price</label>
                            <input type="text" name="special_price" class="form-control" id="special_price" value="<?php echo $product['special_price']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Product Is Active</label>
                            <input type="number" name="is_active" class="form-control" id="is_active" value="<?php echo $product['is_active']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Product Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" value="<?php echo $product['soft_delete']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Product Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" value="<?php echo $product['is_draft']; ?>">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="btn btn-primary">Update Now</button>
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
