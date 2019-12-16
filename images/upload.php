<?php
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

    function save_profile_photo($image, $destination) {
        $destinationName = "../images/$destination";
        //Temporarily move the image to its destination
        move_uploaded_file($image['tmp_name'], $destinationName);
        $original = imagecreatefromfile($destinationName);

        $width = imagesx($original);
        $height = imagesy($original);
        $square = min($width, $height);

        // Profile pics are 250x250
        $photo = imagecreatetruecolor(250, 250);
        imagecopyresized($photo, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 250, 250, $square, $square);
        imagejpeg($photo, $destinationName);
    }
?>