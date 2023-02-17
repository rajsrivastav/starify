<?php
session_start();
include 'connection1.php';

$id =  $_SESSION['id'];
if(!isset($_SESSION['id'])){
	header('location:login.php');
}

$fetch = 'SELECT id, file, fname, lname, email, phone FROM user WHERE id = "'.$_SESSION['id'].'"';
 $result = mysqli_query($conn, $fetch);
 $data = mysqli_fetch_assoc($result);
 $newname = strtoupper($data['fname'].' '.$data['lname']);
 
// $file = $data['file'];
// print_r($file);
// die;
?>

  <?php include 'sidebars.php'; ?>
	<!-- col 2 starts -->
  <div class= "mt-5 col-md-9" >
  <div class= "title bg-warning p-3 rounded-2 text-center"><h3>WELCOME <?php echo $newname; ?></h3></div>
 <div class ="panel-body p-2 bg-light mt-">
 <div class="row"><h2>Bio Data</h2></div>
 <div class="row g-2 ">
 
  <div class="col-6 p-2 mt-2"><b>Frist Name : </b><?php echo $data['fname']; ?></div>
 <div class="col-6 p-2 mt-2"><b>Last Name : </b><?php echo $data['lname']; ?></div>
 <div class="col-6 p-2 mt-2"><b>Email : </b><?php echo $data['email']; ?></div>
 <div class="col-6 p-2 mt-2"><b>Phone No : </b><?php echo $data['phone']; ?></div>
</div>
 </div>
  </div>
  <!-- col 2 end -->
   </div>
  </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>