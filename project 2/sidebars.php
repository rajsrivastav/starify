<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
	<link href="profie.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
	
  <div class= "container-fluid">
  <div class="row">
    <!-- col 1 starts -->
  <div class="mt-5 col-md-3">
  <div class="panel">
    <!-- card starts -->
  <div class="card" style="width: 18rem;">
  <div class="bg-warning">
  <div class="user-heading text-center mt-2">
  <a href="fileupdate1.php">
  <img src="file/<?php echo $data['file']; ?>" class="img-responsive sty rounded-circle border border-primary"/>
  </a>
   <h4 class="card-title text-dark"><?php echo $newname; ?></h4>
   <p class="text-dark"><?php echo $data['email']; ?></p>
  </div>
  </div>
  <!-- card body starts -->
  <div class="list-group">
   <div class=" bg-white list-group-item list-group-item-action">  
   
  <p><a href="profile.php" class="text-dark">Profie</a></p>
  </div>
  <div class=" bg-white list-group-item list-group-item-action">  
   <p><a href="editprofile.php"  class="text-dark">Edit Profile</a></p>
  </div>
  <div class="bg-white list-group-item list-group-item-action">  
   <p><a href="changepass.php" class="text-dark">Change Password</a></p>
  </div>
  <div class="bg-white list-group-item list-group-item-action">  
   <p><a href="plist.php" class="text-dark">Products</a></p>
  </div>
  <div class="bg-white list-group-item list-group-item-action">  
   <p><a href="logout.php" class="text-dark">Logout</a></p>
  </div>
  

</div>
  <!-- card body end -->
  </div>
    <!-- card ends -->
  </div>
  </div>
    <!-- col 1 end -->

  
  
 