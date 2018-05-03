<?php
session_start();
require_once('config.php');
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['username'] = $username;
                echo session_id();
                print_r($_SESSION);
                header("location: welcome.php");
	}else{
		$fmsg = "Invalid Username/Password";
	}
}
if(isset($_SESSION['username'])){
	$smsg = "User already logged in";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        

	<link rel="stylesheet" type="text/css" href="styles.css">
        <style>

</style>
</head>
<body>
   
<div class="container">
     
       <div class="row" style="margin-top: 50px">
           
            <div class="col-sm-4"></div>
           
            <div class="col-sm-4">
                 <form class="form-signin" method="POST">
                
                <h2 class="form-signin-heading">Please Login</h2>
            <div class="form-group">
		  <!--<span class="input-group-addon" id="basic-addon1">@</span>-->
                <label for="name">Username</label>
		  <input type="text" name="username" class="form-control" placeholder="Username" required>
		</div>
                <div class="form-group">
		  <!--<span class="input-group-addon" id="basic-addon1">@</span>-->
                <label for="inputPassword">Password</label>
		  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		</div>
                <button class="btn btn-md btn-primary " type="submit">Login</button>
                
                <a class="pull-right" href="register.php">Register</a>
                      </form>
                <div class="form-group">
                <?php if(isset($smsg)){ ?><div class="alert alert-success alert-dismissible" > <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $smsg; ?> </div><?php } ?>
                <?php if(isset($fmsg)){ ?><div class="alert alert-danger alert-dismissible" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $fmsg; ?> </div><?php } ?>
                </div>
                </div>
            <div class="col-sm-4">
                
            </div>
        </div>
</div>
      
</body>
</html>