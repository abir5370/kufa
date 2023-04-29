<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM icons WHERE id=$id";
$select_result = mysqli_query($conn,$select);
$select_after_assoc = mysqli_fetch_assoc($select_result);

if($select_after_assoc['status'] == 1){

    $count = "SELECT COUNT(*) as deactive FROM icons WHERE status=1";
    $result = mysqli_query($conn,$count);
    $after_assoc = mysqli_fetch_assoc($result);
    
    if($after_assoc['deactive'] == 2){
        $_SESSION['limit'] = 'minimum 2 item need to be active!';
        header('location: add_social_icon.php');
    }
    else{
        $update1 = "UPDATE icons SET status=0 WHERE id=$id";
        $result = mysqli_query($conn,$update1);
        header('location: add_social_icon.php');
    }
}
else{
    $count = "SELECT COUNT(*) as active FROM icons WHERE status=1";
    $count_result = mysqli_query($conn,$count);
    $after_assoc_count = mysqli_fetch_assoc($count_result);

    if($after_assoc_count['active'] == 4){
    $_SESSION['limit'] = 'maximum 4 item can be active!';
    header('location: add_social_icon.php');
    }
    else{
    $update = "UPDATE icons SET status=1 WHERE id=$id";
    $result = mysqli_query($conn,$update);
    header('location: add_social_icon.php');
    }
}


?>