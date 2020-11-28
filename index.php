<?php
  session_start();
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
            $sql = "SELECT * FROM `equipment`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)):
          ?>
          <div class='col s6 m3'>
            <div class='card'>
              <div class='card-image'>
                <img src='img/machine1.jpg' class='responsive-img' alt='equipment'>
              </div>
              <div class='card-action'>
                <input type="hidden" name="id" value="<?php echo $row['equip_id']; ?>">
                <div><?php echo $row['equip_id']; ?></div>
                <!-- <div><?php echo $row['Equipment']; ?></div> -->
                <div><?php echo $row['Model']; ?></div>
                <br>

                <?php if ($row['equip_status'] == 'Available'): ?>
                  <div class="center">
                    <a href="bookslots.php?id=<?php echo $row['equip_id']; ?>" class="btn blue">Book</a>
                  </div>
                <?php else: ?>
                  <div class="center">
                    <a href='' class='btn disabled'>Book</a>
                  </div>
                <?php endif ?>
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
              <p style="padding:0 1em;">Please <a href="register.php">register</a> first before you make any booking, 
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
                <i class="fas fa-phone"></i>&nbsp;&nbsp;+606 555 2000<br>
                <i class="fas fa-phone"></i>&nbsp;&nbsp;+606 331 6247<br>
                <i class="fas fa-envelope"></i>&nbsp;&nbsp;<a href="#">iitmandi.ac.in</a>
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
