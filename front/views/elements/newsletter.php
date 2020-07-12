<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/eshoppy/vendor/autoload.php');

use Eshoppy\Utility\Utility;

?>


<section class="newsletter py-5">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto text-center">
                <h2 class="text-uppercase">Newsletter</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti
                    blanditiis similique eum, aut culpa maiores cupiditate alias
                    exercitationem error nesciunt.
                </p>
                <form>
                    <div class="input-group mt-5 mb-4">
                        <input
                                type="text"
                                class="form-control text-capitalize"
                                placeholder="Enter your email"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text form-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btnSubscribe">subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>