<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$update = "UPDATE banner_images SET status=0";
$update_result = mysqli_query($conn, $update);

$update2 = "UPDATE banner_images SET status=1 WHERE id=$id";
$update_result2 = mysqli_query($conn, $update2);

header('location:add_banner.php');

?>