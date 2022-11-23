<!DOCTYPE html>
<html>
<head>
	<title>Dwaaie</title>
	<style type="text/css">
		.head{
			height: 30px;
			width: 100%;
			background: black;
			font-size: 20px;
			text-align: right;
		}
		form{
			margin-top: 200px;
			margin-left: 480px;
			width: 300px;
			height: 100px;
			border: 10px solid white;
			padding: 10px;
		}
		a{
			color: white;
			text-decoration: none;
			padding-right: 50px
		}
		#home{
			color: green;
			text-decoration: none;
		text-align: left;


		}

		body{
			 /* The image used */
    background-image: url("ph.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
		}
	</style>
</head>
<body>

<div class="head">
	<a href="sing up.php">sing up</a>
	<a href="Search.php">Search</a>
	<a id="home" href="index.php">Dwaaie</a>
</div>
<form method="post">
	 name or email:<input type="text" name="name">
	<br>
	<br>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pass:<input type="password" name="pass">
	<br>
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="logIn" name="submit">
</form>
</body>
</html>
<?php
include 'database.php';
if(isset($_POST['submit']))
{
	$email=$_POST["name"];
	$pass=$_POST["pass"];
	$type="";
		if(logIN($email,$pass))
		{
			if ($type=="pharmacy") {

	header("location:pharmacy.php?email=$email");
}else{
	header("location:users.php?email=$email");
	}
		}else
	echo "<script>
	alert('error pass or email');
	</script>";
		
}
	function logIN($email,$pass){
		global $type,$conn;
	$result = mysqli_query($conn, "select * from pharmacy where pass='$pass' and name='$email'");
	if (mysqli_num_rows($result)== 0) {
		$result = mysqli_query($conn, "select * from users where pass='$pass' and email='$email'");
		if (mysqli_num_rows($result)== 0) {
			return False;
		}else
		{
		$type="users";
		return True;
		
	}
	}else{
	$type="pharmacy";
	return True;
	}
}
?>