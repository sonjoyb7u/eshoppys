<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Validator;
use Eshoppy\Utility\Message;
use Eshoppy\Categories\Categories;


$category_id = $_GET['category_id'];

$categories = new Categories();

$category = $categories->deleteCategory($category_id);

if($category) {

    Message::set('Category is delete successfully done.');
}else {

    Message::set('There is a Problem while deleting Category, Please try again!');
}


Utility::redirect('index.php');
