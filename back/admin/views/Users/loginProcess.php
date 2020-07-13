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
use Eshoppy\Admins\Admins;


$username = $_POST['username'];
$password = md5($_POST['password']);

$admins = new Admins();

$login = $admins->adminLogin($username, $password);


if($login['totalUser'] > 0) {

    session_start();
    $_SESSION['User'] = true;

    Utility::redirect('../Page/dashboard.php');
}
else {

    session_start();
    $_SESSION['User'] = false;

    Utility::redirect('login.php');
}




