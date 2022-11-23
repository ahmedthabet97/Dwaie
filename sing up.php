<!DOCTYPE html>
<html>
<head>
	<title>singUp</title>
	<style type="text/css">
		form{
			border: 2px solid black;
			padding: 10px;
			margin-left: 500px;
			margin-top: 100px;
			font-size: 20px;
			width: 300px;
		}
		body{
			 /* The image used */
    background-image: url("ph.jpg");
    background-size: cover;
    color: blue;
		}
		input{
			border: 3px solid black;
			font-size: 20px;
			width: 200px;
		}
		#home{
			font-size: 50px;
			text-decoration:none;
			color:#000099;
			font-family: "Times New Roman", Times, serif;
			margin-left: 20px;
			
		}
	</style>
</head>
<body>
	<a  id ="home" href="index.php">Dwaaie</a>

<form method="post" id="pharmacy">
	<label>sing up as pharmacy </label>
	<br>
	Name:<input type="text" name="namep">
	<br><br>
	Pass:<input type="password" name="passp">
	<br><br>
	<input type="submit" name="singP" value="sing Up">

</form>
<form method="post" id="users">
	<label>sing up as users </label>
	<br>
	Email:<input type="text" name="emailu">
	<br><br>
	LName:<input type="text" name="nameu">
	<br><br>
	Pass:<input type="password" name="passu">
	<br><br>
	<input type="submit" name="singU" value="sing Up">
</form>
<input type="button" id="btn1" value="singUP as pharmacy" onclick="trem('btn1');">
<input type="button" id="btn2" value="singUP as users" onclick="trem('btn2');">
<script type="text/javascript">
	document.getElementById('users').style.display="none";
	document.getElementById('pharmacy').style.display="block";
	function trem(v){
		if (v=='btn1') {
			document.getElementById('users').style.display="none";
			document.getElementById('pharmacy').style.display="block";
		}else
		{
			document.getElementById('users').style.display="block";
			document.getElementById('pharmacy').style.display="none";
		}
	}
</script>
</body>
</html>
<?php
include_once 'database.php';
if (isset($_POST['singP'])) {
	if (!isNameExit($_POST['namep'])) {
		$name=$_POST['namep'];
		$pass=$_POST['passp'];
		$conn->query("insert into pharmacy values('$name','$pass')");
		header("location:Search.php?email=$name&type=pharmacy");
	}else
	echo "<script>
	alert('name is exists');
	</script>";
	
}
if (isset($_POST['singU'])) {
	if (!isEmailExit($_POST['emailu'])) {
		$email=$_POST['emailu'];
		$name=$_POST['nameu'];
		$pass=$_POST['passu'];
		$conn->query("insert into users values('$email','$name','$pass')");
		header("location:Search.php?email=$email&type=users");
	}else
	echo "<script>
	alert('email is exists');
	</script>";
	
}
function isNameExit($name){
	global $conn;
	$result = mysqli_query($conn, "select * from pharmacy where name='$name'");
	if (mysqli_num_rows($result)== 0) {
			return False;
	}
	return True;
	}
	function isEmailExit($email){
	global $conn;
	$result = mysqli_query($conn, "select * from users where email='$email'");
	if (mysqli_num_rows($result)== 0) {
			return False;
	}
	return True;
	}
?>