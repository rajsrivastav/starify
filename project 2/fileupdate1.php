<?php
include 'connection1.php';
session_start();

if(!isset($_SESSION['id'])){
	header('location:login.php');
}
$id = $_SESSION['id'];
$fetch = 'SELECT id, fname, lname, email, file from user WHERE id = "'.$_SESSION['id'].'"';
$result = mysqli_query($conn, $fetch);
$data = mysqli_fetch_assoc($result);
$newname = strtoupper($data['fname'].' '.$data['lname']);

if(isset($_POST['update'])){
$filename = $_FILES['file']['name'];	
$destination = 'file/'.$filename;

$id = $data['id'];
move_uploaded_file($_FILES["file"]["tmp_name"], $destination);

$update = "UPDATE user SET file = '$filename' WHERE  id= $id";
mysqli_query($conn, $update);
header('location:profile.php');	
}


?>

 <?php include 'sidebars.php'; ?>
 
<div class= "mt-5 col-md-9" >
  <div class= "title bg-warning p-3 rounded-2 text-center"><h3>EDIT YOUR PROFILE</h3></div>
  <div class="mt-3 p-3">
  <form class="form col-md-6 mx-2 p-3" method="post" action= "" enctype="multipart/form-data">
  <label for="updatefile" class="form-label"> Update Your Profile</label>
<input type="file" class="form-control" value="<?php echo $data['file']; ?>" name="file"><br>
<input type="submit" class="btn btn-primary" name="update">
  </form>
  </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
