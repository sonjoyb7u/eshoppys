<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Utility;
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

//                Debugger::dbugDieOne($products);

                 $value = $page;

            ?>
                <p class="list-group-item list-group-item-action"><strong>Id : </strong><?php echo $value["id"]; ?></p>
                <p class="list-group-item list-group-item-action"><storng>Page Title : </storng> : <?php echo $value["title"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Description : </strong><?php echo $value["description"]; ?></p>
                <p class="list-group-item list-group-item-action"><strong>Page Link : </strong><?php echo $value["link"]; ?></p>

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