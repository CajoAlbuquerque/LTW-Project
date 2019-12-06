<?php
    include_once('../database/db_house.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_houses.php');

    $houses = getAllHouses();

    draw_header();
    foreach($houses as $house) {
        draw_house_card($house);
    }
    draw_footer();
?>
    <!-- <section id="houses">
        <ul>
            <li>
                <article>
                    <h3> <a href="house.php?houseID=1">Sample House</a> </h3>
                    <img src="sampleHouse.png" alt="the damn house" />
                    <p> Some house info? </p>
                </article>
            </li>
        </ul>
    </section> -->