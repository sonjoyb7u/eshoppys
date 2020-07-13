<?php
//include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Validator;
use Eshoppy\Categories\Categories;
use Eshoppy\Utility\Message;



//$data = $_POST;
//$file = $_FILES;
//
//Debugger::dbugdieTwo($data, $file);




$category = new Categories();

$data = $_POST;
$file = $_FILES;


//$data['brand'] = Validator::validate($data['brand']);
//$data['label'] = Validator::validate($data['label']);
//$data['title'] = Validator::validate($data['title']);
//$data['picture'] = Validator::validate($data['picture']);


$result = $category->storeCategory($data, $file);

if($result) {

    Message::set('Category store is successfully done.');
}
else {

    Message::set('There is a Problem while adding Category, Please try again!');
}


Utility::redirect('create.php');