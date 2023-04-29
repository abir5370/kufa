<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM educations WHERE id=$id";
$result = mysqli_query($conn,$select);
$after_assoc = mysqli_fetch_assoc($result);

if($after_assoc['status'] == 0){
    $update = "UPDATE educations SET status=1 WHERE id=$id";
    $update_result = mysqli_query($conn,$update);
    header('location: add_edu.php');
}
else{
    $update2 = "UPDATE educations SET status=0 WHERE id=$id";
    $update2_result = mysqli_query($conn,$update2);
    header('location: add_edu.php');
}

?>