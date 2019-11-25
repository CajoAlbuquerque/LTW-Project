<?php
    // include_once('database/queries.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];

    //Validate fields

    if($pass != $confirm) {
        //Warn the user the passwords do not match
    } else if ( false/* email already in database*/ ) {

    } else {

    }
?>