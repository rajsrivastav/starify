<?php
include 'connection1.php';
session_start();

if(!isset($_SESSION['id'])){
	header('location:login.php');
}

$id = $_SESSION['id'];
$fetch = 'SELECT id, file, fname, lname, email, phone FROM user WHERE id = "'.$_SESSION['id'].'"';
 $result = mysqli_query($conn, $fetch);
 $data = mysqli_fetch_assoc($result);
 $newname = strtoupper($data['fname'].' '.$data['lname']);
 
 //Creating Table 
 // $table2 = 'CREATE TABLE product_data (
// id int PRIMARY KEY AUTO_INCREMENT, 
// pname varchar(255),
// p_sdes varchar(255),
// p_ldes varchar(255),
// p_image varchar(255),
// p_sku varchar(255),
// pprice int,
// user_id int,
// FOREIGN KEY (user_id) REFERENCES user(id)

// )';
// mysqli_query($conn, $table2);
 
 if(isset($_POST['btn'])){
	
	$pimage_name = $_FILES['file']['name'];
	$destination = 'file/'.$pimage_name;
	move_uploaded_file($_FILES['file']['tmp_name'], $destination);
	
	// $insert = 'INSERT INTO user(fname, lname, email, phone) VALUES ("'.$_POST['fname'].'", "'.$_POST['lname'].'", "'.$_POST['email'].'", "'.$_POST['phone'].'")';
	// mysqli_query($conn, $insert);
	
 // $select = 'SELECT id, email from user WHERE email = "'.$_POST['email'].'"';

// $result =  mysqli_query($conn, $select);
// $data = mysqli_fetch_assoc($result);


	$insert2 = 'INSERT INTO product_data(pname, p_sdes, p_ldes, p_image, p_sku, pprice, user_id) VALUES ("'.$_POST['pname'].'", "'.$_POST['p_sdes'].'", "'.$_POST['p_ldes'].'", "'.$_FILES['file']['name'].'", "'.$_POST['psku'].'", "'.$_POST['pprice'].'", "'.$_SESSION['id'].'")';
	mysqli_query($conn, $insert2);
	
	header('location:plist.php');
}
 
 
?>


<?php include 'sidebars.php'; ?>

<div class= "mt-5 col-md-9" >
  <div class= "title bg-warning p-3 rounded-2 text-center"><h3>WELCOME <?php echo $newname; ?></h3></div>
 <div class="container-fluid bg-info rounded-2 mt-3 ">
 
  <div class="row">
  
  <div class="col-9 mx-auto bg-warning rounded-3 m-5 p-3">

<form class="form row" method="post" action= "" enctype="multipart/form-data">

<div class="col-4">Product Name: <input type="text" class="form-control" name="pname"><br></div>
<div class="col-4">Product Short Description: <textarea class="form-control" name="p_sdes" rows="1"></textarea><br></div>
<div class="col-4">Product Long Description: <textarea class="form-control" name="p_ldes" rows="1"></textarea><br></div>
<div class="col-4">Product Image: <input type="file" class="form-control" name="file"><br></div>
<div class="col-4">Product SKU: <input type="text" class="form-control" name="psku"><br></div>
<div class="col-4">Price: <input type="text" class="form-control" name="pprice"><br></div>
<div class="text-center"><input type="submit" value="Submit" class="btn btn-primary" name="btn"></div>
 </form>

 </div>
 </div>
 </div>
 
   </div>
  <!-- col 2 end -->
   </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

 