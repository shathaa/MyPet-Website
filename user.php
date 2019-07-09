<?php
session_start();
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($dbc = @mysqli_connect ('localhost', 'root', 'password'));	
	if (!@mysqli_select_db ($dbc, 'mypet')) ;

	$email=$_SESSION['email'];
	$cust_id=$_SESSION['cust_id'];

//update user info
if (isset ($_POST['submit'])) {
	
	$emailnew=$_POST['email'];
	$fname=$_POST['firstName'];
	$lname=$_POST['lastName'];
	$phone=$_POST['phoneNum'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	//$city=$_POST['city'];
	$img=$_FILES['profileimg']['tmp_name'];
	if(!empty($img)){	
		
	 $newPath="./user/{$_FILES['profileimg']['name']}";
	 
	if (move_uploaded_file ($img, $newPath)) {
		$_SESSION['img']=$newPath;
		$query = "UPDATE cust_info SET img='$newPath' WHERE email='$email'";	
		 mysqli_query ($dbc, $query);
	  }
	  else{   echo '<script>alert("can not upload image")</script>';  	

	}
	}
//update email
	if(!empty($emailnew)){
	
	$query = "UPDATE cust_info SET email='{$emailnew}' WHERE email='{$email}'";	
    if(mysqli_query ($dbc, $query)){
	
		$email=$_POST['email'];
	}else{echo '<script>alert("The email is exist")</script>';}
}

if (isset ($_POST['My Oreders'])) {
 header("location:orders.php");	
	
}
// update name

if(!empty($fname)&&!empty($lname)){
	
	$query = "UPDATE cust_info SET first_name='{$fname}',last_name= '{$lname}' WHERE email='{$email}'";	
    if(mysqli_query ($dbc, $query)){
		$_SESSION['fname']=$fname;
	    $_SESSION['lname']=$lname;
	}
}
//phone number
if(!empty($phone)){
	
	$query = "UPDATE cust_info SET phoneNum='{$phone}' WHERE email='{$email}'";	
    if(mysqli_query ($dbc, $query)){
		echo '<script>alert("not phone")</script>'; 
	}
}

//password
if(!empty($password)&&!empty($repassword)&& $password==$repassword){
	
	$query = "UPDATE cust_info SET password='{$password}' WHERE email='{$email}'";	
    if(!mysqli_query ($dbc, $query)){
		echo '<script>alert("not pass")</script>'; 
	}
}

//city
/*if(!empty($city)){
	
	$query = "UPDATE cust_info SET city='{$_POST['city']}' WHERE email='$email'";	
    if(!mysqli_query ($dbc, $query)){
		echo '<script>alert("not city")</script>'; 
	}
}*/


}

//delete pet
if (isset ($_POST['delete'])) {
	
	$pet_id =$_POST["hidden_id"];
	$query="DELETE FROM petinfo WHERE petid ='$pet_id'";
	mysqli_query ($dbc, $query);
}

if (isset ($_POST['addPet'])) {
 header("location:pet.php");	
	
}

			
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Pet</title>
<link rel="stylesheet" type="text/css"
      href="myStyle.css"></link>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <link rel="stylesheet" type="text/css" href="styles.css" />  <!-- الصور المتحركة -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>

.prod-info-main {
    border: 2px solid #d63031;
    padding: 3px;
}
.container1{
    margin-top:180px;
}
.container2{
    margin-top:40px;
}
.container-last{
    margin-bottom: 50px;
}

.name {
    font-size: 18px;
	font-weight: bold;
    font-family: "Times New Roman", Times, serif;

}
.prod-info-main .description {
    font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
}

 
.img {
    width: 180px;
    height: 200px;
    background-repeat: no-repeat;
    background-size: contain;
    border: 2px solid #ff7675;
	float: center:
} 

 
.price-container {
    font-size: 22px;
    font-weight: 300;  
    font-style: oblique;
	
}
 
.img {
    width: 150px;
    height: 150px;
    background-repeat: no-repeat;
    background-size: contain;
    border: 2px solid #833471;
    border-radius: 100px;
	float: 50px;
	
} 

.imga {
    width: 100px;
    height: 100px;
    background-repeat: no-repeat;
    background-size: contain;
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
   
    width:47%;
background-image: url(../image/catba2.png );
    padding: 10px;
	left:0;
	height:915px;
	
	
}
.signba{
	
	 width:65%;
	height:900px;
	
}

th {
 	text-align:center;
	font-family: 'Times New Roman';
	color: #6D214F;
    font-size: 18px;
	padding:10px;
}
tr {
    text-align:center;
	font-family: 'Times New Roman';
	color: #6D214F;
    font-size: 16px;
	padding:10px;

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


	print'<a href="addpet.php"><input type="submit" name="addPet" value="Add Pet" alt="" id="submit_btn" />';
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
<img src= "../image/panier-logo-png.png" style="width: 45px; height:40px; float:left"; />
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
?> 

<?php
print '<a href="logout.php">
<img src= "../image/logout-256.png" style="width: 45px; height: 40px"; float:left"; />
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


 
<div class=" container1 container" >

 <label class="labl" id="MyInformation">&nbsp &nbsp My personal information</label>

<!-- First box start here-->
<div class="col-xs-12 col-md-14">
<?php //select ueser info
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);
// Connect and select.
if ($dbc = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($dbc, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($dbc) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($dbc) . '</b></p>');}	

// Define the query.
$query = "SELECT * FROM cust_info  WHERE cust_id = '$cust_id'";	

if ($r = mysqli_query ($dbc, $query)) {
print"
 <div > 
 <table rules='rows'>  
                          <tr> 
						       <th width='10%'></th>   							   
						       <th width='10%'> Email</th> 
                               <th width='10%'>First Name</th>  
                               <th width='10%'>Last Name</th>  
                               <th width='10%'>Phone </th>  
                              
                               <th width='10%'>Date</th> 
							   
                          </tr> "; 
                          
                         


while ($row = mysqli_fetch_array ($r)) {		 

print"
                          <tr> 
                               <td><img src='{$row['img']}' class='imga'></td>						   						  
                               <td>{$row['email']}</td>  
                               <td>{$row['first_name']}</td>  
                               <td>{$row['last_name']}</td>  
                               <td>{$row['phone_no']}</td>
                               
                               <td>{$row['date']}</td>  
                          </tr>  
          
   </table>
   </div>					 ";
  

}} 
else { // Query didn't run.	
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 
// End of query IF.
?>
<form method="post" action="orders.php">
<center>
<input type="submit" name="My Orders" value="My Orders" alt="" id="submit_btn" /></a>
</center>
</form>


</br>

	
</div><!-- MyInformation -->		  

</div>
<!-- ******************************** -->

<div class=" container2 container" >

 <label class="labl"  id="UpdateInformation">&nbsp &nbsp Update My information</label>
</br></br></br>
<!-- First box start here-->
<div class="col-xs-12 col-md-4">
	
	<!--Update personal information here -->
</div> 

	<center>
 <div class="sign">
</br></br></br></br></br></br></br> </br></br></br></br></br></br></br></br></br></br></br></br>
  <?php //will appear if the user log in
if (isset($_SESSION['email']))  {
$userImage=$_SESSION['img'];
print"<a href='user.php'><img src= '$userImage' style='width: 100px;height: 100px 'class='img'>
</a> ";}?>
 
  <h5 >upload your image</h5>

<form action="user.php" method="post" enctype="multipart/form-data">	
	</br></br>
	<input type="file" name="profileimg" /><br /><br />
<input type="email" name="email" size="20" placeholder="Email"/><br /><br />
		<input type="text" name="firstName" size="20" placeholder="First name"/><br /><br />
		<input type="text" name="lastName" size="20" placeholder="Last name"/><br /><br />
		<input type="text" name="phoneNum" size="20" placeholder="Phone number"/><br /><br />
		<input type="password" name="password" size="20" placeholder="Passward"/> <br /><br />
		<input type="password" name="repassword" size="20" placeholder="Confierm"/><br /><br /></br></br>
	<input type="submit" value="submit" name="submit" id="submit_btn"/>
</form>
	
	</center>

</div><!-- UpdateInformation -->		  


<!-- ******************************** -->
<div class=" container2 container" >

 <label class="labl"  id="MyAnimals">&nbsp &nbsp My Animals</label>


 <?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($dbc = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($dbc, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($dbc) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($dbc) . '</b></p>');}
$email = $_SESSION['email'];
$cust_id=$_SESSION['cust_id'];

$query = "SELECT p.* ,c.email FROM petinfo p  INNER JOIN cust_info c ON p.cust_id=c.cust_id WHERE p.cust_id='$cust_id'";	
if ($r = mysqli_query ($dbc, $query)) {
 

while ($row = mysqli_fetch_array ($r)) {		 

print'<form action="user.php" method="post">
<div class="col-xs-12 col-md-4">
	<div class="prod-info-main ">
		<div class="row">
				<div class="col-md-6 col-xs-12">
				<img src= "'.$row['image'].'"class="img" > 
				</div>
				<div class="col-md-6  col-xs-12">
					<p class="name">Pet Name: '.$row['petname'].' <br>Born in: '.$row['birhday'].' </br>'.$row['description'].'
					</br>to Contact: '.$row['email'].' </p>
					<input type="hidden" name="hidden_id" value="'.$row['petid'].'"/>
				     <input type="submit" name="delete" value="Delete" id="submit_btn" />
			</div>
		</div>
	</div>
</div>
</form>';


}


} 
else { 
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($dbc) . "</b>. The query was $query.</p>");} 

	
?>

</div><!-- MyAnimals -->		  
<form method="post" action="addpet.php">
<center>
<input type="submit" name="addPet" value="Add Pet" alt="" id="submit_btn" /></a>
</center>
</form>
<!-- ******************************** -->

</div>
</br>
	</br>	
	</br>
	</br>
	</br>



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