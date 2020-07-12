<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_eshoppy";

$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM tbl_banners WHERE is_active = 1";

$statement = $conn->prepare($sql);
$statement->execute();

$banners = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($banners);

?>

<section id="sliderSection">
    <div class="">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <?php
                $active = 'active';
                    foreach($banners as $banner):
                ?>

                <div class="carousel-item mySlidersItem-1 mySlidersItem-2 <?php echo $active ?>">
                    <div class="carousel-caption text-left captionOffer">
                        <h1 class="display-4 mb-3 text-capitilize text-light">
                            <?php echo $banner['title']; ?>
                        </h1>
                        <p class="text-capitilize mb-5 text-light"><?php echo $banner['promotional_message']; ?></p>
                        <a href="<?php echo $banner['link']; ?>" class="btn btn-lg text-uppercase mySlidersBtn">
                            Check It
                        </a>
                    </div>
                </div>

                <?php
                    $active = '';
                    endforeach;
                ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>