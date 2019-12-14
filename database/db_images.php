<?php
    include_once('../database/connection.php');

    function insertImage($title, $image) {
        global $db;

        $today = date("Y-m-d:H:i:s"); // Today's date and time
        $hash = hash("md5", $title . $today);

        $stmt = $db->prepare("INSERT INTO Images VALUES(NULL, ?)");
        $stmt->execute(array($_POST['title']));
    }

?>