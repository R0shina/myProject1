<?php
require('db.inc.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['password'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$res=mysqli_query($con,"select * from employee where email='$email' and password='$password'");
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
		header('location:index.php');
        
		die();
	}else{
		$msg="Please enter correct login details";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="forstyle.css">
</head>
<body>
    <nav class="navbar background h-nav-resp">
        <ul class="nav-list v-resp">
        <div class="logo">
        <a class="navbar-brand" href="index.php"><img src="logo.png" alt="Logo"></a>
        </div>
         
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="login.php">Log In</a></li>
           
    
            </li>
        </ul>
    </nav>
    <section method="POST" action="#">
        <div class="center">
            <h1>Login</h1>
            <form  action="login.php" method="POST">
                <div class="txt_field">
                    <input type="email" name="email" placeholder="Email"></br></br>
                    <input type="password" name="password" placeholder="Password"></br></br>

                    <!-- <input type="email"  name="email" >
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="password"   name="password">
                    <span></span>
                    <label>Password</label> -->
                </div>
                <button name="login" class="login">Login</button>
                 
                
                
        </div>
       
        
            </form>
         </div>
    </section>
  
</body>

</html>