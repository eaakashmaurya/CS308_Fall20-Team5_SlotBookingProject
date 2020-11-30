<?php
  //include or require takes the code from *.php files to this file
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';

  $msg = $msgClass = '';

  if (filter_has_var(INPUT_POST, 'submit')) {
    // Get form data for equipment
    // filter the special characters from the id and all other
    $recordid = mysqli_real_escape_string($conn, $_POST['recordid']);
    $userid = mysqli_real_escape_string($conn, $_POST['userid']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $achievementtype = mysqli_real_escape_string($conn, $_POST['achievementtype']);
    $details= mysqli_real_escape_string($conn, $_POST['details']);
    $others = mysqli_real_escape_string($conn, $_POST['others']);
    
    // echo "$recordid";
    // echo "$userid";
    // echo "$achievementtype";
    // echo "$details";
    // echo "$others";
    
    // Check if the input is empty
    //if id, name and email .. is not empty then
    if (!empty($recordid) && !empty($userid) && !empty($achievementtype) ) {
      // insert equipment into database
      $sql = "INSERT INTO `achievements` (`record_id`, `user_id`, `achievement_date`,`achievement_type`,`details`,`other`)
      VALUES ('$recordid', '$userid', '$date','$achievementtype','$details','$others');";
      //if it returns some value then success
      if (mysqli_query($conn, $sql)) {
        // Success
        $msg = "Publication added";
        $msgClass = "green";
      }//if it doesnot return some value then error  
      else {
        $msg = "Fail to add publication error: " . $sql . "<br>" . mysqli_error($conn);
        $msgClass = "red";
      }
    } else {
      // failed
      $msg = "Please fill in all fields";
      $msgClass = "red";
    }
  }

?>


<div class="wrapper">
  <section class="section">
    <div class="container2">
      <div class="row">
        <!-- Add publication -->
          <div id="addpublication" class="modal">
            <div class="modal-content">
              <h5>Add Publication</h5>
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           
              <div class="row">
                <div class="input-field col s12">
                  <input id="recordid" type="text" name="recordid">
                  <label for="recordid"> Record ID </label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="userid" type="text" name="userid">
                  <label for="userid"> User Id</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6 m6">
                  <input id="date" type="text" class="datepicker" name="date">
                  <label for="date">Date</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="achievementtype" type="text" name="achievementtype">
                  <label for="achievementtype"> Achievement Type</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="details" type="text" name="details">
                  <label for="details">Details</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="others" type="text" name="others">
                  <label for="others">Others</label>
                </div>
              </div>

              
              <button type="submit" class="btn blue" name="submit">Add</button>
            </form>
          </div>
      <!-- </div> -->
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
      </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="row">
              <div class="col s6 m6 grey-text">
                <?php
                //sql statement to count record status from record where record status is pending
                  $sql = "SELECT COUNT(record_status) as sub from `record` WHERE record_status='pending' AND user_id='".$_SESSION['u_id']."'";
                  //perform query on $sql
                  $result = mysqli_query($conn, $sql);
                  //returns row in an associative array 
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['sub']."</h5>";
                ?>
                <h5>Pending Bookings</h5>
              </div>
              <div class="col s6 m6 icon green-text">
                <i class="fas fa-check"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="row">
              <div class="col s6 m6 grey-text">
                <?php
                  $date = date("Y-m-d");
                  //sql statement to count record status from record where record status is pending
                  $sql = "SELECT COUNT(record_status) as status from `record` WHERE record_status<>'pending' AND user_id='".$_SESSION['u_id']."' AND record_date>=$date";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['status']."</h5>";
                ?>
                <h5>Upcoming Bookings</h5>
              </div>
              <div class="col s6 m6 icon blue-text">
                <i class="fas fa-info-circle"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="row">
              <div class="col s6 m6 grey-text">
                <?php
                  $date = date("Y-m-d");
                  //sql statement to count record status from record where record status is pending
                  $sql = "SELECT COUNT(record_status) as sub from `record` WHERE record_status<>'pending' AND user_id='".$_SESSION['u_id']."' AND record_date<$date";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['sub']."</h5>";
                ?>
                <h5>Previous Bookings</h5>
              </div>
              <div class="col s6 m6 icon red-text">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
            </div>
          </div>
        </div>

      <!-- Detailed information -->
      </div>
      <ul class="collapsible">
        <li>
          <div class="collapsible-header active blue darken-2 white-text">
            <i class="fas fa-info-circle"></i>&nbsp Detailed Bookings
          </div>
          <div class="collapsible-body">
            <table class="responsive-table highlight centered">
              <thead>
                <!-- to represent the following in rows and columns -->
                <tr>
                  <th>#</th>
                  <th>Id</th>
                  <th>Equipment Id</th>
                  <th>User Id</th>
                  <th>Date</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Qauntity</th>
                  <th>Status</th>
                  <th>Bill Ammount</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  //sql statement to select records 
                  $sql = "SELECT * FROM `record` WHERE user_id='".$_SESSION['u_id']."'";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)):
                ?>
                <tr>
                  <!-- to represent to following data cell in table -->
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $row['record_id']; ?></td>
                  <td><?php echo $row['equip_id']; ?></td>
                  <td><?php echo $row['user_id']; ?></td>
                  <td><?php echo $row['record_date']; ?></td>
                  <td><?php echo $row['record_start']; ?></td>
                  <td><?php echo $row['record_end']; ?></td>
                  <td><?php echo $row['record_qauntity']; ?></td>
                  <td><?php echo $row['record_status']; ?></td>
                  <td><?php echo "Rs"." ".$row['record_price']; ?></td>
                  <td><a href="../remarks.php"> view </a></td>
                </tr>
              <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </li>
        <li>
          <div class="collapsible-header blue darken-2 white-text">
            <i class="fas fa-user"></i>&nbsp User profile
          </div>
          <div class="collapsible-body">
            <p><span class="grey-text">Name:</span> <?php echo strtoupper($_SESSION['u_name']); ?></p>
            <p><span class="grey-text">Email:</span> <?php echo $_SESSION['u_email']; ?></p>
            <!-- to edit in user -->
            <a href="user_edit.php?id=<?php echo $_SESSION['u_id']; ?>" class="btn1"><i class="fas fa-pencil-alt"></i>&nbsp Edit</a>
          </div>
        </li>
        <li>
          <div class="collapsible-header blue darken-2 white-text">
              <i class="fas fa-trophy"></i>&nbsp Manage Publications
          </div>
          <div class="collapsible-body">
              <!-- to edit user publication -->
              <div class="col s12 m6">
                <a href="#addpublication" class="btn green modal-trigger">Add Publication</a>
              </div>
              <table class="responsive-table highlight centered">
                <thead>
                  <!-- to represent the following in rows and columns -->
                  <tr>
                    <th>#</th>
                    <th>Publication Id</th>
                    <th>User Id</th>
                    <th>Record Id</th>
                    <th>Achievement Date</th>
                    <th>Achievement Type</th>
                    <th>Details</th>
                    <th>Others</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                    //sql statement to select records 
                    $sql = "SELECT * FROM `achievements` WHERE user_id='".$_SESSION['u_id']."'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)):
                  ?>
                  <tr>
                    <!-- to represent to following data cell in table -->
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $row['achievement_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['record_id']; ?></td>
                    <td><?php echo $row['achievement_date']; ?></td>
                    <td><?php echo $row['achievement_type']; ?></td>
                    <td><?php echo $row['details']; ?></td>
                    <td><?php echo $row['other']; ?></td>
                  </tr>
                <?php endwhile ?>
                </tbody>
            </table>
          
          </div>

        </li>
      </ul>
    </div>
  </section>
</div>
<?php
  include 'footer.php';
?>
