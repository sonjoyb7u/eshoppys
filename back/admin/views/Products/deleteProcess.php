<?php


ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Validator;
use Eshoppy\Utility\Message;
use Eshoppy\Product\Products;



$id = $_GET['id'];

$products = new Products();

$product = $product->deleteProduct($id);

if($product) {

    Message::set('Product is delete successfully done.');
}else {

    Message::set('There is a Problem while deleting Product, Please try again!');
}


Utility::redirect('index.php');