<?php
session_start();
?>


<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home | Slot Booking Project </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type = "text/css" href ="css/index.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>

  </head>

  <body>

  <!--Back to top button..................................................................................-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  <!--Javacript for back to top button....................................................................-->
    <script type="text/javascript">
      window.onscroll = function()
      {
    console.log('Scrolling up')
        scrollFunction()
      };

      function scrollFunction(){
      
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="bookslots.php">Book Slots</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
            <ul class="nav navbar-nav">
        <li class="active" ><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About</a></li>
        <li><a href="contactus.php">Contact Us</a></li>

            </ul>

        <ul class="nav navbar-nav navbar-right">
        
          <li> <a href="customersignup.php"> User Sign-up</a></li>
          <li> <a href="adminsignup.php"> Admin Sign-up</a></li>
                <li> <a href="customerlogin.php"> User Login</a></li>
                  <li> <a href="adminlogin.php"> Admin Login</a></li>
             
            </ul>

          </ul>

      </div>
    </nav>

	<body>

  <h3>
        <p> C4FDED Equipments Slot Booking App WELCOMES YOU! </p>
        <p> IF User is loged in then: The notifications about his requests for booking slots for a user appears here. </p>
        <p> IF Admin is loged in then: The notifications about pending approve booking of slots by admin appears here. </p>
        <p> Else redirected to login/signup page. </p>

          <a href="myorders.php"> My Order History </a> <br> <br>
          <a href="myorders.php"> My Order History </a> <br>
	        <a href="myprofile.php"> My Profile </a> <br>
          <a href="myachievements.php"> My Achievement History </a>
        </h3>    
  
  <!-- <p> Add body here </p> -->
   <h3> LIST OF ITEMS </h3>
   <?php

$hostname = "localhost";
$username = "review_site";
$password = "JxSLRkdutW";
$db = "c4dfed";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

?>

<table border="1" align="center">
<tr>
  <td>S.No</td>
  <td>Equipment</td>
  <td>Make/Model</td>
  <td>Interrnal Academic Users Rate</td>
  <td>External Academic Users Rate</td>
  <td>Industry Users Rate</td>
  <td>Rate Type</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT * FROM equipment")
   or die (mysqli_error($dbconnect));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['ID']}</td>
    <td>{$row['Equipment']}</td>
    <td>{$row['Model']}</td>
    <td>{$row['InternalUsers']}</td>
    <td>{$row['ExternalUsers']}</td>
    <td>{$row['IndustryUsers']}</td>
    <td>{$row['RateType']}</td>

   </tr>\n";

}

?>
</table>
    <br>
    <p>* All slots are per hour basis unless specified for particular instrument</p>
  </body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>
