<!DOCTYPE html>
<html>
<head>
	<title>Medicines</title>
	<link rel="stylesheet" type="text/css" href="mai_css.css">
	<link rel="icon" href="fav.png" type="image/gif" >

</head>
<body>
	

<?php 
session_start(); 

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

	echo "<header>
			<h1> - Medicines - </h1>
		</header>
		<nav>
			<a href='main.php'>Home</a>
		<a href='p_record.php'>Patients</a>
		<a href='main_doc.php'>Doctors</a>
		<a href='main_room.php'>Rooms</a>
		<a href='med.php'>Medicine</a>
		<a href='staff.php'>Staff</a>
		<a href='log_out.php'>Log Out</a>
</nav>


		<center>

		<div class = 'icons'>
		

		<a href='med_available.php'>
		<div class='box' class='up'>
		<center>
		<img src='p_icon.png'>
		<h3>Medicine Available</h3></center>
		</div></a>


		<a href='med_new.php'>
		<div class='box' class='up'>
		<center>
		<img src='p_dis.png'>
		<h3>Introduce New</h3>
		</center>
		</div></a>


		

		</div> 


		</center>             
		";
} else{ 
	header('location:login_form.php'); 
	exit(); 
} 
?>


</body>
</html>

