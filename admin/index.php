<?php
  session_start();
  include 'navbar.php';
  require 'session.php';

?>
<div class="wrapper">
  <section class="section">
    <div class="container2">
      <h5><i class="fas fa-tachometer-alt"></i> Dashboard</h5>
      <div class="divider"></div><br>

      <!-- info bar -->
      <div class="row">
        <div class="col s12 m3">
          <div class="card center">
            <div class="row">
              <div class="col s6 icon">
                <i class="far fa-user blue-text"></i>
              </div>
              <div class="col s6 grey-text text-darken-1">
                <h4>
                  <?php
                    $sql = "SELECT COUNT(user_id) AS total FROM `user`";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['total'];
                  ?>
                </h4>
                <p>Total user</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card center">
            <div class="row">
              <div class="col s6 icon">
                <i class="fas fa-shopping-cart blue-text"></i>
              </div>
              <div class="col s6 grey-text text-darken-1">
                <h4>
                  <?php
                    $sql = "SELECT COUNT(record_status) AS status FROM record WHERE record_status='pending'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['status'];
                  ?>
                </h4>
                <p>Pending Bookings</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card center">
            <div class="row">
              <div class="col s6 icon">
                <i class="fas fa-check blue-text"></i>
              </div>
              <div class="col s6 grey-text text-darken-1">
                <h4>
                  <?php
                    $sql = "SELECT COUNT(record_status) as sub FROM record WHERE record_status<>'pending'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['sub'];
                  ?>
                </h4>
                <p>Completed Bookings</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="card center">
            <div class="row">
              <div class="col s6 icon">
                <i class="fas fa-box blue-text"></i>
              </div>
              <div class="col s6 grey-text text-darken-1">
                <h4>
                  <?php
                    $sql = "SELECT COUNT(equip_id) as total FROM equipment";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['total'];
                  ?>
                </h4>
                <p>Equipments</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m9">
          <h5>Quicklinks</h5>
          <div class="row">
            <div class="col s12 m4">
              <a href="records.php">
                <div class="card center">
                  <div class="row">
                    <div class="col s6 icon">
                      <i class="fas fa-book blue-text"></i>
                    </div>
                    <div class="col s6 grey-text text-darken-1">
                      <h4>
                        <?php
                          $sql = "SELECT COUNT(record_id) as total FROM record";
                          $result = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_array($result);
                          echo $row['total'];
                        ?>
                      </h4>
                      <p>Records</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col s12 m4">
              <a href="equipment.php">
                <div class="card center">
                  <div class="row">
                    <div class="col s6 icon">
                      <i class="fas fa-box blue-text"></i>
                    </div>
                    <div class="col s6 grey-text text-darken-1">
                      <h4>
                        <?php
                          $sql = "SELECT COUNT(equip_id) as total FROM equipment";
                          $result = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_array($result);
                          echo $row['total'];
                        ?>
                      </h4>
                      <p>Equipments</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col s12 m4">
              <a href="users.php">
                <div class="card center">
                  <div class="row">
                    <div class="col s6 icon">
                      <i class="fas fa-users blue-text"></i>
                    </div>
                    <div class="col s6 grey-text text-darken-1">
                      <h4>
                        <?php
                          $sql = "SELECT COUNT(user_id) as total FROM user";
                          $result = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_array($result);
                          echo $row['total'];
                        ?>
                      </h4>
                      <p>Users</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col s12 m4">
              <a href="admin.php">
                <div class="card center">
                  <div class="row">
                    <div class="col s6 icon">
                      <i class="fas fa-user blue-text"></i>
                    </div>
                    <div class="col s6 grey-text text-darken-1">
                      <h4>
                        <?php
                          $sql = "SELECT COUNT(admin_id) as total FROM admin";
                          $result = mysqli_query($conn, $sql);
                          $row = mysqli_fetch_array($result);
                          echo $row['total'];
                        ?>
                      </h4>
                      <p>Admin</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

        <div class="col s12 m3">
          <!-- Sales analytics -->
          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-box"></i> Equipments Status
            </li>
            <?php
              // Total Equipments
              $sql = "SELECT COUNT(equip_id) as total from `equipment`";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Total: <span class='secondary-content'>".$row['total']."</span></li>";

          
              // Total Successful Bookings
              $sql = "SELECT COUNT(record_status) as booked from `record` WHERE record_status<>'pending'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Booked: <span class='secondary-content'>".$row['booked']."</span></li>";
              
              // Total In-queue Bookings
              $sql = "SELECT COUNT(record_status) as notbooked from `record` WHERE record_status='pending'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Booked: <span class='secondary-content'>".$row['notbooked']."</span></li>";
               ?>
          </ul>

          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-chart-line"></i> Sales status
            </li>
            <?php

              // Total users
              $sql = "SELECT COUNT(user_id) as total from `user`";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Total student: <span class='secondary-content green-text'>".$row['total']."</span></li>";

              // total revenue from equipment
              $sql = "SELECT SUM(record_price) as price from `record` WHERE record_status<>'pending'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Total paid equipment: <span class='secondary-content green-text'>RM".$row['price']."</span></li>";
            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
  include 'footer.php';
?>