<?php
  //include or require takes the code from *.php files to this file
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';

?>
<div class="wrapper">
  <section class="section">
    <div class="container2">
      <div class="row">
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
                <h5>Today and Upcoming Bookings</h5>
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
              <a href="publication_edit.php?id=<?php echo $_SESSION['u_id']; ?>" class="btn1"><i class="fas fa-trophy"></i>&nbsp Add Publication</a>
            <p><span class="grey-text">Delete Publication</span> </p>
          
          </div>

        </li>
      </ul>
    </div>
  </section>
</div>
<?php
  include 'footer.php';
?>
