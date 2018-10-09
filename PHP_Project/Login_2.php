
<?php
session_start();
if (isset($_POST['email']) && isset($_POST['psw']))
{
 // if the user has just tried to log in
 $userid = $_POST['email'];
 $password = $_POST['psw'];
 $db_conn = new mysqli('localhost', '5717G7', 'group7', '5717G7');
 if (mysqli_connect_errno()) {
 echo 'Connection to database failed:'.mysqli_connect_error();
 exit();
 }
 $query = 'select EMAIL,PASSWORD from LOGIN '
 ."where EMAIL='$userid' "
 ." and PASSWORD=sha1('$password')";
 $result = $db_conn->query($query);
 if ($result->num_rows >0 )
 {
 // if they are in the database register the user id
 $_SESSION['valid_user'] = $userid;
 }
 $db_conn->close();
}
?>

<?
 if (isset($_SESSION['valid_user']))
 {
 echo 'You are logged in as: '.$_SESSION['valid_user'].' ';
 }
 else
 {
 if (isset($userid))
 {
 // if they've tried and failed to log in
 echo 'Could not log you in.';
 }
 else
 {
 // they have not tried to log in yet or have logged out
 echo 'You are not logged in.';
 }
 ?>
 
<br />
<a href="members_only.php">Members section</a>
</body>
</html> 