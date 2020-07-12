<?php


ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Utility;
use Eshoppy\Product\Products;
use Eshoppy\Db\Db;



ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_LAYOUTS . '/dashboard_default.php' );

$dashboard_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $login_layout;
?>

<?php

ob_start(); //Output Buffer Started...

?>




<div class="container">
    <h2 class="">View/Show Single Product:</h2>
    <div class="row">
            <a href="index.php" class="btn btn-info pull-right" style="margin-right: 15px;">Back</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="list-group">
            <?php

                include_once 'showProcess.php';

//                               Debugger::dbugDieOne($products);
                 $value = $cart;

            ?>
                <p class="list-group-item list-group-item-action"><strong>Cart Id : </strong><?php echo $value["cart_id"]; ?></p>
                <p class="list-group-item list-group-item-action"><storng>Session Id : </storng> : <?php echo $value["sId"]; ?></p>
                <p class="list-group-item list-group-item-action"><storng>Product Id : </storng> : <?php echo $value["category_id"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Picture : </strong><img src="upload/images/<?php echo $value["picture"]; ?>" alt="" style="width: 100px; height: 100px;"><?php echo $value["picture"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Product Title : </strong><?php echo $value["product_title"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Quantity : </strong><?php echo $value["qty"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>unit Price: </strong><?php echo $value["unit_price"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Total Price : </strong><?php echo $value["total_price"]; ?></p>

             </div>

        </div>


     </div>

</div>







<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_LAYOUTS . '/dashboard_default.php' );
$dashboard_main_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...

echo str_replace('##DASHBOARD-MAIN-CONTENT##', $dashboard_main_content, $dashboard_layout);

?>