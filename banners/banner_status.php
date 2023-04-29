<?php
require '../db.php';

$id  = $_GET['id'];

$update = "UPDATE banner_contents SET status=0";
$result = mysqli_query($conn,$update);

$update2 = "UPDATE banner_contents SET status=1 WHERE id=$id";
$result = mysqli_query($conn,$update2);
header('location: add_banner.php');

?>