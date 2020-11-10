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
   <div>
          <table>
        <tr>
          <th>SNo.</th>
          <th>Equipment</th>
          <th>Make/Model</th>
          <th>AcademicSubsidized Charges for Internal Users (per hour)</th>
          <th>Charges for External Academic users (per hour)</th>
          <th>Charges for Industry users (per hour)</th>
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
        <tr> 
        <td>7.</td>
          <td>MaskLess Lithography (Exposure only)</td>
          <td>Intelligent Micro Patterning</td>
          <td>200</td>
          <td>500</td>
          <td>1000</td>
        </tr>
        <tr>
          <td>8.</td>
          <td>Optical Lithography</td>
          <td>EV Group</td>
          <td>250</td>
          <td>625</td>
          <td> 1250</td>
        </tr>
        <tr>
          <td>9.</td>
          <td>Stylis Profiler</td>
          <td>AEP Technology</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
          <td>10.</td>
          <td>Optical Profiler</td>
          <td>Bruker</td>
          <td>150</td>
          <td>375</td>
          <td>750</td>
        </tr>
        <tr>
          <td>11.</td>
          <td>RIE</td>
          <td>Planar Tech.</td>
          <td>300</td>
          <td>750</td>
          <td>1500</td>
        </tr>
        <tr>
          <td>12.</td>
          <td>E-Spin</td>
          <td>E-Spin nanotech</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
          <td>13.</td>
          <td>Sputtering</td>
          <td>Advance Process Technology</td>
          <td>400</td>
          <td>1000</td>
          <td>2000</td>
        </tr>
        <tr>
        <td></td>
        </tr>
        <tr>
          <td>14.</td>
          <td>Optical Microscope</td>
          <td>Olympus</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
        <td>15.</td>
          <td>Keithley System with Probe Station</td>
          <td>Keithley</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
          <td>16.</td>
          <td>Glove Box</td>
          <td>SciLab SG1200/750TS</td>
          <td>150</td>
          <td>375</td>
          <td>750</td>
        </tr>
        <tr>
          <td>17.</td>
          <td>Raith EBL (exposure only)</td>
          <td>Raith</td>
          <td>1000</td>
          <td>2500</td>
          <td>5000</td>
        </tr>
        <tr>
          <td>18.</td>
          <td>Thermal Evaporator</td>
          <td>Hind High</td>
          <td>Vacuum</td>
          <td>300 (per run)</td>
          <td>750 (per run)</td>
          <td>1500 (per run)</td>
        </tr>
        <tr>
          <td>19.</td>
          <td>Spin Coater (Controlled atmosphere)</td>
          <td>Laurell</td>
          <td>75 (per sample)</td>
          <td>200(per sample)</td>
          <td>600(per sample)</td>
        </tr>
        <tr>
          <td>20.</td>
          <td>Spin Coater (In air)</td>
          <td>Spectro Spin</td>
          <td>50 (per sample)</td>
          <td>125(per sample)</td>
          <td>250(per sample)</td>
        </tr>
        <tr>
          <td>21.</td>
          <td>Contact Angle</td>
          <td>SEO Phoenix 300 Touch Contact Angle</td>
          <td>50 (per sample)</td>
          <td>125(per sample)</td>
          <td>400(per sample)</td>
        </tr>
        <tr>
          <td>22.</td>
          <td>3D printer</td>
          <td>XYZ Printing Pro</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
          <td>23.</td>
          <td>Electro Chemical Analyzer</td>
          <td>CH Instruments</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
          <td>24.</td>
          <td>Three Zone Furnace1000 °C</td>
          <td>Thermofisher scientific</td>
          <td>100</td>
          <td>250</td>
          <td>500</td>
        </tr>
        <tr>
          <td>25.</td>
          <td>Vacuum Oven</td>
          <td>Nanosemi Technology</td>
          <td>100 (per day)</td>
          <td>250 (per day)</td>
          <td>500 (per day)</td>
        </tr>
        <tr>
          <td>26.</td>
          <td>DI water</td>
          <td>Millipore</td>
          <td>50 (per litre)</td>
          <td>125 (per litre)</td>
          <td>250 (per litre)</td>
        </tr>
        <tr>
          <td>27.</td>
          <td>Clean Lab Space (5’x5’)</td>
          <td>--</td>
          <td>2000 (per day)</td>
          <td>5000 (per day)</td>
          <td>10000 (per day)</td>
        </tr>
      </table>
    </div>
    <br>
    <p>* All slots are per hour basis unless specified for particular instrument</p>
  </body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>
