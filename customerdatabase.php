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

$sql = "DROP DATABASE customer";
mysqli_query($conn, $sql);
/* Create database*/
$sql = "CREATE DATABASE customer";
if (mysqli_query($conn, $sql)) {
    echo "Database customer created successfully";
}
else
{
    echo "Error creating database: " . mysqli_error($conn);
}
$sql = "USE customer";
mysqli_query($conn, $sql);
/* sql to create table */
$sql = "CREATE TABLE CustomerTable
(
ID int NOT NULL AUTO_INCREMENT,
FullName varchar(50),
CustomerName varchar(50),
Email varchar(50),
Contact varchar(50),
CityAddress varchar(50),
PRIMARY KEY (ID)
)"; 

if ($conn->query($sql) === TRUE) {
    echo "Table CustomerTable created successfully";
}
 else {
    echo "Error creating table: " . $conn->error;
}

// mysqli_close($conn);
// 
// $rs=mysqli_query($conn,"select * from customer where login='$username'");
// if (mysqli_num_rows($rs)>0)
// {
// 	echo "<br><br><br><div class=head1>Login Id Already Exists</div>";
// 	exit;
// }
echo $fullname; 
echo "<br>";
echo $customername;
echo "<br>";
echo $email;
echo "<br>";
echo $contact;
echo "<br>";
echo $address;
echo "<br>";

$query="insert into CustomerTable(FullName,CustomerName,Email,Contact,CityAddress) values('$fullname','$customername','$email','$contact','$address')";
mysqli_query($conn,$query);

echo "<br><br><br>Your Login ID  $customername Created Sucessfully";
echo "<br>Please Login using your Login ID to review slot bookings";
echo "<br><a href=index.php>Login</a>";

// Redirect to login page.
header("Location: customerlogin.php"); 
exit;

?>
