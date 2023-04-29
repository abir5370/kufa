<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM services WHERE id=$id";
$select_result = mysqli_query($conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['status'] == 0){
    $update = "UPDATE services SET status=1 WHERE id=$id";
    $update_result = mysqli_query($conn,$update);
    header('location: add_service.php');
}
else{
    $update2 = "UPDATE services SET status=0 WHERE id=$id";
    $update2_result = mysqli_query($conn,$update2);
    header('location: add_service.php');
}
?>