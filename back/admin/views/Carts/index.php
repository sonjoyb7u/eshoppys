<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);



session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
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
                                <th>Session Id</th>
                                <th>Product Id</th>
                                <th>Picture</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                include_once 'readProcess.php';

                                $sl = 1;
                                foreach ($carts as $value):

                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $value['cart_id']; ?></td>
                                <td><?php echo $value['sId']; ?></td>
                                <td><?php echo $value['product_id']; ?></td>
                                <td><img src="upload/images/<?php echo $value['picture']; ?>" width="80px" height="80px" alt="">
                                    <?php echo $value['picture']; ?>
                                </td>
                                <td><?php echo $value['product_title']; ?></td>
                                <td><?php echo $value['qty']; ?></td>
                                <td><?php echo $value['unit_price']; ?></td>
                                <td> $ <?php echo $value['total_price']; ?></td>
                                <td>
                                    <a href="view.php?cart_id=<?php echo $value['cart_id']; ?>"><span class="btn btn-success btn-sm glyphicon glyphicon-eye-open" aria-hidden="true" style=""></span></a>
                                    <a href="edit.php?cart_id=<?php echo $value['cart_id']; ?>"><span class="btn btn-info btn-sm glyphicon glyphicon-edit" aria-hidden="true" style=""></span></a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="deleteProcess.php?cart_id=<?php echo $value['cart_id']; ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
                                <th>Session Id</th>
                                <th>Product Id</th>
                                <th>Picture</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
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