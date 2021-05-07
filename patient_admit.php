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
		<h2 align='center'> - Admisssion Process - </h2> 
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
 


$name = $_POST['name']; 
$did = $_POST['did']; 
$sex = $_POST['sex']; 
$cno = $_POST['cno']; 
$add = $_POST['add']; 
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

$q = mysqli_query($link, "SELECT MAX(P_ID) FROM patient");
if($q == FALSE)
	echo mysqli_error() . '<br>';
else{
	$row = mysqli_fetch_array($q);
	$val =  $row[0] + 1;
}

//echo "ID generated as " . $val . "  " . date('Y-m-d');

$current_date = date("Y-m-d h:m:s");

$pdq = mysqli_query($link, "INSERT INTO doctor_attendee VALUES ($val, $did)");
if($pdq == FALSE) 
	echo mysqli_error($link) . '<br>'; 
else {
	//echo "Inserted in doctor_attendee table.";
}


/*$query = "UPDATE patient
SET DATE_DISCHARGED = $current_date
WHERE P_ID = $pid"; 
*/$query = "INSERT INTO patient VALUES ($val,'$name','$sex', '$add', '$current_date', null, $cno)"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else {
echo '<h2><center>Patient admitted successfully!!!</center></h2> '; 
}
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