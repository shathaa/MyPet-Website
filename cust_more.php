<?php
session_start();

ini_set('display_error',1);
error_reporting (E_ALL & ~E_NOTICE);

//profile picture
if (isset ($_POST['back'])) {
		header("location: basket.php");
}
if (isset ($_POST['submit'])) {
	
	$city=$_POST['city'];
	$District=$_POST['District'];
	$Street=$_POST['Street'];
	
	$errors=array();
	//connect to sql database
	$db = @mysqli_connect ('localhost', 'root', 'password');	
	@mysqli_select_db ($db, 'mypet') ;

	   	$email=$_SESSION['email'];
	    $cust_id=$_SESSION['cust_id'];


	//ensure field are true
	
    if(empty($city)){
		array_push($errors, "choose your city please");
	}
	 if(empty($District)){
		array_push($errors, "choose your district please");
	}
	 if(empty($Street)){
		array_push($errors, "choose your street please");
	}
	

if(count($errors)==0){
	//create account 
			
	
           
		$query = "INSERT INTO cust_address(cust_id,city,district,street)  
        VALUES('{$cust_id}','{$city}','{$District}','{$Street}')";
		
		if (@mysqli_query ($db, $query)) {
		
$_SESSION['message']=" address is successfully";
	
	
		header("location: basket.php");
		
		}
		else {		
array_push($errors, "The location is used");
}

	
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
		<form action="cust_more.php" method="post">
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<h1>add your address </h1>
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
		
		<p><?php echo 'Enter your address information please'; ?></p>
		</div>
		<?php endif ?>
        <br /><br />
		City:<select name = "city">
		<option value="jeddah">Jeddah.</option>
		<option value="makkah">Makkah.</option>
		<option value="madena">Madena.</option>
		</select><br /><br /><br /><br />
		
		<input type="text" name="District" size="20" placeholder="District"/><br /><br />
		<input type="text" name="Street" size="20" placeholder="Street"/><br /><br />
		
		<input type="submit" name="submit" value="OK" id="submit_btn"/>
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