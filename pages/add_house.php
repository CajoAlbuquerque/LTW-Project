<?php
    include_once('../session.php');
    include_once('../database/db_images.php');
    include_once('../templates/temp_message.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_house.php');

    if(isset($_SESSION['username'])) {
        $photo = getUserImage($_SESSION['username']);
    } else {
        $_SESSION['redirect'] = array( 'page' => 'add_house.php');
        die(header('Location: ../pages/login.php'));
    }

    draw_black_header($photo);
    draw_style('inputStyle');
    draw_style('addHouse');
    draw_script('add_house');

    if(isset($_SESSION['messages'])) {
        $type = $_SESSION['messages'][0]['type'];
        $content = $_SESSION['messages'][0]['content'];

        draw_message($type, $content);
    }

    draw_new_house_form();
    draw_footer();

    unset($_SESSION['messages']);
?>
