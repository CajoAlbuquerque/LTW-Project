<?php function draw_header() { ?> <!-- TODO: change profile icon according to login status-->
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Hömu - Find your place</title>
        </head>
        <body>
            <header>
                <ul>
                    <li><a href="../pages/homepage.php"><img src="#" alt="Hömu logo"></a></li>
                    <li><a href="../pages/about.php"><img src="#" alt="About us"></a></li>
                    <li><a href="../pages/search.php"><img src="#" alt="Search"></a></li>
                    <li><a href="../pages/profile.php"><img src="#" alt="Profile"></a></li>
                </ul>
            </header>
<?php } ?>

<?php function draw_footer() { ?>
            <footer>Hömu @ LTW 2019</footer>
        </body>
    </html>
<?php } ?>