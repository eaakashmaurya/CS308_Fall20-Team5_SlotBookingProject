 <?php
  session_start();
  //include or require takes the code from *.php files to this file
  include 'navbar.php';
  require 'model/db.php';
?>

<section class="section">

  <div class="container">
    <h5><i class="fas fa-box blue-text"></i> Equipment List</h5>
    <div class="divider"></div><br>

    <div class="row">
      <!-- Equipment icon with number -->
      <div class="col s12 m9">
        <div class="row">
          <?php
            //sql statement to select equipments
            $sql = "SELECT * FROM `equipment`";
            ////perform query on $sql
            $result = mysqli_query($conn, $sql);
            //when the row is equal to the fetched row from result
            while ($row = mysqli_fetch_array($result)):
          ?>
          <div class='col s12 m6'>
            <div class='card'>
              <div class='card-image'>
                <!-- added image  -->
                <img src='img/machine1.jpg' class='responsive-img' alt='equipment'>
              </div>
              <div class='card-action'>
                <!-- input id of the equipment -->
                <input type="hidden" name="id" value="<?php echo $row['equip_id']; ?>">
                <div><?php echo $row['equip_id']; ?></div>
                <div><?php echo $row['Equipment']; ?></div>
                <div><?php echo $row['Model']; ?></div>
                <br>
                  <div class="center">
                    <a href="bookslots.php?id=<?php echo $row['equip_id']; ?>" class="btn blue">Book</a>
                  </div>
              </div>
            </div>
          </div>
          <?php endwhile ?>
        </div>
      </div>

        <div class="row">
          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-info-circle"></i> Notification
            </li>
            <li>
              <!-- link register.php -->
              <p style="padding:0 1em;">Please <a href="register.php">register</a> before making any booking, 
              once booked print the receipt and bring the receipt for payment at counter receptionist.</p>
            </li>
          </ul>
        </div>
        <div class="row">
          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-map-marker"></i> Contact us
            </li>
            <li>
              <img class="responsive-img" src="img/contact_us.jpg" width="200" height="200" alt="contact">
            </li>
            <li>
              <p style="padding:0 1em;">
                <br><br>
                <i class="fas fa-phone"></i>&nbsp;&nbsp;01905 267841<br>
                <!-- email id for C4dfed -->
                <i class="fas fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:c4dfed@iitmandi.ac.in">C4DFED@iitmandi.ac.in</a> <br>
                <i> <a href="contactus.php"> Contact Us </a> </i><br>
                Account Details: <br>
                1) NAME OF ACCOUNT HOLDER: Director, Indian Institute of Technology, MANDI – SRIC, (IIT MANDI – SRIC)<br>
                2) BANK NAME: PUNJAB NATIONAL BANK, IIT KAMAND, MANDI, HP PIN – 175005, Ph. 01905-267094<br>
                3) BANK ACCOUNT NUMBER: 0311000100958570     4) IFS CODE OF THE BRANCH: PUNB0731500<br>
                5) MICR CODE OF BANK: 175024138              6) SWIFT CODE: PUNBINBBPAR
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  include 'footer.php';
?> 