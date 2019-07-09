<?php 

if (isset ($_POST['logout'])) {	
header ('location:logout.php');
}
     
?>
<?php
ini_set('display_error',1);
error_reporting (E_ALL & ~E_NOTICE);

if (isset ($_POST['signup'])){
	header("location:signup.php");
}
if (isset ($_POST['submit'])) {
		
	$email=$_POST['email'];
	$password=$_POST['password'];

	$errors=array();
	//ensure field are true
	

	
   

if(count($errors)==0){
	if ($db = @mysqli_connect ('localhost', 'root', 'password')){		
	if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');
}
}		 
else {		
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');
}



		$query = "SELECT cust_id,  first_name, last_name, img FROM  cust_info WHERE (email='$email' && password='$password')";
		 if ($r = mysqli_query ($db, $query)) {
			  while ($row = mysqli_fetch_array($r)) {
                
		if(!empty($_POST["remember"]))   
   {  
    setcookie ("email",$email,time()+ (2*60*60*24));  
    setcookie ("password",$password,time()+ (2*60*60*24));
    $_SESSION["email"] = $email;
   }  
   else  
   {  
    if(isset($_COOKIE["email"]))   
    {  
     setcookie ("email","");  
    }  
    if(isset($_COOKIE["password"]))   
    {  
     setcookie ("password","");  
    }  
   }  

			
		 $cust_id= $row['cust_id'];
		 $dbfname= $row['first_name'];
		 $dblname=$row['last_name']; 
     	 $dbemail=$row['$email'];
		 $dbimg=$row['img'];
		 $dbpassword=$row['$password'];
         
         
		  
           session_start();
		   $_SESSION['cust_id']=$cust_id;
		   $_SESSION['email']=$email;
		   $_SESSION['password']=$password;
           $_SESSION['fname']=$dbfname;
		   $_SESSION['lname']=$dblname;
		   $_SESSION['img']=$dbimg;
		   $_SESSION['loggedin'] = time();

			
	 header("location:index.php");
		 } 	 
		 
	 }
	 else {		
print "<p>Could not add the entry because: <b>" . mysqli_error($db) . "</b>. The query was $query.</p>";

}	
mysqli_close($db);

array_push($errors, "the password or email wrong");	
}
	
}


 ?>


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

<script language="javascript" type="text/javascript" src="mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="slideitmoo-1.1.js"></script>
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
.centered {
    position: absolute;
    top: 100%;
    left: 87%;
    transform: translate(-55%, 850%);

	
}
.centered a:link {
    color: #222f3e;
	font-weight: bold;
    font-size:20px;
	font-family: "Times New Roman", Times, serif;
}

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
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp';
 print '&nbsp  &nbsp  &nbsp'; print '&nbsp  &nbsp  &nbsp'; 

?> 

<?php
print '<a href="logout.php">
<img src= "image/logout-256.png" style="width: 45px; height: 40px"; float:left"; />
</a>';


}
?>



<!-- user -->







</div>
		<!--Start Cuteki Clock Widget v3--><center><div style="width:130px; height:78px; float: left;"><script language="javascript">var cutekiWidget=4; var cutekiLeng="en"</script><script type="text/javascript" language="javascript" src="http://www.cuteki.com/widgets/clocks/cuteki-clock_v3.js"></script></div></center><!--End Cuteki Clock Widget v3-->

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
        <div class="col1">

      <?php 
if (!isset($_SESSION['email']))  
{ 
    print' <div id="sidebar">
        <div class="sidebar_top"></div>
        <div class="sidebar_bottom"></div>
        <div class="sidebar_section">
          <h2>Members</h2>';
		  if(count($errors)>0){
          print'<div class="error">';
        foreach($errors as $error){ 
             echo "$error</div>"; 
		}

		  }?> 
         <form action="index.php" method="post">
	  
     <label>Username</label>
        <input type="text" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" name="email" size="10" class="input_field" />
        <label>Password</label> 
        <input type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" name="password" class="input_field" />
		<br/>
		  Remember me       <input type="checkbox" name="remember" value="remember" <?php if(isset($_COOKIE["remember"])) { ?> checked <?php } ?>  />
		<br/>
        <input type="submit" name="submit" value="Login" alt="Login" id="submit_btn" />
		<input type="submit" name="signup" value="Sign Up" alt="Login" id="submit_btn" />
		

        </form>
        <div class="cleaner"></div>
        </div>


        </div><?php      
} 
  
?>
  <!-- end of sidebar --> 

  </div>
     
    <!-- end of colom 1 -->
    <!-- start of culom2 -->
      <div class="col2">
<div class="left">
<center>
<div>
<br/>
<img src="image/catba.png" style="width: 450px;
    height: 350px"/>

</div>
</center>
 <div>
     <center> <h2>Featured Products</h2></center>
      <div id="SlideItMoo_outer">
        <div id="SlideItMoo_inner">
          <div id="SlideItMoo_items">
            <div class="SlideItMoo_element"> <a href="birdpro.php"> <img src="../image/product_01.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="catpro.php"> <img src="../image/product_02.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="catpro.php"> <img src="../image/product_03.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="catpro.php"> <img src="../image/product_04.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="catpro.php"> <img src="../image/product_05.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="birdpro.php"> <img src="../image/product_06.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="birdpro.php"> <img src="../image/product_07.png" alt="" /></a> </div>
            <div class="SlideItMoo_element"> <a href="birdpro.php"> <img src="../image/product_08.png" alt="" /></a> </div>
          </div>
        </div>
      </div>
    </div>
</div>
<br/>
</div>

<div class="col3">
 <img src="image/222.png" />
 <div class="centered"><a  href="pet.php">  Find ME</a></div>

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
    Copyright &copy; 2019 <a">MY PETS TEAM</a> 
	</div>
  <!-- end of footer -->
</div>
</div><!-- end of container -->
</body>
</html>