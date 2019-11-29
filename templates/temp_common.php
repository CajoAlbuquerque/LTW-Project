<?php function draw_MainHeader() { ?> <!-- TODO: change profile icon according to login status-->
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="../css/templateStyle.css" rel="stylesheet" >
            <title>hömu - Find your place</title>
        </head>
        <body>
            <nav id="mainHeader">
                <ul>
                    <li><a href="pages/homepage.php"><img src="../Icons/logo.png" alt="Hömu logo"></a></li>
                    <li><a href="pages/search.php"><img src="../Icons/search_black.png" alt="Search"></a></li>
                    <li><a href="pages/profile.php"><img src="../Icons/profile_icon_black.png" alt="Profile"></a></li>
                </ul>
            </nav>
<?php } ?>

<?php function draw_SecondaryHeader() { ?> <!-- TODO: change profile icon according to login status-->
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="../css/templateStyle.css" rel="stylesheet" >
            <title>hömu - Find your place</title>
        </head>
        <body>
            <nav id="secondaryHeader">
                <ul>
                    <li><a href="pages/homepage.php"><img src="../Icons/brand_white.png" alt="Hömu"></a></li>
                    <li><a href="pages/search.php"><img src="../Icons/search.png" alt="Search"></a></li>
                    <li><a href="pages/profile.php"><img src="../Icons/profile_icon.png" alt="Profile"></a></li>
                </ul>
            </nav>
<?php } ?>

<?php function draw_footer() { ?>
            <footer class="footer" id="mainFooter">hömu @ LTW 2019</footer>
        </body>
    </html>
<?php } ?>