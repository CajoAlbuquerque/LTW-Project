<?php
    include_once('../session.php');
    include_once('../database/db_house.php');
    include_once('../database/db_images.php');
    include_once('../database/db_comments.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_house.php');

    $photo = '';
    if(isset($_SESSION['username'])) {
        $photo = getUserImage($_SESSION['username']);
    }

    draw_white_header($photo);
    draw_style('homepageStyle');
    draw_style('templateHouseCardStyle');
    draw_style('inputStyle');
    draw_script('card');
?>

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
                    $i = 0;
                    foreach($houses as $house) {
                        if($i == 3){
                        break;
                        }
                        
                        $i = $i + 1;
                        $rating_info = getRatingOfHouse($house['houseID']);
                        $house_photo = getHouseThumbnail($house['houseID']);
                        draw_house_card($house, $rating_info, $house_photo);
                    }
                ?>
            </div>
        </div>

        <footer>
            <section id="help">
                <img src="../icons/help_icon.png" alt="Encircled question mark icon">
                <section>
                    <p>Is this your first time? Do not worry!<span>Our sellers' and services' are 100% legit.</span></p>
                    <p>For any doubt or existencial question, contact us:<span>thisisafake@email.com</span></p>
                </section>
            </section>
            <section id="aboutus">
                <a href="aboutus.php"><img src="../icons/brand_white.png" alt="Hömu logo"></a>
            </section>
            <section id="login">
                <a href="login.php"><img src="../icons/profile_white.png" alt="Profile icon"></a>
                <p><a href="register.php">Register</a> or <a href="login.php">login</a> to start your demand for the vacation of your dreams.</p>
            </section>
        </footer>
    </body>
</html>