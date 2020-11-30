<?php
  session_start();
  require 'session.php';
  include "navbar.php";
  require_once "../model/db.php";
  $msg = $msgClass = '';

  if (filter_has_var(INPUT_POST, 'revenue')) {
    $rstart = mysqli_real_escape_string($conn, $_POST['rstart']);
    $rend = mysqli_real_escape_string($conn, $_POST['rend']);
  

    $sql = "SELECT SUM(record_price) as price from `record` WHERE record_status <>'Pending';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $_SESSION['revenue'] = $row['price'];
    $rprice = $row['price'];

    if($result){

      // echo $row['price'];
      // echo "executed";
      $msg = "Revenue Generated";
      $msgClass = "blue";
    }
    else {
      echo "Booking Failed";
            // echo "First query failed..." . mysqli_error($conn);
    }
  }
  mysqli_close($conn);

?>
<div class="wrapper">
  <section class="section">
    <div class="container2">
      
      <h5><i class="fas fa-money-bill-alt"></i> Report </h5>
      <div class="divider"></div>
      <br>
      
      <div class="row">
        <div class="col s12 m6">
        </div>
        
       
      </div>
      <h5><i class="fab fa-wpforms"></i> Revenue information</h5>
      <div class="divider"></div><br>
        <!-- $msg is not empty -->
      <?php if($msg != ''): ?>
        <div class="card-panel <?php echo $msgClass; ?>">
          <span class="white-text"><?php echo $msg; ?></span>
        </div>
      <?php endif ?>
      <div id="calculaterevenue">
        <h5>Total Revenue</h5>
          <table class="responsive-table highlight centered">
          <thead>
                <!-- to represent the following in rows and columns -->
          <tr>
            <th>Total Revenue</th>
          </tr> 
        </thead>
        <tbody>
        
          <tr>
            <!-- to represent to following data cell in table -->
            <td><?php echo "Rs. ". $_SESSION['revenue']  ?></td>
          </tr>
              
        </tbody>
        </table>
    
      </div>
      <form enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="card-panel">
    
    
        <div class="row">
          <div class="input-field col s6 m6">
            <input id="rstart" type="text" class="datepicker" name="rstart">
            <label for="rstart">Start date</label>
          </div>
          <div class="input-field col s6 m6">
            <input id="rend" type="text" class="datepicker" name="rend">
            <label for="rend">End date</label>
          </div>
        </div>
        
        <div class="center">
          <a href="index.php" class="btn btn-flat">Cancel</a>
          <button type="submit" name="revenue" class="btn green"><a href="#calculaterevenue"class="white-text" >Calculate Revenue</button>
        </div>
    

      </form>
    </div>

    
  </section>
</div>
  

 


<?php
  include "footer.php";
?>

