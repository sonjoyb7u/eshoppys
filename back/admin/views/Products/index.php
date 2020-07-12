<?php
ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);



session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");


use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Message;
use Eshoppy\Utility\Format;



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
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Product List:</h3>
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

                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Brand Id</th>
                                <th>Category Id</th>
                                <th>Label Id</th>
                                <th>Title</th>
                                <th>Picture</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Total Sales</th>
                                <th>Product Type</th>
                                <th>Is New</th>
                                <th>Cost</th>
                                <th>Mrp</th>
                                <th>Special Price</th>
                                <th>Is Active</th>
                                <th>Soft-Delete</th>
                                <th>Is Draft</th>
                                <th>Created At</th>
                                <th>Modified At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                include_once 'readProcess.php';

                                $sl = 1;
                                foreach ($products as $value):

                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['brand_id']; ?></td>
                                <td><?php echo $value['category_id']; ?></td>
                                <td><?php echo $value['label_id']; ?></td>
                                <td><?php echo $value['title']; ?></td>
                                <td><img src="upload/images/<?php echo $value['picture']; ?>" width="80px" height="80px" alt="">
                                    <?php echo $value['picture']; ?>
                                </td>
                                <td><?php echo Format::textShort($value['short_description'], 15); ?></td>
                                <td><?php echo Format::textShort($value['description'], 15); ?></td>
                                <td><?php echo $value['total_sales']; ?></td>
                                <td><?php echo $value['product_type']; ?></td>
                                <td><?php echo $value['is_new']; ?></td>
                                <td> $ <?php echo $value['cost']; ?></td>
                                <td><?php echo $value['mrp']; ?></td>
                                <td><?php echo $value['special_price']; ?></td>
                                <td>
                                <td>
                                    <?php
                                    if($value['is_active'] > 0) {
                                        ?>
                                        <span class="active">Activate</span>
                                        <a href="deactivate.php?id=<?php echo $value['id']; ?>">Deactivate</a>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="inactive">In Active</span>
                                        <a href="activate.php?id=<?php echo $value['id']; ?>">Activate</a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $value['soft_delete']; ?></td>
                                <td><?php echo $value['is_draft']; ?></td>
                                <td><?php echo $value['created_at']; ?></td>
                                <td><?php echo $value['modified_at']; ?></td>
                                <td>
                                    <a href="view.php?id=<?php echo $value['id']; ?>"><span class="btn btn-success btn-sm glyphicon glyphicon-eye-open" aria-hidden="true" style="margin-bottom: 5px;"></span></a>
                                    <a href="edit.php?id=<?php echo $value['id']; ?>"><span class="btn btn-info btn-sm glyphicon glyphicon-edit" aria-hidden="true" style="margin-bottom: 5px;"></span></a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="deleteProcess.php?id=<?php echo $value['id']; ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                            </tr>
                                <?php
                                    $sl++;
                                    endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Brand Id</th>
                                <th>Category Id</th>
                                <th>Label Id</th>
                                <th>Title</th>
                                <th>Picture</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Total Sales</th>
                                <th>Product Type</th>
                                <th>Is New</th>
                                <th>Cost</th>
                                <th>Mrp</th>
                                <th>Special Price</th>
                                <th>Is Active</th>
                                <th>Soft-Delete</th>
                                <th>Is Draft</th>
                                <th>Created At</th>
                                <th>Modified At</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                    <!-- /.box-body -->
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