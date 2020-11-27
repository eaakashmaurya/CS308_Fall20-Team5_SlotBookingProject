<?php
  require 'session.php';
  include 'navbar.php';
  require_once 'model/db.php';

  $msg = $msgClass = '';
  function get_price($date1, $date2) {
    $diff = date_diff(date_create($date1), date_create($date2));
    $price = $diff->format("%a");
    return $price * 1;
  }

  // handle the get request base on user id
  if (isset($_REQUEST['id'])) {
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    
    $sql = "SELECT * FROM `equipment` WHERE `equip_id`='$id'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result);
    // echo $row['equip_id'];
    // echo $row['equip_price'];
    $_SESSION['equip_id'] = $row['equip_id'];
    $_SESSION['equip_price'] = $row['equip_price'];
  }

  // Process booked eqipment and insert into database
  if (filter_has_var(INPUT_POST, 'book')) {
    $start = mysqli_real_escape_string($conn, $_POST['start']);
    $end = mysqli_real_escape_string($conn, $_POST['end']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $sid = mysqli_real_escape_string($conn, $_POST['studentid']);
    $eid = mysqli_real_escape_string($conn, $_POST['equipid']);
    // echo "$eid";
    $pending = "pending";
    // check date if start date lower then end date output some error
    if ($end <= $start) {
      echo "Date Error";
        $msg = "Please pick a correct date";
        $msgClass = "red";
    } 
    else {
        $totalPrice = get_price($start, $end);
        // echo $totalPrice;
        $sql = "INSERT INTO `record` (`record_start`, `record_end`, `record_price`, `record_approved_by`, `student_id`, `equip_id`)
        VALUES ('$start', '$end', '$totalPrice','admin2', '$sid', '$eid');";
        // INSERT INTO `record` (`record_start`, `record_end`, `record_price`,  `record_approved_by`, `student_id`, `equip_id`) 
        // VALUES ( '2020-05-04', '2020-05-25', 21,'admin2', '01dns14f1030', 'A100100');
        
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "Record inserted";
          $sql = "UPDATE `equipment` SET equip_status='Booked' WHERE equip_id='$eid'";
          $result1 = mysqli_query($conn, $sql);
          if($result1) {
            $msg = "<a href='index.php' class='white-text'><i class='fas fa-arrow-circle-left'></i></a> Booking success";
            $msgClass = "green";
          }
        } else {
          // echo "First query failed..." . mysqli_error($conn);
        }
    } 

    
  }
  mysqli_close($conn);

?>
<section class="section">
  <div class="container">
    <h5><i class="fab fa-wpforms"></i> Booking information</h5>
    <div class="divider"></div><br>
    <?php if($msg != ''): ?>
      <div class="card-panel <?php echo $msgClass; ?>">
        <span class="white-text"><?php echo $msg; ?></span>
      </div>
    <?php endif ?>
    <form enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="card-panel">
      <div class="row">
        <div class="input-field col s6 m6">
          <input readonly type="text" id="equipid" name="equipid" value="<?php echo $_SESSION['equip_id']; ?>">
          <label for="id">Equipment id</label>
        </div>
        <div class="input-field col s6 m6">
          <input readonly type="text" id="studentid" name="studentid" value="<?php echo $_SESSION['s_id']; ?>">
          <label for="id">Student id</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6">
          <input id="start" type="text" class="datepicker" name="start">
          <label for="start">Start date</label>
        </div>
        <div class="input-field col s6 m6">
          <input id="end" type="text" class="datepicker" name="end">
          <label for="end">End date</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6">
          <input readonly type="text" id="price" name="price" value="<?php echo $_SESSION['equip_price']; ?>">
          <label for="price">Equipment  Price (RM) / day</label>
        </div>
      <div class="center">
        <a href="index.php" class="btn btn-flat">Cancel</a>
        <button type="submit" name="book" class="btn green">Book now</button>
      </div>
    </form>
  </div>
</section>
<?php
  include 'footer.php';
?>
