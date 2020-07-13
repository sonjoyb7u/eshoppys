<?php

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Utility\Validator;
use Eshoppy\Pages\Pages;



$data = $_POST;


$pages = new Pages();



//$data['brand'] = Validator::validate($data['brand']);
//$data['label'] = Validator::validate($data['label']);
//$data['title'] = Validator::validate($data['title']);
//$data['picture'] = Validator::validate($data['picture']);


$result = $pages->storePage($data);
//
Utility::redirect('index.php');


//var_dump($_POST);
