<?php
//include_once ($_SERVER['DOCUMENT_ROOT'] . '/BitmCtg/eshoppy/vendor/autoload.php');

ini_set("display_errors","On");
error_reporting(E_ALL^E_NOTICE);


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");

use Eshoppy\Utility\Utility;
use Eshoppy\Utility\Debugger;
use Eshoppy\Banners\Banners;
use Eshoppy\Utility\Validator;



$banners = new Banners();

$banners = $banners->readBanner();