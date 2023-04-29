<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM banner_images WHERE id=$id";
$select_result = mysqli_query($conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);
$delete_form = '../uploads/banner/'.$after_assoc['banner_image'];
unlink($delete_form);

$delete = "DELETE FROM banner_images WHERE id=$id";
$result = mysqli_query($conn,$delete);

$_SESSION['del'] = 'banner image deleted!';
header('location: add_banner.php');

?>