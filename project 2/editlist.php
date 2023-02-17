<?php
session_start();
include 'connection1.php';
if(!isset($_SESSION['id'])){
	header('location:login.php');
}

 $fetch1 = 'SELECT * FROM user WHERE id = "'.$_SESSION['id'].'"';
 $result1 = mysqli_query($conn, $fetch1);
$data = mysqli_fetch_assoc($result1);
$newname = strtoupper($data['fname'].' '.$data['lname']);

$fetch = 'SELECT * from product_data WHERE id = "'.$_GET['id'].'"';
$result = mysqli_query($conn, $fetch);
$pdata = mysqli_fetch_assoc($result);

//inserting data
if(isset($_POST['btn'])){
	$filename = $_FILES['file']['name'];
	$destination = 'file/'.$filename;
	move_uploaded_file($_FILES['file']['tmp_name'], $destination);
$update=	'UPDATE product_data SET pname = "'.$_POST['pname'].'", p_sdes =  "'.$_POST['p_sdes'].'", p_ldes = "'.$_POST['p_ldes'].'", p_image = "'.$_FILES['file']['name'].'", p_sku = "'.$_POST['psku'].'", pprice= "'.$_POST['pprice'].'" WHERE id = "'.$_GET['id'].'"';
mysqli_query($conn, $update);
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

<div class="col-4">Product Name: <input type="text"  class="form-control" value="<?php echo $pdata['pname']; ?>" name="pname"><br></div>
<div class="col-4">Product Short Description: <textarea class="form-control" name="p_sdes" rows="1"><?php echo $pdata['p_sdes']; ?></textarea><br></div>
<div class="col-4">Product Long Description: <textarea class="form-control"  name="p_ldes" rows="1"><?php echo $pdata['p_ldes']; ?></textarea><br></div>
<div class="col-4">Product Image: <input type="file" class="form-control" value="<?php echo $pdata['p_image']; ?>" name="file"><br></div>
<div class="col-4">Product SKU: <input type="text" class="form-control" value="<?php echo $pdata['p_sku']; ?>" name="psku"><br></div>
<div class="col-4">Price: <input type="text" class="form-control" value="<?php echo $pdata['pprice']; ?>" name="pprice"><br></div>
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
