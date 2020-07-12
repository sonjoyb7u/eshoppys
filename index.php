<?php

session_start();

$_SESSION['app_path'] = 'eshoppy';

include_once ('vendor/autoload.php');


use Eshoppy\Utility\Utility;
//use Eshoppy\Session\Session;
// use Eshoppy\Utility\Debugger;


//Using Static Class...
// Debugger::dbug($products);
Utility::redirect('front/index.php');



