<?php
    include_once('../database/db_house.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_houses.php');

    draw_white_header();
?>
    <link href="../css/homepageStyle.css" rel="stylesheet" >

<div id="top">
    <div id="box" class="box">
        <div id="outterline" class="box">
            <div id="innerline" class="box">
                <p>Welcome</p>
                <p>hömu!</p>
            </div>
        </div>
    </div>
</div>

<div id="middle">
    <p>Best offers</p>
    <div id="houseSet">
        <?php
            $houses = getAllHouses();

            foreach($houses as $house) {
                draw_house_card($house);
            }
        ?>
    </div>
</div>

<div id="bottom">
    <section id="help">
        <img src="../icons/help_icon.png">
        <section>
            <p>Is this your first time? Do not worry!<span>Our sellers' and services' are 100% legit.</span></p>
            <p>For any doubt or existencial question, contact us:<span>thisisafake@email.com</span></p>
        </section>
    </section>
    <section id="aboutus">
        <img src="../icons/brand_white.png">
    </section>
    <section id="login">
        <img src="../icons/profile_white.png">
        <p>Register or login to start your demand for the vacation of your dreams.</p>
    </section>
</div>

<?php
    draw_footer();
?>