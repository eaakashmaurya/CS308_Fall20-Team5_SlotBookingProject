<!DOCTYPE html>
<html>

  <head>
    <title> Admin | Slot Booking Project </title>
  </head>

  <!-- <link rel="stylesheet" type = "text/css" href ="css/adminlogin.css"> -->
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  
  

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
    <div class="collapse navbar-collapse " id="myNavbar">
      	<ul class="nav navbar-nav">
	    	<li class="active" ><a href="index.php">Home</a></li>
	  	</ul>
    </div>
</nav>
<body><br>
<br>
<br><br>
<p class="active"><b> Show all requests here </b></p>
</body>
<footer class="container-fluid bg-4 text-center">
<br>
<p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
<br>
</footer>
</html>
