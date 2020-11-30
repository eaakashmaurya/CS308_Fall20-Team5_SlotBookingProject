<?php
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
                  $sql = "SELECT COUNT(record_status) as sub from `record` WHERE record_status='active' AND user_id='".$_SESSION['u_id']."'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['sub']."</h5>";
                ?>
                <h5>Active</h5>
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
                  $sql = "SELECT COUNT(record_status) as status from `record` WHERE record_status='pending' AND user_id='".$_SESSION['u_id']."'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['status']."</h5>";
                ?>
                <h5>Pending</h5>
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
                  $sql = "SELECT COUNT(record_status) as sub from `record` WHERE record_status='expired' AND user_id='".$_SESSION['u_id']."'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['sub']."</h5>";
                ?>
                <h5>Expired</h5>
              </div>
              <div class="col s6 m6 icon red-text">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card">
            <div class="row">
              <div class="col s6 m6 grey-text">
                <?php
                  $sql = "SELECT COUNT(user_id) as equipment from `record` WHERE user_id='".$_SESSION['u_id']."'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  echo "<h5>".$row['equipment']."</h5>";
                ?>
                <h5>Equipment</h5>
              </div>
              <div class="col s6 m6 icon yellow-text text-darken-2">
                <i class="fas fa-box"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Details information -->
      <ul class="collapsible">
        <li>
          <div class="collapsible-header active blue darken-2 white-text">
            <i class="fas fa-info-circle"></i>&nbsp Booking status
          </div>
          <div class="collapsible-body">
            <table class="responsive-table highlight centered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Price</th>
                  <th>Expected Bill</th>
                  <th>Equipment id</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  $sql = "SELECT * FROM `record` WHERE user_id='".$_SESSION['u_id']."'";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)):
                ?>
                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $row['record_start']; ?></td>
                  <td><?php echo $row['record_end']; ?></td>
                  <td><?php echo $row['record_price']; ?></td>
                  <td>
                    <!-- Modal Structure -->
                    <div id="<?php echo $row['record_id']; ?>" class="modal">
                      <div class="modal-content">
                        <!-- <img class="responsive-img" src="<?php echo '../'.$row['record_item']; ?>" alt="test"> -->
                        <table id="equipmentTable" class="responsive-table">
                        <thead class="blue darken-2 white-text">
                          <tr class="myHead">
                          <th>Equipment Details</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $e_id = $row['equip_id'];
                          // echo "$e_id";
                          $sql = "SELECT * FROM `equipment` WHERE `equip_id`='$e_id'";
                          $result1 = mysqli_query($conn, $sql);
                          
                          $row1 = mysqli_fetch_array($result1);

                      ?>
                      <tr>
                        <td> <?php echo "Booking ID :- "." ".$row['record_id']; ?></td>
                      </tr>
                      <tr>
                        <td> <?php echo "Equipment Name :- "." ".$row1['Equipment']; ?></td>
                      </tr>
                      <tr>
                        <td> <?php echo "Equipment Model :- "." ".$row1['Model']; ?></td>
                      </tr>
                      <tr>
                        <td> <?php if(($_SESSION['u_type'])== "Internal"):  echo "Price for Internal Users :- "." ".$row1['InternalUsers']; ?><?php endif ?></td>
                      </tr>
                      <tr>
                        <td><?php if(($_SESSION['u_type'])== "External"):  echo "Price for External Users :- "." ".$row1['ExternalUsers']; ?><?php endif ?></td>
                      </tr>
                      <tr>
                        <td><?php  if(($_SESSION['u_type'])== "Industry"):  echo "Price for Industry Users :- "." ".$row1['IndustryUsers']; ?><?php endif ?></td>
                      </tr>
                      
                      <tr>
                        <td><?php echo "Rate Type :- "." ".$row1['RateType']; ?></td>
                      </tr>
                      <tr>
                        <td><?php echo "Quantity :- "." ".$row['record_qauntity']; ?></td>
                      </tr>
                      <!-- <tr>
                        <td><?php echo "Usage :- "." ".$row['record_end']-$row['record_start']; ?></td>
                      </tr> -->
                      </tbody>
                      </table>
                    </div>
                    </div>
                    <a class="modal-trigger"  href="<?php echo '#'.$row['record_id']; ?>">View</a>
                  </td>
                  <td><?php echo $row['equip_id']; ?></td>
                  <td><?php echo $row['record_status']; ?></td>
                  <!-- <td><?php echo $row['record_sub']; ?></td> -->
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
            <a href="user_edit.php?id=<?php echo $_SESSION['u_id']; ?>" class="btn1"><i class="fas fa-pencil-alt"></i>&nbsp Edit</a>
          </div>
        </li>
        <li>
          <div class="collapsible-header blue darken-2 white-text">
              <i class="fas fa-trophy"></i>&nbsp Manage Publications
            </div>
            <div class="collapsible-body">
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
