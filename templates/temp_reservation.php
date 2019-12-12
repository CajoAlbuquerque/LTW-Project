<?php

include_once('../database/bd_house.php');

function draw_reservation_card($reservation) { 
    
    $house = getHouse($reservation['house']);
    
    ?>
    <article class="reservation_card">
        <a href="../pages/house.php?houseID=<?=$reservation['house']?>">
            <h2><?=$house['title']?></h2>
        </a>
        <section class="reservation_info">
            <ul>
                <li> Check-in: <?=$reservation['startDate']?></li>
                <li> Check-out: <?=$reservation['endDate']?></li>
                <li> Price: <?=$reservation['totalPrice']?></li>
            </ul>
        </section>
    </article>
<?php } ?>