<?php
session_start();
require '../db.php';

$id = $_POST['id'];

$icon = $_POST['icon'];
$title = $_POST['title'];
$desp = $_POST['desp'];

$update = "UPDATE services SET icon='$icon', title='$title', desp='$desp' WHERE id=$id";
$update_result = mysqli_query($conn,$update);
$_SESSION['success'] = 'service content updated!';
header('location: edit_service.php?id='.$id);

?>