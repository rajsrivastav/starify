<?php
session_start ();
 
session_destroy();
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
	setcookie('email','', time() -1);
	setcookie('password','', time() -1);
}
header('location:login.php');

?>