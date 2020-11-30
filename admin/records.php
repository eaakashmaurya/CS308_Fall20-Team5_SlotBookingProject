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
    $sql = "UPDATE `record` SET record_status='approved' WHERE record_id='$id'";

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

// Update with discounted price form handling
if (isset($_POST['change_price'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $newprice = mysqli_real_escape_string($conn, $_POST['newprice']);  
  $sql = "UPDATE `record` SET record_price='$newprice' WHERE record_id='$id'";

  if (mysqli_query($conn, $sql)) {
    $msg = "Update Discounted Price Successfull";
    $msgClass = "green";
  } else {
    $msg = "Error updating this recrod";
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
            <th>Equipment Id</th>
            <th>User Id</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Qauntity</th>
            <th>Status</th>
            <th>Bill Ammount</th>
            <th colspan="4" class="center">Actions</th>
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
            <td><?php echo $row['equip_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['record_date']; ?></td>
            <td><?php echo $row['record_start']; ?></td>
            <td><?php echo $row['record_end']; ?></td>
            <td><?php echo $row['record_qauntity']; ?></td>
            <td><?php echo $row['record_status']; ?></td>
            <td><?php echo "Rs"." ".$row['record_price']; ?></td>

            <!-- Code to change price as per new discounted price -->

            <td>
              <form method='POST' action='records.php'>
                <input type='hidden' name='id' value='<?php echo $row['record_id']; ?>'>
                
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">credit_card</i>
                    <input type="text" name="newprice" value="<?php echo isset($_POST['newprice']) ? $newprice : ''; ?>">
                    <label for="newprice">Discounted Price</label>
                </div>  
                
                <button type='submit' name='change_price' class='btn-flat blue-text tooltip' data-position='right' data-tooltip='Edit'>
                  <i class='fas fa-pencil-alt'></i>
                </button>
                
              </form>
            </td>

            <!-- Code to change status -->

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

            <!-- Code to delete record -->

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
