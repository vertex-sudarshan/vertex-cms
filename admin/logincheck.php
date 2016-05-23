<?php



include("conn.php");





$username=$_POST['username'];
$username = stripslashes($username);
$password = $_POST['password'];
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$md5Password = md5($password);
if($username=="" || $password=="") {
	header("location: index.php?error=1");	
} else {
	$sql=" select * from user where username='$username' and password='$md5Password' ";
	$result = $conn->query($sql);
	
	$num = mysqli_num_rows($result);
	if($num>0) {
		
		$_SESSION["username"]= $username;
		echo $_SESSION["username"];
		header("location: dashboard.php");
		die();	
	} else {
		header("location: index.php?error=1");	
	}
}

?>