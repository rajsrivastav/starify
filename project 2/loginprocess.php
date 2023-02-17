<?php
//Connection 

// echo "Welcome to Main page";
  // session_start();
if(isset($_POST['login'])){
	session_start();
	include 'connection1.php';
		
	 $email = $_POST['email'];
	$password = $_POST['password'];
	
   $fetch = 'SELECT * FROM user WHERE email="'.$email.'" AND password="'.md5($password).'"';
   $result = mysqli_query($conn, $fetch);
 // print_r($result);
 // die;
   if(mysqli_num_rows($result) == 0) {
   $_SESSION ['message'] = 'Login Failed';
    header('location:login.php');
   } else {
	   $data = mysqli_fetch_assoc($result);
	   if(isset($_POST['remember'])){
		   setcookie('email', $data['email'],time() +60);
		   setcookie('password', $data['password'], time() +60);
	   }
	   $_SESSION['id'] = $data['id'];

	 
	   header('location:profile.php');
   }
}
?>