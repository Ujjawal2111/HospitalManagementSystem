<!DOCTYPE html>
<html>
<head>
	<title>Admission Processs</title>
	<link rel="stylesheet" type="text/css" href="mai_css.css">
	<link rel="icon" href="fav.png" type="image/gif" >

</head>
<body>



<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

echo "
	<header>
		<h2 align='center'> - Discharging - </h2> 
	</header>
	
	<nav>
		<a href='main.php'>Home</a>
		<a href='p_record.php'>Patients</a>
		<a href='main_doc.php'>Doctors</a>
		<a href='main_room.php'>Rooms</a>
		<a href='med.php'>Medicine</a>
		<a href='staff.php'>Staff</a>
		<a href='log_out.php'>Log Out</a>
</nav>";

if ($_POST['submit'] == 'submit'){

$validationFlag = true; 
  
$pid = $_POST['pid']; 
//echo "Data read successfully!!!!";
if($validationFlag){ 
$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
$db = mysqli_select_db($link,'hospital_management'); 
if(!$db){ 
die("Unable to select database"); 
} 


$current_date = date("Y-m-d h:m:s");


$query = "UPDATE patient SET DATE_DISCHARGED = '$current_date' WHERE P_ID = $pid";  
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else {
echo '<h2><center>Patient Disharged!!!</center></h2> '; 
}

$query = "DELETE FROM room_assigned WHERE P_ID = $pid";  
$results = mysqli_query($link,$query); 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 

} 
} 
 
// Code to be executed when 'Update' is clicked. 
 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>


</body>
</html>