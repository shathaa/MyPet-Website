<?php
session_start(); 


 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="basket.php"</script>';  
                }  
           }  
      }  
 }
 
 
 if (isset ($_POST['submitOrder'])){
	 
	
   	if ($db = @mysqli_connect ('localhost', 'root', 'password')){		
	if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');
} 
}		 
else {		
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');
}
 $email=$_SESSION['email'];
 $cust_id=$_SESSION['cust_id'];
 
 	 $query5 = "SELECT * FROM cust_address WHERE cust_id=$cust_id";
            if ($r = mysqli_query ($db, $query5)) {
				 $row = mysqli_fetch_array ($r);
				 $address=$row['cust_id']; 

				if($address != $cust_id){
				echo '<script>alert("you do not have an address")</script>';
	            echo '<script>window.location="cust_more.php"</script>';
				}
			    
			else{
				echo '<script>alert("you have an address")</script>';
			    }
			    }
		 if(isset($_SESSION["shopping_cart"])){
            
         		 $order_id=rand(10, 10000);
				 $total_price=0;
	 foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
		     $total_prod=$values["item_quantity"] * $values["item_price"];
			 
		     $query = "INSERT INTO order_details (ord_id , prod_id ,quantity ,price )
		 VALUES('{$order_id}','{$values["item_id"]}','{$values["item_quantity"]}', '{$total_prod}')";
		if( $r = mysqli_query ($db, $query)){
		
			 
		
		   $query = "SELECT  SUM(price) FROM order_details WHERE ord_id=$order_id";	
            if ($r = mysqli_query ($db, $query)) {
                   while ($row = mysqli_fetch_array ($r)) {
					         $total_price=$row['SUM(price)']; 
				   			 


			}	}	
		}
		
		       
	            echo '<script>alert("Thank you we will contact you soon")</script>'; 
	            echo '<script>window.location="basket.php"</script>';
		 			    unset($_SESSION["shopping_cart"][$keys]); 
						
		}
		 				
			    $query4="INSERT INTO cust_order (ord_id, cust_id, date, total_price) 
		 VALUES('{$order_id}','{$cust_id}',NOW(),'{$total_price}')";
		  if ($r = mysqli_query ($db, $query4)) {
			  
		  }

		 
		 } 
      else{ echo '<script>alert("you did not order any item!")</script>';   // قاعدة احاول يتأكد اذا في طلبيه اذا لا تطلع دي الرسالة لكن مازبط:(          
	  echo '<script>window.location="basket.php"</script>';
	  }
		 
 mysqli_close($db);
 }
 
 
 /* } */
 
 /*
 	if ($db = @mysqli_connect ('localhost', 'root', 'password')){		
	if (!@mysqli_select_db ($db, 'mypet')) {
die ('<p>Could not select the database because: <b>' . mysqli_error($db) . '</b></p>');
} 
}		 
else {		
die ('<p>Could not connect to MySQL because: <b>' . mysqli_error($db) . '</b></p>');
}

        $query = "SELECT ord_id, quantity, price FROM order_details WHERE  ord_id= $order_id";
		     if ($r = mysqli_query ($db, $query)) {

			 $total_price =total_price+price;
			  
			    $query1="INSERT INTO cust_order (ord_id, cust_id, date, total_price) 
		 VALUES('{$ord_id}','{$cust_id}',NOW(),'{$total_price}')";
          }
	else {		
print "<p>Could not add the entry because: <b>" . mysqli_error($db) . "</b>. The query was $query.</p>";

}
		 
mysqli_close($db); 
				  

*/
 
 if (isset ($_POST['cancelOrder'])){
	 foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                 
                     unset($_SESSION["shopping_cart"][$keys]);  
                     
                 
           }  
	 echo '<script>alert("your order has been canceled")</script>';
	  echo '<script>window.location="basket.php"</script>';  
 }
?>
<?php 

if (isset ($_POST['logout'])) {	
header ('location:logout.php');
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		






<style>


th {
    background-color: #58B19F;
	 color: white;
}
tr {
	background-color: white;
	color: #6D214F;
    font-size: 18px;
}


.submit_btn2 {
	float: none;
 	height: 32px;
	width: 102px;
	margin-bottom: 70px;
	margin-left: 300px;
    margin-top: 70px;
	padding: 3px 0 5px 0;
	cursor: pointer;
	font-size: 14px;
	font-weight: bold;
	text-align: center;
	vertical-align: bottom;
	white-space: pre;
	color: #6D214F;
	background: url(image/button.png) no-repeat;
	border: none;
	outline: none;
}

submit_btn2:hover {
	color: #ffffff;
	background: url(image/button_hover.png) no-repeat;
}
.img {
   
    border: 2px solid #833471;
    border-radius: 100px;

	
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

.cont{
height:100%; 
width:90%; 
padding-left:140px;
}

.h{
	text-align:center;
	 color: #6D214F;
	 font-family: 'Times New Roman';	
	 font-size:30px;
	 margin-top:40px;
	 
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

print"<a href='user.php'><img src= '$userImage' style='width: 40px;height: 40px'class='img'></a> ";

echo $_SESSION['fname'];	

print '&nbsp  &nbsp'; 

 echo $_SESSION['lname'];
 print '&nbsp &nbsp  &nbsp'; 

}
?>

</div>  
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
<div class="cont">
      
     <h3 class="h">Order Details</h3> 
            <form method="post" action="basket.php"	> 
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  <th width="20%">product image</th> 
                               <th width="20%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="10%">Price</th>  
                               <th width="10%">Total</th>  
                               <th width="10%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  <td><img src= "<?php echo $values["item_image"]; ?>"style="height:150px; width:150px;"></td>
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td><?php echo $values["item_price"]; ?> SR</td>  
                               <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> SR</td>  
                               <td><a href="basket.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                               }  
                          ?>  
                          <tr>  
                               <td colspan="4" align="center" style="font-weight:bold;">Total</td>  
                               <td align="center" style="font-weight:bold;"> <?php echo number_format($total, 2); ?>  SR</td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }else{ echo'You did not add any item to the cart';}  
                  
						  ?>  
                     </table>   
                   <input type="submit" name="submitOrder" value="Confirm Order" class="submit_btn2" />
				   
                   <input type="submit" name="cancelOrder" value="Cancel Order" class="submit_btn2"/>				   
                </div> 
                </form>

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