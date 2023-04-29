<?php
session_start();
require '../db.php';

$title = $_POST['title'];
$percentage = $_POST['percentage'];
$year = $_POST['year'];

$insert = "INSERT INTO educations(title,percentage,year)VALUES('$title','$percentage','$year')";
$result = mysqli_query($conn,$insert);
$_SESSION['success'] = 'education added!';
header('location: add_edu.php');


?>