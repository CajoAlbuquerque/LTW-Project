<?php
    include_once('../database/connection.php');

    function imagecreatefromfile($filename) {
        if (!file_exists($filename)) {
            return false;
        }
        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                return imagecreatefromjpeg($filename);
            break;
    
            case 'png':
                return imagecreatefrompng($filename);
            break;
    
            case 'gif':
                return imagecreatefromgif($filename);
            break;
    
            default:
                return false;
            break;
        }
    }

    function insertImage($title) {
        global $db;

        $today = date("Y-m-d:H:i:s"); // Today's date and time
        $hash = hash("md5", $title . $today);

        $stmt = $db->prepare("INSERT INTO Images VALUES(NULL, ?, ?, ?)");
        $stmt->execute(array($title, $today, $hash));
    }

    function getUserImage($user) {
        global $db;

        $stmt = $db->prepare("SELECT * FROM User JOIN Images ON User.photo=Images.imageID WHERE username = ?");
        $stmt->execute(array($user));
        $image = $stmt->fetch();

        return  $image['hash'];
    }
?>