<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select_status = "SELECT * FROM testimonials WHERE id=$id";
$select_status_result = mysqli_query($conn,$select_status);
$select_status_assoc = mysqli_fetch_assoc($select_status_result);

if($select_status_assoc['status'] == 1){
    $update = "UPDATE testimonials SET status=0 WHERE id=$id";
    $update_result = mysqli_query($conn,$update);
    header('location: add_testimonial.php');
}
else{
    $update2 = "UPDATE testimonials SET status=1 WHERE id=$id";
    $update2_result = mysqli_query($conn,$update2);
    header('location: add_testimonial.php');
}




?>