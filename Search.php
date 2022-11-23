<?php
$type=$_GET['email'];
if ($_GET['type']=="pharmacy") {

	header("location:pharmacy.php?email=$type");
}else{
	header("location:users.php?email=$type");
	}
?>