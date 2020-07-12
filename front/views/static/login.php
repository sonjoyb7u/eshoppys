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
<section class="banner">
    <div class="bannerLoginSignupPage d-flex align-items-center justify-content-center pl-3 pl-lg-5 text-center">
        <div>
            <h1 class="text-capitalize textTitle textSlanted display-3">
                Ecommerce-Shoppy
            </h1>
            <h1 class="text-capitalize font-weight-bold display-4 text-light">
                Login/Signup Form
            </h1>
        </div>
    </div>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadCrumb">
                <li class="breadcrumb-item breadCrumbLink"><a href="#">Home</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">Login/Sign-up Page</li>
            </ol>
        </nav>
    </div>
</section>
<!--================login Section Begin =================-->
<section class="loginArea my-5">
    <div class="container">
        <div class="loginInner">
            <div class="row">
                <div class="col-8 col-md-3 col-lg-4">
                    <div class="loginTitle">
                        <h2 class="text-center">log-in your account</h2>
                        <p>Log in to your account to discovery all great features in this template.</p>
                    </div>
                    <form class="loginForm row text-muted" action="" method="post">
                        <div class="col-lg-10 form-group">
                            <label for="userName" class="font-weight-bold">User Name :</label>
                            <input class="form-control" type="text" placeholder="Enter User Name" id="userName" name="username">
                        </div>
                        <div class="col-lg-10 form-group">
                            <label for="userName" class="font-weight-bold">Password :</label>
                            <input class="form-control" type="text" placeholder="Enter Your Password" name="password">
                        </div>
                        <div class="col-lg-10 form-group">
                            <div class="createAccount">
                                <input type="checkbox" id="fOption" name="selector">
                                <label for="fOption">Keep me logged in</label>
                                <div class="check"></div>
                            </div>
                            <a href="#">
                                <h4>Forgot your password ?</h4>
                            </a>
                        </div>
                        <div class="col-lg-10 form-group">
                            <a href="myAccount.html">
                                <button type="submit" value="submit" class="btn updateBtn form-control">Login</button>
                            </a>
                        </div>
                    </form>
                </div>

                <!--================Sign-Up Section Begin =================-->
                <div class="col-8 col-md-9 col-lg-8">
                    <div class="signUpTitle">
                        <h2 class="text-center">create account</h2>
                        <p>Follow the steps below to create email account enjoy the great mail.com emailing experience. Vivamus tempus risus vel felis condimentum, non vehicula est iaculis.</p>
                    </div>
                    <form class="loginForm row">
                        <div class="col-lg-6 form-group">
                            <label for="firstName" class="font-weight-bold">First Name :</label>
                            <input class="form-control" type="text" name="firstName" placeholder="Enter First Name" id=
                            "firstName">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="middleName" class="font-weight-bold">Middle Name :</label>
                            <input class="form-control" type="text" name="middleName" placeholder="Enter Middle Name" id="middleName">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="lastName" class="font-weight-bold">Last Name :</label>
                            <input class="form-control" type="text" name="lastName" placeholder="Enter Middle Name" id="lastName">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="email" class="font-weight-bold">Email Address :</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Email Address" id="email">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="userName" class="font-weight-bold">User Name :</label>
                            <input class="form-control" type="text" name="userName" placeholder="Enter User Name" id="userName">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="phoneNumber" class="font-weight-bold">Phone Number :</label>
                            <input class="form-control" type="text" name="phone" placeholder="Enter Your Phone No." id="phoneNumber">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="password" class="font-weight-bold">Create Password :</label>
                            <input class="form-control" type="password" name="password" placeholder="Enter New Password" id="password">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="password" class="font-weight-bold">Again Confirm Password :</label>
                            <input class="form-control" type="password" name="password" placeholder="Confirm Your Password" id="password">
                        </div>
                        <div class="col-lg-6 form-group mx-auto">
                            <a href="#">
                                <button type="submit" value="submit" class="btn submitBtn form-control">Register Now</button>
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>





<?php

include_once( $_SERVER['DOCUMENT_ROOT'] . Utility::FRONT_LAYOUTS . 'front_default.php' );

$front_page_content = ob_get_contents();

ob_end_clean(); //Output Buffer All Clean...

$breadcrumbLink = "Login/Sign-up page";

echo str_replace('##Page Content##', $front_page_content, $front_default_layout);

?>
