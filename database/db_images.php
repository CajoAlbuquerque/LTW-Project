<?php
    include_once('../database/connection.php');

    $today;

    function generateHash($title) {
        global $today;

        $today = date("Y-m-d:H:i:s"); // Today's date and time
        $hash = hash("md5", $title . $today);
        $hash .= '.jpg';

        return $hash;
    }

    function insertImage($title) {
        global $db, $today;

        $hash = generateHash($title);

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

    function getImage($id) {
        global $db;

        $stmt = $db->prepare("SELECT * FROM Images WHERE imageID = ?");
        $stmt->execute(array($id));

        return $stmt->fetch();
    }

    function updateImage($id) {
        global $db, $today;
        
        $image = getImage($id);
        unlink("../images/" . $image['hash']);

        $hash = generateHash($image['title']);

        $stmt = $db->prepare("UPDATE Images SET hash = ?, date = ? WHERE imageID = ?");
        $stmt->execute(array($hash, $today, $id));

        return $hash;
    }

    function updateUserImage($user, $photo) {
        global $db;

        $stmt = $db->prepare('UPDATE User SET photo = ? WHERE userID = ?');
        $stmt->execute(array($photo, $user));
    }
?>