<?php
include 'connection1.php';
session_start();

if(!isset($_SESSION['id'])){
	header('location:login.php');
}

$id = $_SESSION['id'];
$fetch = 'SELECT id, file, fname, lname, email, phone from user WHERE id = "'.$_SESSION['id'].'"';
 $result = mysqli_query($conn, $fetch);
 $data = mysqli_fetch_assoc($result);
 $newname = strtoupper($data['fname'].' '.$data['lname']);
 // $newname = strtoupper($data['fname'].' '.$data['lname']);
 if(isset($_POST['edit'])){
	 $fname = $_POST['frist'];
	 $lname = $_POST['last'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $id = $data['id'];

	 $update = "UPDATE user SET fname = '$fname', lname = '$lname', email = '$email', phone= '$phone' WHERE  id= $id";
	 mysqli_query($conn, $update);
	 header('location: profile.php');
 
 }


?>

  <?php include 'sidebars.php'; ?>
<div class= "mt-5 col-md-9" >
  <div class= "title bg-warning p-3 rounded-2 text-center"><h3>EDIT YOUR INFORMATION</h3></div>
  <div class="mt-3 p-3">
  <form class="form col-md-6 mx-5" method="post" action= "" enctype="multipart/form-data">
Frist Name: <input type="text" class="form-control" value="<?php echo $data['fname']; ?>" name="frist"><br>
Last Name: <input type="text" class="form-control" value="<?php echo $data['lname']; ?>" name="last"><br>
Email: <input type="email" class="form-control" value="<?php echo $data['email']; ?>" name="email"><br>
Frist Name: <input type="text" class="form-control" value="<?php echo $data['phone']; ?>" name="phone"><br>
<input type="submit" class="btn btn-primary" name="edit">
</div>
  </div>
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

 