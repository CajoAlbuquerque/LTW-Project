<?php
    include_once('../database/db_images.php');

    $houseID = $_GET['houseID'];

    $images = getImagesOfHouse($houseID);

    if(count($images) == 0){ ?>
        <img class="house_image" src="../images/house_default.jpg" alt="House Default Placeholder">
    <?php }
    else {
        foreach($images as $image) { ?>
            <img class="house_image" src="../images/<?=$image['hash']?>" alt="House starred imaged">
        <?php }
    }


?>