<?php
$servername = "localhost";
$username = "username";
$password = "password";
/* Create connection*/
$conn = mysqli_connect($servername, $username, $password);
/* Check connection*/
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DROP DATABASE admin";
mysqli_query($conn, $sql);
/* Create database*/
$sql = "CREATE DATABASE admin";
if (mysqli_query($conn, $sql)) {
    echo "Database admin created successfully";
}
else
{
    echo "Error creating database: " . mysqli_error($conn);
}
$sql = "USE admin";
mysqli_query($conn, $sql);
/* sql to create table */
$sql = "CREATE TABLE AdminTable
(
ID int NOT NULL AUTO_INCREMENT,
FullName varchar(50),
UserName varchar(50),
Email varchar(50),
Contact varchar(50),
CityAddress varchar(50),
PRIMARY KEY (ID)
)"; 

if ($conn->query($sql) === TRUE) {
    echo "Table test created successfully";
}
 else {
    echo "Error creating table: " . $conn->error;
}

mysqli_close($conn);
?>
