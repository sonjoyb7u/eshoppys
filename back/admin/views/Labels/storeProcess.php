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
use Eshoppy\Labels\Labels;



//$data = $_POST;
//$file = $_FILES;
//
//Debugger::dbugdieTwo($data, $file);




$labels = new Labels();

$data = $_POST;
$file = $_FILES;


//$data['brand'] = Validator::validate($data['brand']);
//$data['label'] = Validator::validate($data['label']);
//$data['title'] = Validator::validate($data['title']);
//$data['picture'] = Validator::validate($data['picture']);


$result = $labels->storeLabel($data, $file);

if($result) {
    Message::set('Label store is successfully done.');
}else {
    Message::set('There is a Problem while adding Label, Please try again!');
}

Utility::redirect('create.php');



