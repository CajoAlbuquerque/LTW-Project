<?php
    include_once('../database/connection.php');

    function insertImage($title) {
        global $db;

        $today = date("Y-m-d:H:i:s"); // Today's date and time
        $hash = hash("md5", $title . $today);
        $hash .= '.jpg';

        $stmt = $db->prepare("INSERT INTO Images VALUES(NULL, ?, ?, ?)");
        $stmt->execute(array($title, $today, $hash));
        
        $id = $db->lastInsertId();
        return array("photoId" => $id, "destination" => $hash);
    }

    function getUserImage($user) {
        global $db;

        $stmt = $db->prepare("SELECT * FROM User JOIN Images ON User.photo=Images.imageID WHERE username = ?");
        $stmt->execute(array($user));
        $image = $stmt->fetch();

        return  $image['hash'];
    }
?>