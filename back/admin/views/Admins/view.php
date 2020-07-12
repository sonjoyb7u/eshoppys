<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Utility;
use Eshoppy\Banners\Banners;
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
    <h2 class="">View/Show Single Banner:</h2>
    <div class="row">
        <a href="index.php" class="btn btn-info pull-right">Back</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="list-group">
                <?php

                include_once 'showProcess.php';

                //                               Debugger::dbugDieOne($products);
                $value = $banner;

                ?>
                <p class="list-group-item list-group-item-action"><strong>Id : </strong><?php echo $value["id"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Banner Title: </strong><?php echo $value["title"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Picture : </strong><img src="upload/images/<?php echo $value["picture"]; ?>" alt="" style="width: 100px; height: 100px;"><?php echo $value["picture"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Banner Link : </strong><?php echo $value["link"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Promotional Message : </strong><?php echo $value["promotional_message"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Html Banner : </strong><?php echo $value["html_banner"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Is Active : </strong><?php echo $value["is_active"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Soft Delete : </strong><?php echo $value["soft_delete"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Is Draft : </strong><?php echo $value["is_draft"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Max Display : </strong><?php echo $value["max_display"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Created At: </strong><?php echo $value["created_at"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Modified By : </strong><?php echo $value["modified_at"]; ?></p>

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
