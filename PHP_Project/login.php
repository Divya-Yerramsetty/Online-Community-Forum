<?php 



$conn = mysqli_connect('localhost', '5717G7', 'group7', '5717G7');
if (!$conn) {
die("Error: Could not connect to database ".mysqli_connect_error());
}
echo ("Connected successfully to the database");

if(isset($_POST['email'])){
	
	$email =$_POST['email'];
	$psw=$_POST['psw'];
	$query ="select EMAIL,PASSWORD from LOGIN where EMAIL='" . $email . "' and PASSWORD='" . $psw. "' limit 1";
		
		
$result=mysql_query($query);
if(my_sql_num_rows($result)==1){
	echo"you have succesfully logged in";
	Exit();
}
else{
	echo"Please check your credentials";
	exit();
}}
?>
