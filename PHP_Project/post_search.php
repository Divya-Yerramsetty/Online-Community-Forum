<!DOCTYPE html>
<head>
<title>Search_Results</title>
</head>
<font color = "black", font size = "4">
<h1> Post Search Results </h1>
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

if (!$_POST['search_term']) {
echo 'You have not entered search details. Please go back and try again.';
exit;
}


$sql="SELECT * FROM FORUM, POST WHERE POST.POST_BY = FORUM.FORUM_BY AND  POST_CONTENT LIKE '%" . $_POST['search_term'] .  "%' ";

$result= $conn->query($sql);

while($row = $result->fetch_Assoc()){
	echo  '<br>Forum name: '.$row['FORUM_NAME'];
	echo  '<br>Forum Url: '.$row['FORUM_URL'];
	echo  '<br>Post Content: '.$row['POST_CONTENT'];
	echo  '<br>Post Ans Url: '.$row['POST_ANS_URL'];
	echo  '<br>';
}	
?>
</body>
</html>