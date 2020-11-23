<?php

extract($_POST);

$servername = "localhost";
$username = "review_site";
$password = "password";
$db = "c4dfed";

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
$sql = "USE $db";
mysqli_query($conn, $sql);
/* sql to create table */
$sql = "CREATE TABLE AdminTable
(
ID int NOT NULL AUTO_INCREMENT,
FullName varchar(50),
AdminName varchar(50),
Email varchar(50),
Contact varchar(50),
CityAddress varchar(50),
PRIMARY KEY (ID)
)"; 

if ($conn->query($sql) === TRUE) {
    echo "Table AdminTable created successfully";
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
echo $fullname; 
echo "<br>";
echo $adminname;
echo "<br>";
echo $email;
echo "<br>";
echo $contact;
echo "<br>";
echo $address;
echo "<br>";

$query="insert into AdminTable(FullName,AdminName,Email,Contact,CityAddress) values('$fullname','$adminname','$email','$contact','$address')";
mysqli_query($conn,$query);

echo "<br><br><br>Your Login ID  $adminname Created Sucessfully";
echo "<br>Please Login using your Login ID to review slot bookings";
echo "<br><a href=index.php>Login</a>";

// Redirect to login page.
header("Location: adminlogin.php"); 
exit;

?>
