<?php
session_start();
require '../db.php';

$id = $_POST['id'];

$title = $_POST['title'];
$percentage = $_POST['percentage'];
$year = $_POST['year'];

$update = "UPDATE educations SET title='$title', percentage='$percentage', year='$year' WHERE id=$id";
$update_result = mysqli_query($conn,$update);
$_SESSION['update'] = 'updated!';
header('location: edit_edu.php?id='.$id);

?>