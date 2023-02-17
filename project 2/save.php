<?php
include 'connection1.php';
// insert data in data base 
// print_r($conn);
// die;

	if(isset($_POST['register'])) {
		$error = '';
		if(!isset($_POST['fname']) || $_POST['fname'] == '') {
			$error = 'First name is required';
		
			header("location: register.php?error=".$error);
			
			die;
		} elseif (!isset($_POST['lname']) ||  $_POST['lname'] == ''){
		$error = "Last name is required";
		
		header('location: register.php?error='.$error);
		
		die;
		} elseif (!isset($_POST['email']) ||  $_POST['email'] == ''){
		$error = "Email is required";
		
		header('location: register.php?error='.$error);
		
		die;
		} elseif (!isset($_POST['password']) ||  $_POST['password'] == ''){
		$error = "Password is required";
		header('location: register.php?error='.$error);
		
		die;
		}
	
	
	 else {
		
		$fst = $_POST['fname'];
		$lst = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phoneN = $_POST['phone'];
		// print_r($phone);
	 $ins = "INSERT INTO user (fname, lname, email, password, phone) VALUES ('$fst', '$lst', '$email', md5('$password'), '$phoneN')";

		mysqli_query($conn, $ins);

		header("location: login.php");
		}
		

}

?>