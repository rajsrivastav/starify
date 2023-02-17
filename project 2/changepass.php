 <?php
 session_start();
 include 'connection1.php';
if(!isset($_SESSION['id'])){
	header('location:login.php');
}
$id = $_SESSION['id'];

$fetch= 'SELECT password, file, email, fname, lname FROM user WHERE id = "'.$_SESSION['id'].'"';
 $result = mysqli_query($conn, $fetch);
 $data= mysqli_fetch_assoc($result);
 $dbpass = $data['password'];
 $newname = strtoupper($data['fname'].' '.$data['lname']);

if(isset($_POST['pass'])){
	$newpass = $_POST['newpass'];
	$conpass = $_POST['conpass'];
	 $error = "";
	if($newpass != $conpass){
	$error = 'Password Not Match';
			header("location: changepass.php?error=".$error);
			die;
	} 
		
	$update = 'UPDATE user SET password = "'.md5($newpass).'" WHERE  id= "'.$_SESSION['id'].'"';
	mysqli_query($conn, $update);
	header('location: profile.php');
	
}
 
 
 ?>
 
 
 
<?php include 'sidebars.php'; ?>

<div class= "mt-5 col-md-9" >
  <div class= "title bg-warning p-3 rounded-2 text-center"><h3>CHANGE YOUR PASSWORD</h3></div>
  <div class="mt-3 p-3">
  <form class="form col-md-6 mx-5" method="post" action= "" enctype="multipart/form-data">
New Password: <input type="text" class="form-control" name="newpass"><br>
Confirm Password: <input type="text" class="form-control" name="conpass"><br>

<input type="submit" class="btn btn-primary" name="pass"><span><?php if(isset($_GET['error'])){
	 echo $_GET['error'];
}; ?>
</span>
</div>
  </div>
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>