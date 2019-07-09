
<?php
session_start();

	if(isset($_SESSION["email"]))
?>		
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Pet</title>
<link rel="stylesheet" type="text/css"
      href="myStyle.css"></link>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <link rel="stylesheet" type="text/css" href="../css/myStyle.css" />
	  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="keywords" content="BRR pharmacy"/>



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
<!---StartCopyHtmlScript|Freewidget4u--->
        <div class="col1">

                        <br>

                        <br>

                        <br>

                        <br>

                        <br>

                        <br>

<!--Start Cuteki Clock Widget v3--><center><div style="width:130px; height:78px; float: inherit;"><script language="javascript">var cutekiWidget=4; var cutekiLeng="en"</script><script type="text/javascript" language="javascript" src="http://www.cuteki.com/widgets/clocks/cuteki-clock_v3.js"></script></div></center><!--End Cuteki Clock Widget v3-->

  <!-- end of sidebar --><!---EndCopyHtmlScript--->
  <!-- end of sidebar --> 

  </div>
     
    <!-- end of colom 1 -->
    <!-- start of culom2 -->
      <div class="col2">
<div class="left">
<center>
<div>
<br/>
<img src="../image/2.png"/>
<img src="../image/1.png"/>
<img src="../image/3.png"/>

</div>
</center>
 <div>

</div>
<br/>
</div>
</div>
<div class="col3">


</div>


</div>  <!-- end of content -->
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