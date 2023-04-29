<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id=$id";
$select_result = mysqli_query($conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['status'] == 1){
    $update = "UPDATE works SET status=0 WHERE id=$id";
    $update_result = mysqli_query($conn, $update);
    header('location: add_work.php');
}
else{
    $update2 = "UPDATE works SET status=1 WHERE id=$id";
    $update_result = mysqli_query($conn, $update2);
    header('location: add_work.php');
}


?>