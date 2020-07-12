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


<!-- Contact Begin -->
<div class="contact">
    <div class="container">
        <div class="row">

            <!-- Get in touch -->
            <div class="col-lg-8 contact_col">
                <div class="get_in_touch">
                    <div class="section_title">Get in Touch</div>
                    <div class="section_subtitle">Hello, Wel-come</div>
                    <div class="contact_form_container">
                        <form action="#" id="contact_form" class="contact_form">
                            <div class="row">
                                <div class="col-xl-6">
                                    <!-- Name -->
                                    <label for="contact_name">First Name*</label>
                                    <input type="text" id="contact_name" class="contact_input" required="required">
                                </div>
                                <div class="col-xl-6 last_name_col">
                                    <!-- Last Name -->
                                    <label for="contact_last_name">Last Name*</label>
                                    <input type="text" id="contact_last_name" class="contact_input" required="required">
                                </div>
                            </div>
                            <div>
                                <!-- Subject -->
                                <label for="contact_company">Subject</label>
                                <input type="text" id="contact_company" class="contact_input">
                            </div>
                            <div>
                                <label for="contact_textarea">Message*</label>
                                <textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
                            </div>
                            <button class="btn btn-primary"><span>Send Message</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 offset-xl-1 contact_col">
                <div class="contact_info">
                    <div class="contact_info_section">
                        <div class="contact_info_title">Marketing</div>
                        <ul>
                            <li>Phone: <span>+8801915464958</span></li>
                            <li>Email: <span>sonjoy@nomail.com</span></li>
                        </ul>
                    </div>
                    <div class="contact_info_section">
                        <div class="contact_info_title">Shippiing & Returns</div>
                        <ul>
                            <li>Phone: <span>+8801915464958</span></li>
                            <li>Email: <span>sonjoy@nomail.com</span></li>
                        </ul>
                    </div>
                    <div class="contact_info_section">
                        <div class="contact_info_title">Information</div>
                        <ul>
                            <li>Phone: <span>+8801915464958</span></li>
                            <li>Email: <span>sonjoy@nomail.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row map_row">-->
        <!--<div class="col">-->

        <!--&lt;!&ndash; Google Map &ndash;&gt;-->
        <!--<div class="map">-->
        <!--<div id="google_map" class="google_map">-->
        <!--<div class="map_container">-->
        <!--<div id="map"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

        <!--</div>-->
        <!--</div>-->
    </div>
</div>
<!-- Contact Finished -->


<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_page_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...

$pagetitle = "Contact Us";
$breadcrumbLink = "Contact Page";

echo str_replace(['##Page Title##', '##Breadcrumb Link##', '##Page Content##'], [$pagetitle, $breadcrumbLink, $front_page_content], $front_default_layout);

?>