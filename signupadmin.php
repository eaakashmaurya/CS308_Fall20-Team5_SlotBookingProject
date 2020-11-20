<!DOCTYPE HTML>
<html>
<head>
<title>Admin Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

extract($_POST);

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

// mysqli_close($conn);
// 
// $rs=mysqli_query($conn,"select * from admin where login='$username'");
// if (mysqli_num_rows($rs)>0)
// {
// 	echo "<br><br><br><div class=head1>Login Id Already Exists</div>";
// 	exit;
// }
$query="insert into AdminTable(fullname,username,email,contact,address) values('$fullname','$username','$email','$contact','$address')";
$rs=mysqli_query($conn,$query);
echo "<br><br><br><div class=head1>Your Login ID  $username Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";
echo "<br><div class=head1><a href=index.php>Login</a></div>";


?>
</body>
</html>