<?php function draw_boilerplate($style) { ?> <!-- TODO: change profile icon according to login status-->
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Hömu - Find your place</title>
            <link rel="stylesheet" href="../css/<?=$style?>.css">
<?php } ?>

<?php function draw_style($filename) { ?>
            <link rel="stylesheet" href="../css/<?=$filename?>.css">
<?php } ?>

<?php function draw_header() { ?>
        </head>
        <body>
            <header>
                <ul>
                    <li><a href="../pages/homepage.php"><img src="../icons/homu_white.png" alt="Hömu logo"></a></li>
                    <li><a href="../pages/search.php"><img src="../icons/search_white.png" alt="Search"></a></li>
                    <li><a href="../pages/profile.php"><img src="../icons/profile_white.png" alt="Profile"></a></li>
                </ul>
            </header>
<?php } ?>

<?php function draw_footer() { ?>
            <footer>Hömu @ LTW 2019</footer>
        </body>
    </html>
<?php } ?>