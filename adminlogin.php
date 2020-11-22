<?php
extract($_POST);

if(isset($submit))
{
    echo $adminname;
    echo "<br>";
    echo $password;
    echo "<br>";
  
  $servername = "localhost";
  $username = "username";
  $password = "password";
  /* Create connection*/
  $conn = mysqli_connect($servername, $username, $password);
  /* Check connection*/
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
	$rs=mysqli_query($conn,"select * from AdminTable where adminname='$adminname' and password='$password'");

	$_SESSION["login"]=$adminname;
}
if (isset($_SESSION["login"]))
{
echo "<h1 align=center>Hye you are sucessfully login!!!</h1>";
header("Location: adminindex.php"); 
// exit;
}
?>

<!DOCTYPE html>
<html>

  <head>
    <title> Admin Login | Slot Booking Project </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/adminlogin.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  
  <body>

  <!--Back to top button..................................................................................-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  <!--Javacript for back to top button....................................................................-->
    <script type="text/javascript">
      window.onscroll = function()
      {
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
              		
            </ul>

      </div>
    </nav>

    <div class="container">
    <div class="jumbotron">
     <h1>Hi Admin,<br> Welcome to <span class="edit"> Slot Booking Project </span></h1>
     <br>
   <p>Kindly LOGIN to continue.</p>
    </div>
    </div>

    <div class="container" style="margin-top: 4%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4">
        
      <div class="panel panel-primary">
        <div class="panel-heading"> Login </div>
        <div class="panel-body">
          
        <form action="" method="POST" >
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Adminname: </label>
            <div class="input-group">
              <input class="form-control" id="adminname" type="text" name="adminname" placeholder="Adminname" required="" autofocus="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
            </span>
              </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
            <div class="input-group">
              <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
              <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
            </span>
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-4">
              <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>

          </div>

        </div>
        <label style="margin-left: 5px;">or</label> <br>
       <label style="margin-left: 5px;"><a href="managersignup.php">Create a new account.</a></label>
       

        </form>

        </div>
        
      </div>
      
    </div>
    </div>
    </body>
    <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>