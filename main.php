<!DOCTYPE html>
<html>
<head>
	<title>MAIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="mai_css.css">
	<link rel="icon" href="fav.png" type="image/gif" >

		<style type="text/css">
			.box{
				margin-top: 5px;
			}
			
		</style>
</head>
<body>
	

<?php 
session_start(); 

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

	echo "<header>
			<h1> - HOSPITAL - </h1>
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
		


		<a href='p_admit.php'>
		<div class='box' class='up'>
		<center>
		<img src='p_icon.png'>
		<h3>Admit new Patient</h3></center>
		</div></a>


		<a href='genBill.php'>
		<div class='box' class='up'>
		<center>
		<img src='p_dis.png'>
		<h3>Generate Bill </h3>
		</center>
		</div></a>


		<a href='davailable.php'>
		<div class='box' class='up'>
		<center>
		<img src='d_icon.png'>
		<h3>Available Doctors</h3>
		</center>
		</div></a>


		<a href='medStore.php'>
		<div class='box' class='up'>
		<center>
		<img src='med.png'>
		<h3>Medical Store</h3>
		</center>
		</div></a>

				<br/>

		<a href='savailable.php'>
		<div class='box' class='up'>
		<center>
		<img src='staff.png'>
		<h3>Available Staff</h3>
		</center>
		</div></a>


		<a href='e_recruit.php'>
		<div class='box' class='up'>
		<center>
		<img src='recruit.png'>
		<h3> Staff Recruitment</h3>
		</center>
		</div></a>



		<a href='attend.php'>
		<div class='box' class='up'>
		<center>
		<img src='attend.jpg'>
		<h3>Attendance</h3>
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

