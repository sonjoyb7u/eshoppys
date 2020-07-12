<?php

//include_once '../../vendor/autoload.php';


session_start();
include_once ($_SERVER['DOCUMENT_ROOT'] . '/eshoppy/vendor/autoload.php');
//include_once ($_SERVER['DOCUMENT_ROOT'].'/'.$_SESSION['app_path']."/vendor/autoload.php");



use Eshoppy\Utility\Utility;


Utility::redirect('views/Users/login.php');