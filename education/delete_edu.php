<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$query = "DELETE FROM educations WHERE id=$id";
$result = mysqli_query($conn,$query);
$_SESSION['del'] = 'delete successful';
header('location: add_edu.php');
?>