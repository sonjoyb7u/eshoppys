<?php

session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;

?>


<!DOCTYPE html>
<html>
<?php include_once( Utility::getAdminElement('dashboard_head.php') ); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php //include_once ($_SERVER['DOCUMENT_ROOT'] . Utility::ADMIN_ELEMENTS . 'dashboard_header.php');?>
    <?php include_once( Utility::getAdminElement('dashboard_header.php') ); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include_once( Utility::getAdminElement('dashboard_navigation.php') ); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include_once( Utility::getAdminElement('dashboard_bradcrumb.php') ); ?>

        <!-- Main content -->
        <section class="content">
            ##DASHBOARD-MAIN-CONTENT##

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once( Utility::getAdminElement('dashboard_footer.php') ); ?>

    <!-- Control Sidebar -->
    <?php include_once( Utility::getAdminElement('dashboard_control_asider.php') ); ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include_once( Utility::getAdminElement('dashboard_script.php') ); ?>
</body>
</html>
