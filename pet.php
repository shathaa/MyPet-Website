<?php
      session_start();	
	
?>


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Pet</title>
<link rel="stylesheet" type="text/css"
      href="myStyle.css"></link>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <link rel="stylesheet" type="text/css" href="style.css" />
	  <link rel="stylesheet" type="text/css" href="styles.css" />  <!-- الصور المتحركة -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="keywords" content="BRR pharmacy"/>

</script>
<!-- سكرتب خاص بالصور المتحركة -->

<script language="javascript" type="text/javascript" src="../scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="../scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="../scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
window.addEvents({
    'domready': function () { /* thumbnails example , div containers */
        new SlideItMoo({
            overallContainer: 'SlideItMoo_outer',
            elementScrolled: 'SlideItMoo_inner',
            thumbsContainer: 'SlideItMoo_items',
            itemsVisible: 5,
            elemsSlide: 3,
            duration: 200,
            itemsSelector: '.SlideItMoo_element',
            itemWidth: 140,
            showControls: 1
        });
    },

});
</script>

<style>



 
.prod-info-main {
    border: 2px solid #d63031;
    padding: 3px;
}
.container1{
    margin-top:180px;
}
.container2{
    margin-top:20px;
	margin-bottom:20px;

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
.error {
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
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
print"<a href='user.php'><img src= '$userImage' style='width: 40px;height: 40px' class='img'></a> ";


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
<center>
       <div class="container container2" >
				

<?php 

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($db = @mysqli_connect ('localhost', 'root', 'password')) {		
if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');	}} 
else {	
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');}
$email = $_SESSION['email'];
$cust_id = $_SESSION['cust_id'];

$query = "SELECT  p.petname ,p.birhday  ,p.description ,p.image ,c.email FROM petinfo p JOIN cust_info c ON p.cust_id=c.cust_id";	
if ($r = mysqli_query ($db, $query)) {
 

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
<center>


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