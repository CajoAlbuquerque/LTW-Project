<?php
    include_once('../session.php');

    session_destroy();
    session_start();

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged Out successfully');
    header('Location: ../pages/homepage.php');
?>