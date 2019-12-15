<?php
    include_once('../session.php');
    include_once('../database/db_user.php');

    // Usernames all stored in lower case
    $username = strtolower($_POST['username']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $destination = 'homepage.php';

    if(isset($_SESSION['redirect'])) {
        $redirect = $_SESSION['redirect'];
        $destination = $redirect['page'] . '?';
        foreach($redirect as $key => $value) {
            if($key != 'page') {
                $destination .= $key . '=' . $value . '&';
            }
        }
        
        unset($_SESSION['redirect']);
    }

    // Validating username
    if( !preg_match('/^[a-zA-Z0-9 _-]+$/', $username) ){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters, numbers, spaces or underscores!');
        die(header('Location: ../pages/register.php'));
    }
    // Checking if username or email already exist
    if ( getUserByEmail($email) !== false || getUserByName($username) !== false ) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Email or username already exist!');
        die(header('Location: ../pages/register.php'));
    }
    
    try {
        insertUser($username, $email, $pass, $name);
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Registered successfully!');
        header('Location: ../pages/' . $destination);
    }
    catch(PDOException $excpt) {
        die($excpt->getMessage());
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to register!');
        header('Location: ../pages/register.php');
    }
?>