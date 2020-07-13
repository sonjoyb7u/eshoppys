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
use Eshoppy\Utility\Message;
use Eshoppy\Banners\Banners;



//$data = $_POST;
//$file = $_FILES;
//
//Debugger::dbugdieTwo($data, $file);




$banners = new Banners();

$data = $_POST;
$file = $_FILES;


//$data['brand'] = Validator::validate($data['brand']);
//$data['label'] = Validator::validate($data['label']);
//$data['title'] = Validator::validate($data['title']);
//$data['picture'] = Validator::validate($data['picture']);


$result = $banners->storeBanner($data, $file);

if($result) {

    Message::set('Brand store is successfully done.');
}
else {

    Message::set('There is a Problem while adding Brand, Please try again!');
}

Utility::redirect('index.php');