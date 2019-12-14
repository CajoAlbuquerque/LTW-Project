<?php

include_once('../database/db_house.php');

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
        <section class="reservation_cancel">
            <a href="../actions/cancel_reservation_action.php?reservationID=<?=$reservation['reservationID']?>"> Cancel </a>
        </section>
    </article>
<?php } 

function draw_reservation_form($house, $user) { ?>
    <article class="reservation_form">
        <form action="../actions/make_reservation_action.php" method="post">
            <input type="hidden" name="userID" value="<?=$user['userID']?>">
            <input type="hidden" name="houseID" value="<?=$house['houseID']?>">
            <input type="hidden" name="priceDay" value="<?=$house['priceDay']?>">
            <label>Check-In <input type="text" name="check_in" placeholder="yyyy-mm-dd"></label>
            <label>Check-Out <input type="text" name="check_out" placeholder="yyyy-mm-dd"></label>
            <label>Total Price <output>0</output></label>
            <input type="submit" value="Reserve">
        </form>
    </article>
<?php } ?>