<?php
session_start();

if(isset($_POST["add_to_cart"])){
	if(isset($_SESSION["email"])) {
	if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["hidden_id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_POST["hidden_id"],
                     'item_image'               =>     $_POST["hidden_image"],					 
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="dogpro.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_POST["hidden_id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
	
	

}else{
	
	echo '<script>alert("Sign in to the website please")</script>';  
    echo '<script>window.location="index.php"</script>';
}
}
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Pet~ dog</title>
<link rel="stylesheet" type="text/css"
      href="myStyle.css"></link>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<meta name="keywords" content="BRR pharmacy"/>


<style>

.prod-info-main {
    border-radius: 9px;
    border: 4px solid #B53471;
    padding: 7px;
}
.container1{
    margin-top:30px;
}
.container2{
    margin-top:40px;
}
.container-last{
    margin-bottom: 50px;
}

.name {
    font-size: 15px;
    font-family: "Times New Roman", Times, serif;

}
.prod-info-main .description {
    font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}

 
.img {
    width: 180px;
    height: 200px;
    background-repeat: no-repeat;
    background-size: contain;
    border: 2px solid #833471;
    border-radius: 4px;
	float: center:
} 

 
.price-container {
    font-size: 18px;
    font-weight: 300;  
    font-style: oblique;
	
}
</style>
<style>



 
.img {
    width: 150px;
    height: 150px;
    background-repeat: no-repeat;
    background-size: contain;
    border: 2px solid #833471;
    border-radius: 100px;
	float: 50px;
	
} 
.abov{
width:100%;
height:40px;
background:#FD7272;
}

.abov .liftc{
font: 12px Arial, Helvetica, sans-serif;
		text-align: center;
		float:left;
		
		font-family: 'Times New Roman';	
		font-style: italic;
}

.abov .rightc{
font: 12px Arial, Helvetica, sans-serif;
		text-align: center;
		float:left;
		
		font-family: 'Times New Roman';	
		font-style: italic;
}

.bar{
height:10%;
}


.submit_btn2 {
 	height: 32px;
	width: 102px;
	margin: 10px;
	padding: 3px 0 5px 0;
	cursor: pointer;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
	vertical-align: bottom;
	white-space: pre;
	color: block;
	background: url(image/button.png) no-repeat;
	border: none;
	outline: none;
}

submit_btn2:hover {
	color: #ffffff;
	background: url(image/button_hover.png) no-repeat;
}
</style>

</head>
<body  style="background:#fff0c1">
    <!-- start of container -->
<div id="container"> 

<div id="header">
<!-- start menu above -->
<div class="abov">

<div class="liftc">

<?php //will appear if the user log in
if (isset($_SESSION['email']))  {
	$userImage=$_SESSION['img'];
 print '&nbsp  &nbsp  &nbsp'; 
print"<a href='user.php'><img src= '$userImage' style='width: 40px;height: 40px'class='img'></a> ";


echo $_SESSION['fname'];	

print '&nbsp  &nbsp'; 

 echo $_SESSION['lname'];
  print '&nbsp  &nbsp  &nbsp';

}
?>

</div>  
<!-- pic -->
<?php
if (isset($_SESSION['email']))  {
	
print '<a href="basket.php">
<img src= "image/panier-logo-png.png" style="width: 45px; height:40px; float:left"; />
</a>'; 
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; 
  print '&nbsp  &nbsp  &nbsp'; print '&nbsp   &nbsp &nbsp &nbsp  &nbsp'; 

?> 

<?php
print '<a href="logout.php">
<img src= "image/logout-256.png" style="width: 45px; height: 40px"; float:left"; />
</a>';


}
?>
<!-- user -->







</div>

  <img src="image/logo.png" style="width: 400px;
    height: 294px"/>
  <MARQUEE class="MARQUEE"><img src="image/tumblr_mr64nbkVo61sxo5z7o3_500.gif" style="width: 398px;
    height: 99px" /> WELCOME TO MY PET WEBSITE</MARQUEE>
</div>
<!-- end of header -->
<!-- start of menue -->
<div style="background:#FD7272 ; height:55px">
<div id="menu" >


<ul >
   <li><a href="index.php" ><span></span>Home</a></li>
   <li><a href=" catpro.php"><span></span>CAT BRODUCTS</a></li>
   <li><a href="dogpro.php"><span></span>DOG BRODUCTS</a></li>
   <li><a href="birdpro.php"><span></span>BIRD BRODUCTS</a></li>
   <li><a href="pet.php"><span></span>FIND MY PET</a></li>
   <li><a href="aboutus.php"><span></span>ABOUT US</a></li>
</ul>
 </div>
 </div>
 <!-- end of menue -->
    <!-- start of content -->


<div id="content">


 
<div class=" container1 container" >
	<img src= "../dog/dog.gif" > 
 <label class="labl" id="Food">&nbsp &nbsp DOG FOOD</label>
<?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($db = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');}
$query = "SELECT * FROM product where (petType='dog'&& proType='food')";	
if ($r = mysqli_query ($db, $query)) {
 

while ($row = mysqli_fetch_array ($r)) {		 

print'<form action="dogpro.php" method="post">
<div class="col-xs-12 col-md-4">
	<div class="prod-info-main ">
		<div class="row">
				<div class="col-md-6 col-xs-12">
				<img src= "'.$row['image'].'"class="img" > 
				</div>
				<div class="col-md-6  col-xs-12">
				
					<p class="name">'.$row['name'].' <br></p>
					<p class="price-container">'.$row['price'].'RS <br></p>
					<p class="description">'.$row['description'].'</p>
					<input name="quantity" type="number" value="1"  min="1" max="10"/>
					<input type="hidden" name="hidden_id" value="'.$row['id'].'"/>
					<input type="hidden" name="hidden_name" value="'.$row['name'].'"/>
					<input type="hidden" name="hidden_image" value="'.$row['image'].'"/>
					<input type="hidden" name="hidden_price" value="'.$row['price'].'"/>
				    <input type="submit" name="add_to_cart" value="Add to cart" class="submit_btn2" />
				
			</div>
		</div>
	</div>
</div>
</form>';


}


} 
else { 
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 


?>

</div>




<div class="container2 container">
 <label class="labl"  id="Health Care">&nbsp &nbsp DOG HEALTH CARE </label>

<?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($db = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');}
$query = "SELECT * FROM product where (petType='dog'&& proType='care')";	
if ($r = mysqli_query ($db, $query)) {
 

while ($row = mysqli_fetch_array ($r)) {		 

print'<form action="dogpro.php" method="post">
<div class="col-xs-12 col-md-4">
	<div class="prod-info-main ">
		<div class="row">
				<div class="col-md-6 col-xs-12">
				<img src= "'.$row['image'].'"class="img" > 
				</div>
				<div class="col-md-6  col-xs-12">
				
					<p class="name">'.$row['name'].' <br></p>
					<p class="price-container">'.$row['price'].'RS <br></p>
					<p class="description">'.$row['description'].'</p>
					<input name="quantity" type="number" value="1"  min="1" max="10"/>
					<input type="hidden" name="hidden_id" value="'.$row['id'].'"/>
					<input type="hidden" name="hidden_name" value="'.$row['name'].'"/>
					<input type="hidden" name="hidden_image" value="'.$row['image'].'"/>
					<input type="hidden" name="hidden_price" value="'.$row['price'].'"/>
				    <input type="submit" name="add_to_cart" value="Add to cart" class="submit_btn2" />
				
			</div>
		</div>
	</div>
</div>
</form>';


}


} 
else { 
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 


?>
</div>




<div class="container2 container" >
 <label class="labl"  id="Toys">&nbsp &nbsp DOG TOYS</label>
<?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($db = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');}
$query = "SELECT * FROM product where (petType='dog'&& proType='toy')";	
if ($r = mysqli_query ($db, $query)) {
 

while ($row = mysqli_fetch_array ($r)) {		 

print'<form action="dogpro.php" method="post">
<div class="col-xs-12 col-md-4">
	<div class="prod-info-main ">
		<div class="row">
				<div class="col-md-6 col-xs-12">
				<img src= "'.$row['image'].'"class="img" > 
				</div>
				<div class="col-md-6  col-xs-12">
				
					<p class="name">'.$row['name'].' <br></p>
					<p class="price-container">'.$row['price'].'RS <br></p>
					<p class="description">'.$row['description'].'</p>
					<input name="quantity" type="number" value="1"  min="1" max="10"/>
					<input type="hidden" name="hidden_id" value="'.$row['id'].'"/>
					<input type="hidden" name="hidden_name" value="'.$row['name'].'"/>
					<input type="hidden" name="hidden_image" value="'.$row['image'].'"/>
					<input type="hidden" name="hidden_price" value="'.$row['price'].'"/>
				    <input type="submit" name="add_to_cart" value="Add to cart" class="submit_btn2" />
				
			</div>
		</div>
	</div>
</div>
</form>';


}


} 
else { 
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 


?>

</div>




<div class="container2 container" >
 <label class="labl"  id="Clothes">&nbsp &nbsp DOG Clothes</label>
<?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($db = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');}
$query = "SELECT * FROM product where (petType='dog'&& proType='clothes')";	
if ($r = mysqli_query ($db, $query)) {
 

while ($row = mysqli_fetch_array ($r)) {		 

print'<form action="dogpro.php" method="post">
<div class="col-xs-12 col-md-4">
	<div class="prod-info-main ">
		<div class="row">
				<div class="col-md-6 col-xs-12">
				<img src= "'.$row['image'].'"class="img" > 
				</div>
				<div class="col-md-6  col-xs-12">
				
					<p class="name">'.$row['name'].' <br></p>
					<p class="price-container">'.$row['price'].'RS <br></p>
					<p class="description">'.$row['description'].'</p>
					<input name="quantity" type="number" value="1"  min="1" max="10"/>
					<input type="hidden" name="hidden_id" value="'.$row['id'].'"/>
					<input type="hidden" name="hidden_name" value="'.$row['name'].'"/>
					<input type="hidden" name="hidden_image" value="'.$row['image'].'"/>
					<input type="hidden" name="hidden_price" value="'.$row['price'].'"/>
				    <input type="submit" name="add_to_cart" value="Add to cart" class="submit_btn2" />
				
			</div>
		</div>
	</div>
</div>
</form>';


}


} 
else { 
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 


?>

</div>

<div class="container-last container2  container">
 <label class="labl"  id="Beds">&nbsp &nbsp DOG Beds </label>
<?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($db = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');}
$query = "SELECT * FROM product where (petType='dog'&& proType='bed')";	
if ($r = mysqli_query ($db, $query)) {
 

while ($row = mysqli_fetch_array ($r)) {		 

print'<form action="dogpro.php" method="post">
<div class="col-xs-12 col-md-4">
	<div class="prod-info-main ">
		<div class="row">
				<div class="col-md-6 col-xs-12">
				<img src= "'.$row['image'].'"class="img" > 
				</div>
				<div class="col-md-6  col-xs-12">
				
					<p class="name">'.$row['name'].' <br></p>
					<p class="price-container">'.$row['price'].'RS <br></p>
					<p class="description">'.$row['description'].'</p>
					<input name="quantity" type="number" value="1"  min="1" max="10"/>
					<input type="hidden" name="hidden_id" value="'.$row['id'].'"/>
					<input type="hidden" name="hidden_name" value="'.$row['name'].'"/>
					<input type="hidden" name="hidden_image" value="'.$row['image'].'"/>
					<input type="hidden" name="hidden_price" value="'.$row['price'].'"/>
				    <input type="submit" name="add_to_cart" value="Add to cart" class="submit_btn2" />
				
			</div>
		</div>
	</div>
</div>
</form>';


}


} 
else { 
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 


?>
</div>




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