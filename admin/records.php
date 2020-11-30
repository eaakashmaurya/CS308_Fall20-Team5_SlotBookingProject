<?php
  session_start();
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';

  $msg = $msgClass = '';

  // Approve Booking
  if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $adminId = $_SESSION['admin_id'];
    $sql = "UPDATE `record` SET record_status='approved', record_approved_by='$adminId' WHERE record_id='$id'";

    if (mysqli_query($conn, $sql)) {
      $msg = "Update Successfull";
      $msgClass = "green";
    } else {
      $msg = "Error updating this recrod";
      $msgClass = "red";
    }
  }

  // Delete form handling
  if (isset($_POST['delete'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "DELETE FROM `record` WHERE `record_id`='$id'";

    if (mysqli_query($conn, $sql)) {
      $msg = "Delete Successfull";
      $msgClass = "green";
    } else {
      $msg = "Error deleting this recrod";
      $msgClass = "red";
    }
  }
?>
<div class="wrapper">
  <section class="section">
    <div class="container2">
      <?php if($msg != ''): ?>
        <div id="msgBox" class="card-panel <?php echo $msgClass; ?>">
          <span class="white-text"><?php echo $msg; ?></span>
        </div>
      <?php endif ?>
      <h5><i class="fas fa-book"></i> Records List</h5>
      <div class="divider"></div>
      <br>

      <!-- Search field -->
      <div class="row">
        <div class="col s12 m6"></div>
        <div class="col s12 m6">
          <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input type="text" id="search">
            <label for="search">Search</label>
          </div>
        </div>
      </div>
      <!-- Equipments table list -->
      <table id="myTable" class="responsive-table highlight centered">
        <thead class="blue darken-2 white-text">
          <tr class="myHead">
            <th>#</th>
            <th>Id</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
            <th>Item</th>
            <th>Student Id</th>
            <th>Equipment Id</th>
            <th class="center-align">Status</th>
            <th>Approved by</th>
            <th colspan="2" class="center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            $sql = "SELECT * FROM `record`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)):
          ?>
          <tr>
            <td><?php echo $i; $i++; ?></td>
            <td><?php echo $row['record_id']; ?></td>
            <td><?php echo $row['record_start']; ?></td>
            <td><?php echo $row['record_end']; ?></td>
            <td><?php echo "RM"." ".$row['record_price']; ?></td>
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
                    <td> <?php echo "Equipment ID :- "." ".$row1['equip_id']; ?></td>
                  </tr>
                  <tr>
                    <td> <?php echo "Equipment Name :- "." ".$row1['Equipment']; ?></td>
                  </tr>
                  <tr>
                    <td> <?php echo "Equipment Model :- "." ".$row1['Model']; ?></td>
                  </tr>
                  <tr>
                    <td> <?php echo "Price for Internal Users :- "." ".$row1['InternalUsers']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo "Price for External Users :- "." ".$row1['ExternalUsers']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo "Price for Industry Users :- "." ".$row1['IndustryUsers']; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo "Rate Type :- "." ".$row1['RateType']; ?></td>
                  </tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <a class="modal-trigger"  href="<?php echo '#'.$row['record_id']; ?>">View</a>
            </td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['equip_id']; ?></td>
            <td><?php echo $row['record_status']; ?></td>
            
            <td>
              <form method='POST' action='records.php'>
                <input type='hidden' name='id' value='<?php echo $row['record_id']; ?>'>
                <?php if ($row['record_status'] == 'pending'): ?>
                  <button type='submit' name='update' class='green-text btn1 tooltipped' data-position='right' data-tooltip='Approve'>
                    <i class="fas fa-check"></i>
                  </button>
                <?php else: ?>
                  <button type='submit' name='update' class='blue-text btn1 tooltipped' data-position='right' data-tooltip='Approve' disabled>
                    <i class="fas fa-check"></i>
                  </button>
                <?php endif ?>
              </form>
            </td>
            <td>
              <form method='POST' action='records.php'>
                <input type='hidden' name='id' value='<?php echo $row['record_id']; ?>'>
                <button type='submit' onclick='return confirm(`Delete this record <?php echo $row['record_id']; ?> ?`);' name='delete' class='red-text btn1 tooltipped' data-position='top' data-tooltip='Delete'>
                  <i class='far fa-trash-alt'></i>
                </button>
              </form>
            </td>
          </tr>
          <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </section>
</div>
<?php
  mysqli_close($conn);
  include 'footer.php';
?>
