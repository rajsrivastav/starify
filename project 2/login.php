<?php
// Start the session
session_start();
include 'connection1.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  
  <div class="container-fluid bg-info">
  <div class="login-panel">
  <div class="row">
  <div class="col-4 mx-auto">
  <div class=" bg-warning rounded-3 m-5 p-3">
<form class="form" method="post" action= "loginprocess.php" enctype="multipart/form-data">
Email: <input type="email" class="form-control" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>"><br>
Password: <input type="password" class="form-control" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" name="password"><br>
<label><input type="checkbox" class="form-check-input" name="remember" <?php if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){echo "checked";} ?>> Remember Me</label><br><br>
<input type="submit" value="Login" class="btn btn-primary" name="login">

<span>
<?php
if(isset($_SESSION ['message'])){
	echo $_SESSION ['message'];
	unset($_SESSION ['message']);
}
?>
</span>
 </form>
 </div>
 </div>
 </div>
 </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
