<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Product\Products;
use Eshoppy\Utility\Validator;


$id = $_GET['id'];

$product = new Products();

$products = $product->showProduct($id);


//if($products) {
//    echo "Products is updated successfully.";
//}
//else {
//    echo "There is a problem while updating product. Please try again later.!";
//}

//Utility::redirect('view.php');

//Debugger::dbugDieOne($products);