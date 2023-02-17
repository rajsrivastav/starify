<?php 
include 'connection1.php';
session_start();
if(!isset($_SESSION['id'])){
	header('location:login.php');
}
//getting data for sidebar
 $fetch1 = 'SELECT * FROM user WHERE id = "'.$_SESSION['id'].'"';
 $result1 = mysqli_query($conn, $fetch1);
$data = mysqli_fetch_assoc($result1);
$newname = strtoupper($data['fname'].' '.$data['lname']);

$del = 'DELETE FROM product_data WHERE id = "'.$_GET['id'].'"';
mysqli_query($conn, $del);
if($del){
	mysqli_close($conn);
	header('location:plist.php');
	exit;
}

?>