<?php
  session_start();

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if (isset($_SESSION['email']))  {
	
if (isset ($_POST['back'])) {
		header("location: user.php");
}
if (isset ($_POST['addpet'])) {
	
	$petname=$_POST['petname'];
	$birhday=$_POST['birhday'];
	$description =$_POST['description'];
	$email=$_SESSION['email'];
	
	$errors=array();
	//connect to sql database
	$email=$_SESSION['email'];
    $cust_id=$_SESSION['cust_id'];
	$db = @mysqli_connect ('localhost', 'root', 'password');	
	@mysqli_select_db ($db, 'mypet') ;

	//ensure field are true
	
	//ensure field are true
$img=$_FILES['image']['tmp_name'];
	if(!empty($img)){	

	$newPath="./pet/{$_FILES['image']['name']}";

	if (move_uploaded_file ($img, $newPath)) {
	print"don";   

	}
	else{   echo '<script>alert("can not upload image")</script>';  	

	}
	}else{array_push($errors, "Enter pet image please");}

	if(empty($petname)){
		array_push($errors, "Enter pet name please");
	}
	if(empty($birhday)){
		array_push($errors, "Enter pet birhday please");
	}
	
    if(empty($description)){
		array_push($errors, "Enter description please");
	}
	

if(count($errors)==0){
	
		$query = "INSERT INTO petinfo (cust_id ,petname ,birhday  ,description ,image)
		VALUES( '{$cust_id}','{$petname}','{$birhday}','{$description}','{$newPath}')";
		if (@mysqli_query ($db, $query)) {		

echo '<script>alert("The pet has been successfully added")</script>';
		
		header("location: user.php");
		
		}
		else {		
print "<p>Could not add the entry because: <b>" . mysqli_error($db) . "</b>. The query was $query.</p>";

}
	
}
mysqli_close($db);
}
}
			
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Pet</title>
<link rel="stylesheet" type="text/css"
      href="myStyle.css"></link>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <link rel="stylesheet" type="text/css" href="style.css" />
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="keywords" content="BRR pharmacy"/>


<style>



 
.img {
   
   
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
<!-- start menu above -->
<div class="abov">

<div class="liftc">

<?php //will appear if the user log in
if (isset($_SESSION['email']))  {
$userImage=$_SESSION['img'];
print'<input type="submit" name="addPet" value="Add Pet" alt="" id="submit_btn" class="img" />';
print"<a href='user.php'><img src= '$userImage' style='width: 40px;height: 40px'class='img'>
</a> ";

echo $_SESSION['fname'];	

print '&nbsp  &nbsp'; 

 echo $_SESSION['lname'];
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
  print '&nbsp  &nbsp  &nbsp'; 

?> 

<?php
print '<a href="logout.php">
<img src= "image/logout-256.png" style="width: 45px; height: 40px"; float:left"; />
</a>';


}
?>
<!-- user -->







</div>

  <img src="../image/logo.png" style="width: 400px;
    height: 294px"/>
  <MARQUEE class="MARQUEE"><img src="../image/tumblr_mr64nbkVo61sxo5z7o3_500.gif" style="width: 398px;
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
  <center>
<div class="sign">
          <center>
		<form action="addpet.php" method="post" enctype="multipart/form-data">
		<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
		<h1>Add Your Pet </h1>
          <br /><br />
		
 
        <br /><br />
		<input type="file" name="image" /><br /><br />

		Pet Name: <input type="text" name="petname" size="20" placeholder="Name"/><br /><br />
		
		Brithday:&nbsp &nbsp &nbsp <input type="date" name="birhday" /> <br /><br />
		
		 <textarea  rows="4" cols="30" name="description"placeholder="Description here..."></textarea><br /><br />

		<input type="submit" name="addpet" value="Add Pet" id="submit_btn"/>
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