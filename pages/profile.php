<?php
    include_once('../session.php');
    include_once('../templates/temp_common.php');
    include_once('../templates/temp_message.php');
    include_once('../templates/temp_profile.php');
    include_once('../database/db_user.php');

    // Only logged in users can see other users page
    if(!isset($_SESSION['username'])) {
        if(isset($_GET['username'])){
            $_SESSION['redirect'] = array( 'page' => 'profile.php', 'username' => $_GET['username']);
        } else {
            $_SESSION['redirect'] = array( 'page' => 'profile.php');
        }
        die(header('Location: ../pages/login.php'));
    }

    // By default the user is shown its own profile page
    $username = $_SESSION['username'];
    $message = array(); // By default the is no message to show to user

    // If there is an explicit username on the GET parameters
    // the profile page of that user is shown instead
    if(isset($_GET['username'])) {
        $username = $_GET['username'];
    }

    if(isset($_SESSION['messages'])) {
        $message = $_SESSION['messages'][0];
    }

    // User info
    $user = getUserByName($username);
    $editable = $username == $_SESSION['username'];

    draw_boilerplate('dark');
    draw_style('profile');
    draw_style('messages');
    if($editable){
        draw_script('edit_user');
    }
    draw_header();
    draw_profile($user, $editable, $message);
    draw_footer();

    unset($_SESSION['messages']);
?>