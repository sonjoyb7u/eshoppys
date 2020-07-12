<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

//use Eshoppy\Session\Session;
//Session::init();

use Eshoppy\Utility\Utility;

use Eshoppy\Utility\Format;
$format = new Format();

use Eshoppy\Db\Db;

use Eshoppy\Product\Products;
$products = new Products();

use Eshoppy\Carts\Carts;


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce-Shoppy</title>

    <link rel="stylesheet" href="<?= Utility::FRONT_ASSETS ?>css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= Utility::FRONT_ASSETS ?>css/style.css">
    <link rel="stylesheet" href="<?= Utility::FRONT_ASSETS ?>font-awesome/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= Utility::FRONT_ASSETS ?>owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= Utility::FRONT_ASSETS ?>owl/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>