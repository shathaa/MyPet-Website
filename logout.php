<?php
    session_start();

?>
<!DOCTYPE html>
<head>	
<title>sesstion</title>
</head>

<body>
 <?php 
    unset ($_SESSION['email']);
	unset ($_SESSION['password']);
	unset ($_SESSION['first_name']);
	unset ($_SESSION['last_name']);
	
	session_destroy();
	
    header("location:index.php");
     
?>
</body>
</html>