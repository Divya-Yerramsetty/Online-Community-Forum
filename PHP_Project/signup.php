<!DOCTYPE html>
<head>
<title>Sign up Form</title>
</head>
<body>
<h1> Signed Up Information</h1>
<?php 
$hostname="localhost"; 
$username="5717G7";  
$password="group7";       
$dbname = "5717G7";

$conn = mysqli_connect($hostname, $username, $password,$dbname);
if (!$conn) {
die("Error: Could not connect to database ".mysqli_connect_error());
}
echo ("Connected successfully to the database");
echo PHP_EOL;

$sql = "INSERT INTO LOGIN (FNAME, LNAME, EMAIL, PASSWORD,REPEAT_PASSWORD) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$_POST['psw']."', '".$_POST['psw-repeat']."')";					

if (mysqli_multi_query($conn, $sql) === TRUE) {
    echo $conn->affected_rows." user is signed up. You can now succesfully login on the login page";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
</body>
