<?php


ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Message;
use Eshoppy\Db\Db;
use Eshoppy\Categories\Categories;
use Eshoppy\Brands\Brands;
use Eshoppy\Labels\Labels;



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
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add/Create Product:</h3>
                </div>
                <!-- /.box-header -->
                <?php
                    if(Message::hasMessage()):
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo Message::flush(); ?>
                </div>

                <?php
                    endif;
                ?>

                <!-- form start -->
                <form role="form" method="post" action="storeProcess.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <select class="form-control select2" style="width: 100%;" name="brand_id">
                                <option selected="selected">Select Brand</option>
                                <?php
                                    $brands = new Brands();
                                    $brand = $brands->readBrand();

                                    foreach ($brand as $value):

                                 ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option selected="selected">Select Category</option>
                                <?php
                                    $categories = new Categories();
                                    $category = $categories->readCategories();

                                    foreach ($category as $value):

                                ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Label Name</label>
                            <select class="form-control select2" style="width: 100%;" name="label_id">
                                <option selected="selected">Select Label</option>
                                <?php
                                $labels = new Labels();
                                $label = $labels->readLabel();

                                foreach ($label as $value):

                                    ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" name="title" class="form-control" id="product_title" placeholder="Enter Product Title Name">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" name="picture" id="product_image" class="form-control">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control" name="short_description" id="short_description" rows="3" placeholder="Enter Short Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <div class="box-body pad">
                                <textarea class="form-control" id="description" name="description" rows="6" cols="70"placeholder="Enter Description">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_sales">Total Sales</label>
                            <input type="number" name="total_sales" class="form-control" id="total_sales" placeholder="Enter Total Sales">
                        </div>
                        <div class="form-group">
                            <label for="product_type">Product Type</label>
                            <input type="text" name="product_type" class="form-control" id="product_type" placeholder="Enter Product Type">
                        </div>
                        <div class="form-group">
                            <label for="is_new">Product Is New</label>
                            <input type="text" name="is_new" class="form-control" id="is_new" placeholder="Enter Product is New or Not?">
                        </div>
                        <div class="form-group">
                            <label for="cost">Product Cost</label>
                            <input type="text" name="cost" class="form-control" id="cost" placeholder="Enter Product Cost">
                        </div>
                        <div class="form-group">
                            <label for="mrp">MRP</label>
                            <input type="text" name="mrp" class="form-control" id="mrp" placeholder="Enter Product MRP">
                        </div>
                        <div class="form-group">
                            <label for="special_price">Product Special Price</label>
                            <input type="text" name="special_price" class="form-control" id="special_price" placeholder="Enter Product Special Price">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Product Is Active?</label>
                            <input type="number" name="is_active" class="form-control" id="is_active" placeholder="Enter Product Is Active or Not?">
                        </div>
                        <div class="form-group">
                            <label for="soft_delete">Product Soft Delete</label>
                            <input type="number" name="soft_delete" class="form-control" id="soft_delete" placeholder="Enter Product Soft Delete or Not?">
                        </div>
                        <div class="form-group">
                            <label for="is_draft">Product Is Draft</label>
                            <input type="number" name="is_draft" class="form-control" id="is_draft" placeholder="Enter Product Is Draft or Not?">
                        </div>

                        <div class="box-footer">
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