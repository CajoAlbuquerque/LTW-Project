<?php 
    include_once('../session.php');
    include_once('../database/db_images.php');
    include_once('../templates/temp_common.php');

    $photo = '';
    if(isset($_SESSION['username'])) {
        $photo = getUserImage($_SESSION['username']);
    }

    draw_black_header($photo);
    draw_style('aboutusStyle');
?>  
    <div>
        <h1>About us</h1>
        <section id="OutBorder">
            <section id="InnerBorder">
                <div id="logo">
                    <img src="../icons/logoNtitle.png" alt="Hömu logo">
                </div>
                <p>hömu is a brand developed by three studentes in the ambit of LTW (Web Languages and Technologies), a course from Informatics and Computing Engineering Master's Degree @FEUP, in 2019.</p>
                <p>Our goal is to help everyone find the perfect house to rent for a refreshing vacation in an easy, safe and intuitive way.</p>
            </section>
        </section>
    </div>
<?php 
    draw_footer();
?>