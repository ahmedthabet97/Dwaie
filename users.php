<?php
include_once 'database.php';
session_start();
if (isset($_GET['email'])){
	$_SESSION['email']=$_GET['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<style type="text/css">
		body{	 /* The image used */
    background-image: url("ph.jpg");
    background-size: cover;
    text-align: center;
		}
		table{
			margin-left: 500px;
			font-size: 35px;
			border: 3px solid #000066;
		}
		tr,th{
			width: 220px;
			background-color: #e0e0eb;
			border: 3px solid #000066;
		}
		.head{
			height: 30px;
			width: 100%;
			background: black;
			font-size: 20px;
			text-align: right;
		}
		#sub{
			width: 150px;
			color: blue;
			height: 40px;
			border: 3px solid #000066;

		}
		#ser{
			width: 500px;
			height: 40px;
			border: 3px solid #000066;
			text-align: center;
			font-size:32px;
			color: #666699;
		}


	</style>
</head>
<body>
	<div class="head">
	<a href="index.php">log out</a>
</div>
	<h1><?php echo $_SESSION['email']?></h1>
<form method="post">
	<input id="ser" type="text" name="name" placeholder="type your medicine">
	<input id="sub" type="submit" name="submit" value="Search">
</form>
<?php
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$sql = "SELECT * FROM Drugs where name='$name'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		?>
		<table border="2">
			<tr>
			<th>name Drugs</th>
			<th>pharmacy</th>
		</tr>
		<?php
		while ($row = $result->fetch_assoc()) {
	?>
	<tr>
		<td><?php echo $row['name'];?></td>
			<td><?php echo $row['id_P'];?></td>
			
		</tr>
	<?php
		}}}
	?>
</body>
</html>