<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/BitmCtg/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;


ob_start(); //Output Buffer Started...

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_default_layout = ob_get_contents(); // All Buffer String Values/Content store in this Variable...

ob_end_clean(); //Output Buffer All Clean...

//echo $front_default;

?>


<?php

ob_start(); //Output Buffer Started...

?>



<h1 style="text-align: center; margin: 50px;">About Us Page Goes Here...</h1>





<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_page_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...


echo str_replace('##Page Content##', $front_page_content, $front_default_layout);

?>