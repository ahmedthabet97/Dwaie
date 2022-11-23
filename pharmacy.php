<?php
include_once 'database.php';
session_start();
if (isset($_GET['email'])) {
	$_SESSION['email']=$_GET['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dwaaie</title>
<style type="text/css">
	body{	 /* The image used */
    background-image: url("ph.jpg");
    background-size: cover;
    text-align: center;
		}
		table{
			margin-left: 500px;
			border: 3px solid #000066;

		}
		.head{
			height: 30px;
			width: 100%;
			background: black;
			font-size: 30px;
			text-align: right;
		}
</style>
</head>
<body>
	<div class="head">
	<a href="index.php">log out</a>
</div>
<?php
$name=$_SESSION['email'];
$sql = "SELECT * FROM Drugs where id_P='$name'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
	<table border="2">
			<tr>
			<th>name Drugs</th>
			<th>delete</th>
		</tr>
		<?php
		while ($row = $result->fetch_assoc()) {
		?>
		<form method="post">
		<tr>
			<td><?php echo $row['name'];?></td>
			<input type="hidden" name="hid" value=<?php echo $row['id_P'];?>>
			<input type="hidden" name="name" value=<?php echo $row['name'];?>>
			<td><input type="submit" name="del" value="delete"></td>
		</tr>
		</form>
		<?php
	}}
		?>
	</table>
<h1><?php echo $_SESSION['email'];?></h1>
<form method="post" >
	name Drugs<input type="text" name="named">
	<br>
	<br>
	<input type="submit" name="submit" value="add">
</form>
</body>
</html>
<?php
include_once 'database.php';
if (isset($_POST['submit'])) {
	$namep=$_SESSION['email'];
	$named=$_POST['named'];
	$conn->query("insert into Drugs values('$namep','$named')");
	header("location:pharmacy.php?email=$namep");
}
if (isset($_POST['del'])) {
	$name=$_POST['name'];
	$id_P=$_POST['hid'];
	$conn->query("delete from drugs where id_P='$id_P' and name='$name'");
	header("location:pharmacy.php?email=$id_P");
}
?>