<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select_delete = "SELECT * FROM works WHERE id=$id";
$select_delete_result = mysqli_query($conn,$select_delete);
$after_assoc = mysqli_fetch_assoc($select_delete_result);
$delete_form = '../uploads/work/'.$after_assoc['project_image'];
unlink($delete_form);

$delete = "DELETE FROM works WHERE id=$id";
$delete_result = mysqli_query($conn,$delete);
$_SESSION['del'] = 'deleted successfully';
header('location: add_work.php');

?>