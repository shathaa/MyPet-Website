<?php
ini_set('display_error',1);
error_reporting (E_ALL & ~E_NOTICE);

//profile picture
if (isset ($_POST['back'])) {
		header("location: index.php");
}
if (isset ($_POST['submit'])) {
	session_start();
	$email=$_POST['email'];
	$fname=$_POST['firstName'];
	$lname=$_POST['lastName'];
	$phone=$_POST['phoneNum'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	
	
	$errors=array();
	//connect to sql database
	$db = @mysqli_connect ('localhost', 'root', 'password');	
	@mysqli_select_db ($db, 'mypet') ;

	//ensure field are true
	
	//ensure field are true
	if(empty($email)){
		array_push($errors, "Enter your email please");
	}
	if(empty($fname)||is_numeric($fname)){
		array_push($errors, "Enter your first name please");
	}
	if(empty($lname)||is_numeric($lname)){
		array_push($errors, "Enter your last name please");
	}
	if(empty($phone)||!is_numeric($phone)||strlen($phone)!=10){
		array_push($errors, "Enter your phone number please");
	}
	if(empty($password)){
		array_push($errors, "Enter your password please");
	}
	if(strlen($password)<4){
		array_push($errors, "Password must be greater than 4 character ");
	}
	if($repassword!=$password){
		array_push($errors, "the two passwords are not match");
	}
	
	
	

		

if(count($errors)==0){
	//create account 
		$img ="../image/user.png";
		
      // $passSalted ="2343sfhgfjlorhtg".$password."fdhdhjyt454t5y";
	  // $passHashed =hash('sha512',$passSalted);
		$query = "INSERT INTO cust_info (first_name,last_name,email,password,phone_no,date, img)
		VALUES('{$fname}','{$lname}','{$email}','{$password}','{$phone}',NOW(),'{$img}')";
		
		if (@mysqli_query ($db, $query)) {	



$_SESSION['message']=" logged in successfully";
 		$_SESSION['cust_id']=$cust_id;
		$_SESSION['email']=$email;
		$_SESSION['fname']=$fname;
		$_SESSION['lname']=$lname;		
		$_SESSION['img']=$img;

		header("location: index.php");
		
		}
		else {		
array_push($errors, "The email is used");}

	
mysqli_close($db);

		
	
}


}



?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Pet</title>
<link rel="stylesheet" type="text/css" href="myStyle.css"></link>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <link rel="stylesheet" type="text/css" href="style.css" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		



<style>

.sign {
   
   
    width:40%;
    background-image: url(../image/catba2.png );
    background-repeat: no-repeat;
	
}

.sign .error {
  width: 70%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: center;
}

</style>

</head>
<body  style="background:#fff0c1">
    <!-- start of container -->
<div id="container"> 

<div id="header">



  <img src="image/logo.png" style="width: 400px;
    height: 294px"/>
 
</div>

<div id="content">

		<center>

		<div class="sign">
          <center>
		<form action="signup.php" method="post">
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<h1>Sign Up</h1>
          <br /><br />
		<?php if(count($errors)>0&&count($errors)<3): ?>
		<div class="error">
		<?php foreach($errors as $error): ?>
		<p><?php echo $error; ?></p>
		<?php endforeach ?>

		</div>
		<?php endif ?>
		<?php if(count($errors)>3): ?>
		<div class="error">
		
		<p><?php echo 'Enter your information please'; ?></p>
		</div>
		<?php endif ?>
        <br /><br />
		<input type="email" name="email" size="20" placeholder="Email"/><br /><br />
		<input type="text" name="firstName" size="20" placeholder="First name"/><br /><br />
		<input type="text" name="lastName" size="20" placeholder="Last name"/><br /><br />
		<input type="text" name="phoneNum" size="20" placeholder="Phone number"/><br /><br />
		<input type="password" name="password" size="20" placeholder="Passward"/> <br /><br />
		<input type="password" name="repassword" size="20" placeholder="Confierm"/><br /><br />
		</select><br /><br /><br /><br />
		<input type="submit" name="submit" value="Sign Up" id="submit_btn"/>
		<input type="submit" name="back"value="Back" id="submit_btn" /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		</form>
         </center>

		</div> 

		</center>
		  



</div>

  <!-- end of content -->
    <!-- start of footer -->
<div id="footer_wrapper">
  <div id="footer">
    <ul class="footer_menu">
      <li><a href="index.php"> Home </a></li>
      <li><a href="aboutus.php">About us</a></li>
    </ul>
    Copyright &copy; 2019 <a>MY PETS TEAM</a> 
	</div>
  <!-- end of footer -->
</div>
</div><!-- end of container -->
</body>
</html>