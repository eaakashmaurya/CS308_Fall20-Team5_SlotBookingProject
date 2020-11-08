<?php
session_start();
?>

<html>

  <head>
    <title> Contact | Slot Booking Project </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/contactus.css">
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
          <a class="navbar-brand" href="index.php">Book Slots</a>
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


		  
      </div>
    </nav>
    <br>

    <div class="heading">
     <strong>Want to contact <span class="edit"> Us </span>?</strong>
     <br>
    Here are a few ways to get in touch with us.
    </div>

    <div class="col-xs-12 line"><hr></div>

    <div class="container" >
    <div class="col-md-5" style="float: none; margin: 0 auto;">
      <div class="form-area" ">
        <form role="form">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Contact Form</h3>

          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>

          <div class="form-group">
           <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
           <span class="help-block"><p id="characterLeft" class="help-block">Max Character length : 140 </p></span>
          </div> 
          <button type="button" id="submit" name="submit" class="btn btn-primary pull-right"> Submit Form</button>    
        </form>

        
      </div>
    </div>
      
    </div>

<div class="paragraph1">

    <p><h3>We are here to answer any queries you may have about our <font color="green"><strong>Slot Booking Tool</strong></font>. Reach out to us and we will respond as soon as we can.</h3></p>
        <p><h3>Even if there is something you always wanted to use and couldn't find it here <font color="green"><strong></strong></font>in the list, please do let us know and we here at <font color="green"><strong>Management Team promise to do our best to give you best service.</strong></font> </h3></p>
        <p><b><h3>Contact Details of Team Equipment Project are given below.</h3></b></p>
        <p class="edit2">
        
        <strong>Email      :</strong>  <a href="slotbooking@iitmandi.ac.in">slotbooking@iitmandi.ac.in</a>
        |
        <strong>Telephone  :</strong>  9898989898        
        </p>
        <p class="edit2"><strong>Get in touch with us on Social Media.</strong></p>
       
</div>
     </body>

     <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>
