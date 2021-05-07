

<?php 
if ($_POST['submit'] == 'Login'){ 
//Collect POST values 
$login = $_POST['login']; 
$password = $_POST['password'];
if($login && $password){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link) { 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'hospital_management'); 
if(!$db) { 
die("Unable to select database"); 
} 
//Create query (if you have a Logins table the you can select login id and password from there)
//Execute query 
//Check whether the query was successful or not 
if($login == 'hospital' && $password =='1234'){ 
$count = 1; 
//} 

}
else{ 
//Login failed 
include('login_form.php'); 
echo '<center><b>Incorrect Username or Password !!!</b><center>';

echo "inside else"; 
exit(); 
} 
//if query was successful it should fetch 1 matching record from the table. 
if( $count == 1){ 
//Login successful set session variables and redirect to main page. 
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_ID'] = $login; 
header('location:main.php'); 
} 
else{ 
//Login failed 
include('login_form.php'); 
echo '<center><b>Incorrect Username or Password !!!</b><center>'; 
exit(); 
} 
} 
else{ 
include('login_form.php'); 
echo '<center><b>Username or Password missing!!</b></center>'; 
exit(); 
} 
} 
else{ 
header("location: login_form.php"); 
exit(); 
} 
?>
