<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   
    // sql to create table pharmacy
$conn->query("create database if not exists db_pharmacy");
$conn->query("use db_pharmacy");

$sql = "CREATE TABLE IF NOT EXISTS pharmacy (
name VARCHAR(30) NOT NULL PRIMARY KEY,
pass VARCHAR(30) NOT NULL
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS users (
email VARCHAR(30) PRIMARY KEY, 
name VARCHAR(50) NOT NULL,
pass VARCHAR(30) NOT NULL
)";
$conn->query($sql);

 // sql to create table Drugs
$sql = "CREATE TABLE IF NOT EXISTS Drugs(
id_P VARCHAR(50),
name VARCHAR(50) NOT NULL,
FOREIGN KEY (id_P) REFERENCES pharmacy(name)
)";
$sql="INSERT INTO `drugs` (`id_P`, `name`) VALUES (NULL, 'Rivo')";
$sql="INSERT INTO `pharmacy` (`name`, `pass`) VALUES ('abdin2', '')";
$sql="INSERT INTO `users` (`email`, `name`, `pass`) VALUES ('abdin@gmail', 'abdin2', '')";
$conn->query($sql);
?>