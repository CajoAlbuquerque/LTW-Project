<?php function draw_white_header($photo) { ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://fonts.googleapis.com/css?family=Montserrat|Pacifico&display=swap" rel="stylesheet"> 
            <link href="../css/templateStyle.css" rel="stylesheet" >
            <script src="../js/search_form.js" defer></script>
            <title>hömu - Find your place</title>
        </head>
        <body>
            <nav id="mainHeader">
                <ul>
                    <li id="logo"><a href="homepage.php"><img src="../icons/logo.png" alt="Hömu logo"></a></li>
                    <li id="search"><a href="#"><img src="../icons/search_black.png" alt="Search"></a></li>
                    <li><a href="profile.php"><img src="<?php if($photo === false || $photo === '' || $photo === null){
                                                               echo '../icons/profile_black.png';
                                                           } else {
                                                               echo "../images/$photo";
                                                           }?>" alt="Profile"></a></li>
                </ul>
            </nav>
<?php draw_form();
} ?>

<?php function draw_black_header($photo) { ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://fonts.googleapis.com/css?family=Montserrat|Pacifico&display=swap" rel="stylesheet"> 
            <link href="../css/templateStyle.css" rel="stylesheet" >
            <link href="../css/inputStyle.css" rel="stylesheet" >
            <script src="../js/search_form.js" defer></script>
            <title>hömu - Find your place</title>
        </head>
        <body>
            <nav id="secondaryHeader">
                <ul>
                    <li id="logo"><a href="homepage.php"><img src="../icons/brand_white.png" alt="Hömu"></a></li>
                    <li id="search"><a href="#"><img src="../icons/search_white.png" alt="Search"></a></li>
                    <li><a href="profile.php"><img src="<?php if($photo === false || $photo === '' || $photo === null){
                                                               echo '../icons/profile_white.png';
                                                           } else {
                                                               echo "../images/$photo";
                                                           }?>" alt="Profile"></a></li>
                </ul>
            </nav>
<?php draw_form();
} ?>

<?php function draw_form() { ?>
            <form class="whiteBack" action="../pages/search.php" method="get" id="search-form">
                <label>Where <input type="text" name="location" placeholder="Choose a city"></label>
                <label>Check-In <input type="text" name="check_in" placeholder="yyyy-mm-dd"></label>
                <label>Check-Out <input type="text" name="check_out" placeholder="yyyy-mm-dd"></label>
                <input type="submit" value="Search">
            </form>
<?php } ?>

<?php function draw_style($filename) { ?>
            <link rel="stylesheet" href="../css/<?=$filename?>.css">
<?php } ?>

<?php function draw_script($filename) { ?>
            <script src="../js/<?=$filename?>.js" defer></script>
<?php } ?>

<?php function draw_footer() { ?>
            <footer id="footer">hömu @ LTW 2019</footer>
        </body>
    </html>
<?php } ?>