<?php
    include_once('../session.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_profile.php');
    include_once('../database/db_user.php');

    if(!isset($_SESSION['username'])) {
        die(header('Location: ../pages/login.php'));
    }

    $user = getUserByName($_SESSION['username']);

    draw_header();
    draw_sidebar();
    draw_profile($user);
    draw_footer();
?>