<?php
  //include or require takes the code from *.php files to this file
  require 'session.php';
  include 'navbar.php';
  require_once 'model/db.php';

  $msg = $msgClass = '';
  function get_price($qauntity) {
    //if user type is internal
    if(($_SESSION['u_type'])== "Internal") {
      $price = $_SESSION['InternalUsers'] * $qauntity;
    }
    //if user type is external
    else if (($_SESSION['u_type'])== "External") {
      $price = $_SESSION['ExternalUsers'] * $qauntity;
    }
    //if user type is industry
    else if (($_SESSION['u_type'])== "Industry") {
      $price = $_SESSION['IndustryUsers'] * $qauntity;
    }

    return $price;
  }

  // handle the get request base on user id
  if (isset($_REQUEST['id'])) {
    //escapes special characters from the id
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    echo "$id";
    //sql statement to select equipments
    $sql = "SELECT * FROM `equipment` WHERE `equip_id`='$id'";
    //perform query on $sql
    $result = mysqli_query($conn, $sql);
    //returns row in an associative array 
    $row = mysqli_fetch_array($result);

    //then euipment id in session will be stored as the equipment id in row and same for other
    $_SESSION['equip_id'] = $row['equip_id'];
    $_SESSION['Equipment'] = $row['Equipment'];
    $_SESSION['Model'] = $row['Model'];
    $_SESSION['InternalUsers'] = $row['InternalUsers'];
    $_SESSION['ExternalUsers'] = $row['ExternalUsers'];
    $_SESSION['IndustryUsers'] = $row['IndustryUsers'];
    $_SESSION['RateType'] = $row['RateType'];
  }

  // Process booked eqipment and insert into database
  if (filter_has_var(INPUT_POST, 'book')) {
    //$eid = mysqli_real_escape_string($conn, $_POST['equip_id']);
    //$uid = mysqli_real_escape_string($conn, $_POST['user_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $start = mysqli_real_escape_string($conn, $_POST['start']);
    $end = mysqli_real_escape_string($conn, $_POST['end']);
    $qauntity = mysqli_real_escape_string($conn, $_POST['qauntity']);
    $status = "pending";
    
    // check date if start date lower then end date output some error
    if ($end <= $start && $start <= date("h:i:s")) {
      echo "Time Input Error: Past time entered/ End time less than start time";
        $msg = "Please pick valid times";
        $msgClass = "red";
    } 
    else if ($date <= date("Y-m-d")) {
      echo "Date Input Error: Past Date Entered";
      $msg = "Please pick valid date";
      $msgClass = "red";
    }
    else {
        $e_id = $_SESSION['equip_id'];
        $user_id = $_SESSION['u_id'];
        $totalPrice = get_price($qauntity);
        $status = "Pending";
        // echo "$e_id"; equipment id
        // echo "$user_id"; user id
        // echo "$date"; date of booking
        // echo "$start";  start time
        // echo "$end";    end time
        // echo "$qauntity";  quantity
        // echo "$status";   Booked or Available
        // echo "$totalPrice";  Price of facilty usage
        // Insert record into database
        $sql = "INSERT INTO `record` (`equip_id`, `user_id`, `record_date`, `record_start`, `record_end`, `record_qauntity`, `record_status`, `record_price`)
        VALUES ('$e_id','$user_id','$date','$start','$end','$qauntity','$status','$totalPrice');";
        //perform query on $sql
        $result = mysqli_query($conn, $sql);
        
        if($result){
          echo "Booking Success and Record inserted <b><h5>You can see your bookings in the dashboard</h5><b>";
          $msg = "<a href='index.php' class='white-text'><i class='fas fa-arrow-circle-left'></i></a> Booking success ,see your bookings in the dashboard ";
          $msgClass = "green";
        }
        else {
          echo "Booking Failed";
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
    <!-- $msg is not empty -->
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
          <input readonly type="text" id="userid" name="userid" value="<?php echo $_SESSION['u_id']; ?>">
          <label for="id">User id</label>
        </div>
    </div>

      
    <div class="row">
      <div class="input-field col s6 m6">
        <input id="date" type="text" class="datepicker" name="date">
        <label for="date">Date</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s6 m6">
        <input id="start" type="text" class="timepicker" name="start">
        <label for="start">Start time</label>
      </div>
      <div class="input-field col s6 m6">
        <input id="end" type="text" class="timepicker" name="end">
        <label for="end">End time</label>
      </div>
    </div>
    
    <div class="row">
      <div class="input-field col s6 m6">
        <div class="col s6 m6 grey-text"> Qauntity Type = <?php echo $_SESSION['RateType']; ?> </div>
        <div class="col s6 m6 grey-text"> Rate per qauntity = <?php echo get_price(1); ?> </div>
        </ul>
      </div>
    </div>    

    <div class="row">
      <div class="input-field col s6 m6">

        <input id="qauntity" type="text" class="price" name="qauntity">
        <label for="qauntity">Qauntity</label>
      </div>
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
