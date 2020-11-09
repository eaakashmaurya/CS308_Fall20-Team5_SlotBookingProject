<?php
session_start();
?>


<html>

  <head>
    <title> Home | Slot Booking Project </title>

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
  div class="col-xs-12 line"><hr></div>
  <div class="paragraph3">
    <div class="missionbox">
      <div class="missionfont">      
        <p> C4FDED Equipments Slot Booking App WELCOMES YOU! </p>
        <p> IF User is loged in then: The notifications about his requests for booking slots for a user appears here. </p>
        <p> IF Admin is loged in then: The notifications about pending approve booking of slots by admin appears here. </p>
        <p> Else redirected to login/signup page. </p>

          <a href="myorders.php"> My Order History </a> <br>
          <a href="myachievements.php"> My Achievement History </a>
        </div>
    </div>
  </div>    
  
  <!-- <p> Add body here </p> -->

   <div>
          <table>
        <tr>
          <th>SNo.</th>
          <th>Equipment</th>
          <th>Make/Model</th>
          <th>AcademicSubsidized Charges for Internal Users</th>
          <th>Charges for External Academic users</th>
          <th>Charges for Industry users</th>
        </tr>
        <tr>
          <td>1.</td>
          <td>FESEM</td>
          <td>Zeiss</td>
          <td>750</td>
          <td>1875</td>
          <td>3750</td>
        </tr>
        <tr>
          <td>2.</td>
          <td>HE Ion Microscope</td>
          <td>Orion, Zeiss</td>
          <td>2000</td>
          <td>5000</td>
          <td>10000</td>
        </tr>
        <tr>
          <td>3.</td>
          <td>AFM</td>
          <td>Bruker</td>
          <td>500</td>
          <td>1250</td>
          <td>2500</td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Raith EBL (exposure only)</td>
          <td>Raith</td>
          <td>1000</td>
          <td>2500</td>
          <td>5000</td>
        </tr>
        <tr>
          <td>5.</td>
          <td>Ellipsometer(Data Acquisition)</td>
          <td>Accurion</td>
          <td>500</td>
          <td>1250</td>
          <td>2500</td>
        </tr>
        <tr>
          <td>6.</td>
          <td>Ellipsometer(Modeling & Analysis)</td>
          <td>Accurion</td>
          <td>2500</td>
          <td>6250</td>
          <td>12500</td>
        </tr>
      </table>
    </div>
  </body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>
