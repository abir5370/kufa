<?php
session_start();
require '../db.php';

$category = mysqli_real_escape_string($conn, $_POST['category']);
$project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$desp = mysqli_real_escape_string($conn, $_POST['desp']);


$uploaded_file = $_FILES['project_image'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','webp','gif');
$user_id = $_SESSION['id'];

if(in_array($extension, $allowed_extension)){
     if($uploaded_file['size'] <= 100000000){
        $name = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 5) . rand(100, 1000);
        $file_name = $name.'.'.$extension;
        $new_location = '../uploads/work/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $insert = "INSERT INTO works(added_by,category,project_name,title,desp,project_image)VALUES($user_id,'$category','$project_name','$title','$desp','$file_name')";
        $insert_result = mysqli_query($conn, $insert);
        $_SESSION['success'] = 'works content added successfully!';
        header('location: add_work.php');
     }
     else{
        $_SESSION['size']  = 'file size too long!';
        header('location: add_work.php');
     }
}
else{
    $_SESSION['extension'] = 'invalid extension!';
    header('location: add_work.php');
}




?>