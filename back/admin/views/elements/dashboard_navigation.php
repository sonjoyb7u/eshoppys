<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;
use Eshoppy\Session\Session;
?>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Utility::ADMIN_THEMES;?>dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= strtoupper(Session::get('username')); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN CONTENT PANEL</li>
<!--            <li class="active treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li class="active"><a href="../Pages/dashboard.php"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-files-o"></i>-->
<!--                    <span>Layout Options</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <span class="label label-primary pull-right">4</span>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/widgets.html">-->
<!--                    <i class="fa fa-th"></i> <span>Widgets</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <small class="label pull-right bg-green">new</small>-->
<!--            </span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-slideshare"></i>
                    <span>BANNERS</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Banners/index.php"><i class="fa fa-circle-o"></i>
                            Banners-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Banners/create.php"><i class="fa fa-circle-o"></i> Add Banner</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bandcamp"></i>
                    <span>BRANDS</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Brands/index.php"><i class="fa fa-circle-o"></i>
                            Brand-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Brands/create.php"><i class="fa fa-circle-o"></i> Add Brand</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bandcamp"></i>
                    <span>LABELS</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Labels/index.php"><i class="fa fa-circle-o"></i>
                            Label-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Labels/create.php"><i class="fa fa-circle-o"></i> Add Label</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>PRODUCTS</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Products/index.php"><i class="fa fa-circle-o"></i>
                            Product-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Products/create.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>CARTS</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Carts/index.php"><i class="fa fa-circle-o"></i>
                            Cart-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Carts/create.php"><i class="fa fa-circle-o"></i> Add Cart</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>PAGES</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Pages/index.php"><i class="fa fa-circle-o"></i>
                            Page-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Pages/create.php"><i class="fa fa-circle-o"></i> Add Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-align-justify"></i>
                    <span>CATEGORIES</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Categories/index.php"><i class="fa fa-circle-o"></i>
                            Category-List</a></li>
                    <li><a href="<?php echo Utility::ADMIN_WEBVIEW;?>Categories/create.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-pie-chart"></i>-->
<!--                    <span>Charts</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-laptop"></i>-->
<!--                    <span>UI Elements</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-edit"></i> <span>Forms</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-table"></i> <span>Tables</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/calendar.html">-->
<!--                    <i class="fa fa-calendar"></i> <span>Calendar</span>-->
<!--                    <span class="pull-righpublic/html/ t-container">-->
<!--              <small class="label pull-right bg-red">3</small>-->
<!--              <small class="label pull-right bg-blue">17</small>-->
<!--            </span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/mailbox/mailbox.html">-->
<!--                    <i class="fa fa-envelope"></i> <span>Mailbox</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <small class="label pull-right bg-yellow">12</small>-->
<!--              <small class="label pull-right bg-green">16</small>-->
<!--              <small class="label pull-right bg-red">5</small>-->
<!--            </span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-folder"></i> <span>Examples</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>-->
<!--                    <li><a href="--><?php //echo Utility::ADMIN_THEMES;?><!--pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-share"></i> <span>Multilevel</span>-->
<!--                    <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
<!--                    <li class="treeview">-->
<!--                        <a href="#"><i class="fa fa-circle-o"></i> Level One-->
<!--                            <span class="pull-right-container">-->
<!--                  <i class="fa fa-angle-left pull-right"></i>-->
<!--                </span>-->
<!--                        </a>-->
<!--                        <ul class="treeview-menu">-->
<!--                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>-->
<!--                            <li class="treeview">-->
<!--                                <a href="#"><i class="fa fa-circle-o"></i> Level Two-->
<!--                                    <span class="pull-right-container">-->
<!--                      <i class="fa fa-angle-left pull-right"></i>-->
<!--                    </span>-->
<!--                                </a>-->
<!--                                <ul class="treeview-menu">-->
<!--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>-->
                </ul>
            </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>