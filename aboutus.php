<?php
session_start();
?>

<html>

  <head>
    <title> About | Slot Booking Project  </title>
  </head>
  <!-- added styles -->
  <link rel="stylesheet" type = "text/css" href ="css/aboutus.css">
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
          
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          	<ul class="nav navbar-nav">
        <!-- added home and Contactus  -->
				<li class="active" ><a href="index.php">Home</a></li>
				
				<li><a href="contactus.php">Contact Us</a></li>

          	</ul>
            <ul class="nav navbar-nav navbar-right">
				

      </div>
</nav>


    
    <h1><strong> ABOUT US </strong></h1>
 
    

    <div class="col-xs-12 line"><hr></div>
    <div class="paragraph3" >
    <!-- <div class="missionbox"> -->
      <!-- <div class="missionfont"> -->
     
      <b> VISION of C4DFED Facility @ IIT Mandi</b><br><li text-align="left">
    A World-Class Dynamic Infrastructure and Toolset  for Next Generation Integrated Circuits (IC’s) & Electronic Device Design & Fabrication Research and also technology development focusing  Semiconductor Industries.<br>
    <li style="text-align: center;">
The School of Computing and Electrical Engineering (SCEE), School of Engineering (SE) and School of Basic Sciences (SBS) currently have established diverse expertise and research projects and various program in this area as well others related area. 
This centre will provide the state of art infrastructure, fulfilling the research needs for IIT Mandi research community and also build a network of faculties & researchers working in the electronic device design & fabrication field that can sustain
 these activities and foster growth in an advanced area with broad participation or attaining its objective.
<br><li style="text-align: center;">
Industrial interactions will be an important focus.
<br><li style="text-align: center;">
A Regional Center is envisaged. and manpower development through outreach is one of the major objectives.
<br><li style="text-align: center;">
Vision of the centre is in line and synchronizes well with the vision of IIT Mandi : “To be a Leader in science and technology education, knowledge creation and innovation”
<br><li style="text-align: center;">
This is within the ambit of the Make in India Advanced Manufacturing National and State policies.

<br>
    <!-- </div> -->
     
    <!-- </div> -->
    
  </div>   
  <div class="col-xs-12 line"><hr></div>
    <div class="paragraph3"> 

<b> Mission of C4DFED Facility @ IIT Mandi</b><br>

<li>Creation of a centralized state of the art infrastructure facility for next generation integrated circuits (IC’s)/electronic device design & fabrication and also futuristic materials research for semiconductor industries.
<br></li>
<li>
Develop and sustain educational resources and a skilled workforce for semiconductor industries through the team efforts.
<br></li>
Foster collaboration with industries and transfer of new technologies into products for commercial and public benefits .
<br><li>
To initiate an interdisciplinary MS (Research), M.Tech and PhD program.
<br><li>
Outreach training programme for undergraduates, post graduate and teachers & researchers of neighbouring institutes.
<br><li>
A REGIONAL FACILITY in North India / NATIONAL facility with access to universities and academic institutions as well as industry.
<br>
</div>
  
         </body>

         <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Slot Booking Project 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>