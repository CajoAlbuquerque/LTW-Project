<?php
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_search.php');

    draw_black_header();
    draw_script('search_houses');
    draw_filters();
    draw_search_result();
    draw_footer();
?>