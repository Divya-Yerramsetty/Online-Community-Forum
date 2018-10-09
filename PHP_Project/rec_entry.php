<!DOCTYPE html>
<head>
<title>Record_entry</title>
</head>
<body>
<h1> Entry results </h1>
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

$sql = "INSERT INTO `USER` (USER_ID, USER_NAME, USER_EMAIL, USER_DATE) VALUES ('".$_POST['user_id']."', '".$_POST['user_name']."', '".$_POST['user_email']."', '".$_POST['user_date']."');							
INSERT INTO `CATEGORY` (CAT_ID, CAT_NAME, CAT_DESP) VALUES ('".$_POST['cat_id']."', '".$_POST['cat_name']."', '".$_POST['cat_desp']."');
INSERT INTO `CREATOR` (CREATOR_ID, CREATOR_NAME) VALUES ('".$_POST['creator_id']."', '".$_POST['creator_name']."');							
INSERT INTO `FORUM` (FORUM_ID, FORUM_NAME, FORUM_URL, FORUM_CAT, FORUM_CREATOR, FORUM_BY) VALUES ('".$_POST['forum_id']."','".$_POST['forum_name']."','".$_POST['forum_email']."','".$_POST['cat_id']."', '".$_POST['creator_id']."','".$_POST['user_id']."');							
INSERT INTO `POST` (POST_ID, POST_CONTENT, POST_ANS_URL, POST_DATE, POST_FORUM, POST_BY) VALUES ('".$_POST['post_id']."','".$_POST['post_content']."','".$_POST['post_url']."','".$_POST['post_date']."','".$_POST['forum_id']."','".$_POST['user_id']."')";							

if (mysqli_multi_query($conn, $sql) === TRUE) {
    echo $conn->affected_rows." new record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
</body>
</html>