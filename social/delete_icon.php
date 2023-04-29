<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM icons WHERE id=$id";
$result = mysqli_query($conn,$delete);
$_SESSION['del'] = 'deleted successfully!';
header('location: add_social_icon.php');
?>