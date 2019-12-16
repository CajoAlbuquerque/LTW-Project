<?php
    include_once('../session.php');
    include_once('../database/db_images.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_search.php');

    $photo = '';
    if(isset($_SESSION['username'])) {
        $photo = getUserImage($_SESSION['username']);
    }

    draw_black_header($photo);
    draw_style('search');
    draw_style('inputStyle');
    draw_style('templateHouseStyle');
    draw_script('search_houses');
    draw_search();
    draw_footer();
?>