<?php
session_start();
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = "INSERT INTO icons(icon,link)VALUES('$icon','$link')";
$result = mysqli_query($conn, $insert);
$_SESSION['success'] = 'icon added successfull!';
header('location: add_social_icon.php');
?>