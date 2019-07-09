<?php
session_start();
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if ($dbc = @mysqli_connect ('localhost', 'root', 'password'));	
	if (!@mysqli_select_db ($dbc, 'mypet')) ;

	$email=$_SESSION['email'];
	$cust_id=$_SESSION['cust_id'];




			
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
    margin-top:80px;
	margin-bottom: 180px;
}
.container2{
    margin-top:40px;
	margin-bottom: 180px;
}
.container-last{
    margin-bottom: 180px;
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

 <label class="labl" id="MyInformation">&nbsp &nbsp My Oreders</label>

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
	
  $query = "SELECT o.*, c.*, p.id, p.name, p.description, p.petType 
  FROM order_details o INNER JOIN  cust_order c  ON o.ord_id=c.ord_id
  INNER JOIN  product p ON  p.id=o.prod_id 
  WHERE c.cust_id='$cust_id'";	
if ($r = mysqli_query ($dbc, $query)) {
        

print"
 <div > 
 <table rules='rows'>  
                          <tr> 
						       <th width='10%'> ord_id</th>
                               <th width='10%'>product id </th> 
                               <th width='10%'>date </th>  							   
                               <th width='10%'>product name </th>  
                               <th width='10%'>product description </th>
                               <th width='10%'>pet type </th>  							     							   
                               <th width='10%'>quantity </th>  
                               <th width='10%'>price </th>  
                               <th width='10%'>total_price </th>  
                              							   
                          </tr> "; 
                          
                         


while ($row = mysqli_fetch_array ($r)) {		 
foreach($r as $row)  
                               {
print"
                          <tr> 
                               <td>{$row['ord_id']}</td>
                               <td>{$row['prod_id']}</td>  
                               <td>{$row['date']}</td>  
                               <td>{$row['name']}</td>  
                               <td>{$row['description']}</td>
                               <td>{$row['petType']}</td>							   
                               <td>{$row['quantity']}</td>  
                               <td>{$row['price']}</td>  
                               <td>{$row['total_price']}</td>
                               
							   </tr> 
							   ";
							   }
							   

          
  "</table>
   </div>";					 
  

}} 
else { // Query didn't run.	
die ('<p>Could not retrieve the data because: <b>' . mysqli_error($db) . "</b>. The query was $query.</p>");} 
// End of query IF.



mysqli_close($dbc); // Close the database connection.
?>
		</br>

	
</div><!-- MyInformation -->		  
</div></div>

</br>
</div><!-- end of container -->
</body>
</html>