<?php
//include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');

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


$data = $_POST;
$file = $_FILES;

$category = new Categories();

$result = $category->updateCategory($data, $file);


if($result) {

    Message::set('Category is Update successfully done.');
}else {

    Message::set('There is a Problem while editing Page, Please try again!');
}


Utility::redirect('index.php');


