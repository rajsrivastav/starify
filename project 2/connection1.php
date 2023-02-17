<?php
// Connection 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'students';

$conn = mysqli_connect($host, $username, $password, $dbname);

//checking an error
if(mysqli_error($conn)) {
	echo 'Couldn\'t connect';
	die;
}

?>