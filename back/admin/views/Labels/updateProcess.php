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
use Eshoppy\Labels\Labels;



//$id = $_POST['id'];
$data = $_POST;
$file = $_FILES;

$labels= new Labels();

$label = $labels->updateLabel($data, $file);


if($label) {

    Message::set('Label is Update successfully done.');
}else {

    Message::set('There is a Problem while Editing Label, Please try again!');
}


Utility::redirect('index.php');


