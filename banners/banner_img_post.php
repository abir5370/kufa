<?php
session_start();
require '../db.php';

$uploaded_file = $_FILES['banner_image'];
$after_explode = explode('.',$uploaded_file['name']);
$extension = end($after_explode);
$name = $uploaded_file['name'];

$allowed_extension = array('jpg','png','webp','gif','jpeg');
if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 10000000){
        $insert = "INSERT INTO banner_images(banner_image)VALUES('$name')";
        $result = mysqli_query($conn,$insert);
        $id = mysqli_insert_id($conn);
        $file_name = $id.'.'.$extension;
        $new_location = '../uploads/banner/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $update = "UPDATE banner_images SET banner_image='$file_name' WHERE id=$id";
        $update_result = mysqli_query($conn, $update);
        $_SESSION['add'] = 'Banner Image Added!';
        header('location: add_banner.php');
    }
    else{
        $_SESSION['size']  = 'file size too long!';
        header('location: add_banner.php');
    }
}
else{
    $_SESSION['extension'] = 'invalid extension!';
    header('location: add_banner.php');
}


?>