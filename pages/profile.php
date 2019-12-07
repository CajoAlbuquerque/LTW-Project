<?php
    include_once('../session.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_profile.php');
    include_once('../database/db_user.php');

    if(!isset($_SESSION['username'])) {
        die(header('Location: ../pages/login.php'));
    }

    $username = $_SESSION['username'];

    if(isset($_GET['username'])) {
        $username = $_GET['username'];
    }

    $user = getUserByName($username);

    draw_boilerplate('dark');
    draw_header();
    draw_profile($user);
    draw_footer();
?>