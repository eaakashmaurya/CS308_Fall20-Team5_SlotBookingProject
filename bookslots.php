<?php
session_start();
?>


<html>

  <head>
    <title> Home | Slot Booking Project </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type = "text/css" href ="css/index.css">

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
          <!-- <a class="navbar-brand" href="index.php">Book Slots</a> --> 
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
      
            <h3> IF User is loged in then: The options to request for booking slots for a user appears here. </h3><br>
            <h3> IF Admin is loged in then: The options to approve booking of slots by admin appears here. </h3><br>
            <h3> Else redirected to login/signup page. </h3>
    
  
	</body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>
