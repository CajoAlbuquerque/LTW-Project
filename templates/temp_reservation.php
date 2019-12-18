<?php

include_once('../database/db_house.php');

function draw_reservation_card($reservation, $editable) { 
    
    $house = getHouse($reservation['house']);
    $d = strtotime("+2 days");
    $cancelLimit = date("Y-m-d", $d);
    
    ?>
        <article class="card reservation_card">
            <!-- this is a mock picture -->
            <img src="https://picsum.photos/400/200">
            <section>
                <a href="../pages/house.php?houseID=<?=$reservation['house']?>">
                    <?=$house['title']?>
                </a>
                <section class="info reservation_info">
                    <ul>
                        <li>Check-in: <?=$reservation['startDate']?></li>
                        <li>Check-out: <?=$reservation['endDate']?></li>
                        <li>Price: <?=$reservation['totalPrice']?>€</li>
                    </ul>
                </section>
                <?php if($editable) { ?>
                <section class="reservation_button">
                    <?php if($reservation['startDate'] > $cancelLimit) {?>
                        <a class="reservation_cancel" href="../actions/cancel_reservation_action.php?reservationID=<?=$reservation['reservationID']?>"> Cancel </a>
                    <?php } 
                    elseif($reservation['endDate'] < date("Y-m-d")){ ?>
                        <form class="reservation_add_comment" action="../pages/house.php?houseID=<?=$reservation['house']?>" method="POST">
                            <input type="hidden" name="commenting" value="yes">
                            <input type="submit" value="Comment house">
                        </form>
                    <?php } ?>
                </section>
            <?php } ?>
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
            <label>Total Price: <output>0</output>€</label>
            <input type="submit" value="Reserve">
        </form>
    </article>
<?php } ?>