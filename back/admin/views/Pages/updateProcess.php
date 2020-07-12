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
use Eshoppy\Pages\Pages;


$data = $_POST;

$pages = new Pages();

$page = $pages->updatePage($data);


if($page) {

    Message::set('Page is Update successfully done.');
}else {

    Message::set('There is a Problem while editing Category, Please try again!');
}


Utility::redirect('index.php');


