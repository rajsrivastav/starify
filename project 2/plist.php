<?php
//Creating Table For DATABASE

// Inserting data to table
// $ins = 'INSERT INTO city (address) VALUES ("Baddi"),("Nalagarh")';
// mysqli_query($conn, $ins);
// $ins2 = 'INSERT INTO tab1 (id, name, place) VALUES (2, "Parveen Kumar", 3)';
// mysqli_query($conn, $ins2);
// DELETING THE TABLE FROM DATABASE
// $del = 'DROP TABLE tab';
// mysqli_query($conn, $del);

//Turncateing tables inside data
// $trun = 'TRUNCATE TABLE tab';
// mysqli_query($conn, $trun);
// print_r($turn);
// die;

//adding colnnmn 
// $addcol = 'ALTER TABLE tab ADD address varchar(255)';
// mysqli_query($conn, $addcol);

//deleting colnnmn
// $delcol = 'ALTER TABLE tab DROP COLUMN address';
// mysqli_query($conn, $delcol);

//rename the column
// $rename = 'ALTER TABLE tab CHANGE `place` `address` varchar(50)';
// mysqli_query($conn, $rename);



// $table1= 'CREATE TABLE user_data (
// id int PRIMARY KEY AUTO_INCREMENT,
// name varchar(255),
// email varchar(255), 
// UNIQUE (email)
// )';
// mysqli_query($conn, $table1);


// $table2 = 'CREATE TABLE product_data(
// id int PRIMARY KEY,
// product_name varchar(255),
// product_des varchar(255),
// product_image varchar(255),
// price varchar(255),
// user_id int ,

// FOREIGN KEY (user_id) REFERENCES user(id)
// )';
// mysqli_query($conn, $table2);
?>
<?php
session_start();
include 'connection1.php';

$id =  $_SESSION['id'];
if(!isset($_SESSION['id'])){
	header('location:login.php');
}

$fetch = 'SELECT * FROM product_data WHERE user_id = "'.$_SESSION['id'].'"';
 $result = mysqli_query($conn, $fetch);


 
 
 $fetch1 = 'SELECT * FROM user WHERE id = "'.$_SESSION['id'].'"';
 $result1 = mysqli_query($conn, $fetch1);
$data = mysqli_fetch_assoc($result1);
$newname = strtoupper($data['fname'].' '.$data['lname']);
?>


 <?php include 'sidebars.php'; ?>
	<!-- col 2 starts -->
  <div class= "mt-5 col-md-9" >
  <div class= "title bg-warning p-3 rounded-2 text-center"><h3>WELCOME</h3></div>
 <div class ="panel-body p-2 bg-light mt-">
 <div class="row"><h2>List of Your Products</h2></div>
 <div class=""><a href="formfile.php"><input type="button" class="btn btn-primary" value="CREATE PRODUCT"></a></div>
 
<table class ="table">
<thead>
  <tr>
      <th scope="col">SR No.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Short Des</th>
	   <th scope="col">Product Long Des</th>
	   <th scope="col">Product Image</th>
	   <th scope="col">Product SKU</th>
	   <th scope="col">Product Price</th>
    </tr>
	</thead>
	
<?php

if (mysqli_num_rows($result) > 0) {
  $sn=1;  	
  while($pdata = mysqli_fetch_assoc($result)) {
	
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $pdata['pname']; ?> </td>
   <td><?php echo $pdata['p_sdes']; ?> </td>
    <td><?php echo $pdata['p_ldes']; ?> </td>
	 <td><img class="rounded-3 sty1 img-responsive" alt="Responsive image" src="file/<?php echo $pdata['p_image']; ?>"/></td>
	    <td><?php echo $pdata['p_sku']; ?> </td>
		  <td><?php echo $pdata['pprice']; ?> </td>
   
   <td><a href="editlist.php?id=<?php echo $pdata['id']; ?>">Edit</a></td> 
   
    <td><a href="deletelist.php?id=<?php echo $pdata['id']; ?>" name="det">Delete</a></td> 
 <tr>
<?php
  $sn++;}} else {
?>	  
    <tr>
     <td colspan="8">No Product Found</td>
    </tr>
  <?php }

  ?>
 
  </table>
 </div>
  </div>
  <!-- col 2 end -->
   </div>
  </div>
   
  <style>
  .sty1 {
	  height: auto;
	  width: 50px;
	  object-fit: cover;
	  object-position: center;
	  
  }
  </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>