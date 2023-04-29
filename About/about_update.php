<?php
session_start();

require '../db.php';

$id = $_POST['id'];
$title = mysqli_real_escape_string($conn,$_POST['title']);
$desp = mysqli_real_escape_string($conn,$_POST['desp']);

$uploaded_file = $_FILES['image'];
if($uploaded_file['name'] == ''){
    $update = "UPDATE abouts SET title='$title',desp='$desp' WHERE id=$id";
    $update_result = mysqli_query($conn,$update);
    $_SESSION['success'] = 'about content updated!';
    header('location: edit_about.php');
}
else{
    $after_explode = explode('.', $uploaded_file['name']);
    $extension = end($after_explode);
    $allowed_extesion = array('jpg','png','webp','gif');
    if(in_array($extension, $allowed_extesion)){
        if($uploaded_file['size'] <= 10000000){
            $select = "SELECT * FROM abouts WHERE id=$id";
            $select_result = mysqli_query($conn, $select);
            $after_assoc = mysqli_fetch_assoc($select_result);
            $delete_from = '../uploads/about/'.$after_assoc['image'];
            unlink($delete_from);

            $file_name = 'about'.'.'.$extension;
            $new_location = '../uploads/about/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);

            $update = "UPDATE abouts SET title='$title', desp='$desp', image='$file_name' WHERE id=$id";
                $update_result = mysqli_query($conn, $update);
                $_SESSION['success'] = 'about content updated!';
                header('location: edit_about.php');
        }
        else{
            $_SESSION['size'] = 'File size too long!';      
            header('location:edit_about.php');
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Extension!';
        header('location: edit_about.php');
    }
}
?>