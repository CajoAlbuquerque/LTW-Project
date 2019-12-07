<?php
    include_once('../session.php');
    include_once('../templates/temp_message.php');
    include('../templates/temp_common.php');
    include('../templates/temp_houses.php');

    draw_boilerplate('dark');
    draw_header();

    if(isset($_SESSION['messages'])) {
        $type = $_SESSION['messages'][0]['type'];
        $content = $_SESSION['messages'][0]['content'];

        draw_message($type, $content);
    }

    draw_new_house_form();
    draw_footer();

    unset($_SESSION['messages']);
?>
