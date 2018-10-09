<!DOCTYPE html>
<head>
<title>Category Search</title>
</head>
<font color = "black", font size = "4">
<h1> Category Search Results </h1>
<?php 
$hostname="localhost"; 
$username="5717G7";  
$password="group7";       
$dbname = "5717G7";

$conn = mysqli_connect($hostname, $username, $password,$dbname);
if (!$conn) {
die("Error: Could not connect to database ".mysqli_connect_error());
}
echo ("Connected successfully to the database.<br>");
echo PHP_EOL;

if (!$_POST['cat_name']) {
echo 'You have not entered search details. Please go back and try again.';
exit;
}


$sql="SELECT * FROM CATEGORY, FORUM WHERE FORUM.FORUM_CAT = CATEGORY.CAT_ID AND CAT_NAME LIKE '%" . $_POST['cat_name'] . "%' ";

$result = $conn->query($sql);


$num_results = $result->num_rows;
echo "<p>Number of results found: ".$num_results."</p>";

for ($i=0; $i <$num_results; $i++){
	$row = $result->fetch_assoc();
	echo  '<br>Category name: '.$row['CAT_NAME'];
	echo '<br>Category Description: '.$row['CAT_DESP'];
	echo  '<br>Forum Name: '.$row['FORUM_NAME'];
	echo  '<br>Forum Url: '.$row['FORUM_URL'];
	echo  '<br>';
}	
?>
</body>
</html>