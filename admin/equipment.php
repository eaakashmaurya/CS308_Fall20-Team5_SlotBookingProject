<?php
  session_start();
  //include or require takes the code from *.php files to this file
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';

  $msg = $msgClass = '';

  // Form handling
  if (filter_has_var(INPUT_POST, 'submit')) {
    // Get form data for equipment
    // filter the special characters from the id and all other
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $e_name = mysqli_real_escape_string($conn, $_POST['equipmentname']);
    $e_model = mysqli_real_escape_string($conn, $_POST['equipmentmodel']);
    $internalprice = mysqli_real_escape_string($conn, $_POST['internaluserprice']);
    $externalprice = mysqli_real_escape_string($conn, $_POST['externaluserprice']);
    $industryprice = mysqli_real_escape_string($conn, $_POST['industryuserprice']);
    $rate = mysqli_real_escape_string($conn, $_POST['ratetype']);
   
    //echo "$id";
    //echo "$e_model";
    //echo "$e_name";
    //echo "$industryprice";
    //echo "$internalprice";
    //echo "$externalprice";
    
    // Check if the input is empty
    //if id, name and email .. is not empty then
    if (!empty($id) && !empty($e_model) && !empty($internalprice) && !empty($externalprice) && !empty($industryprice)) {
      // insert equipment into database
      $sql = "INSERT INTO `equipment` (`equip_id`, `Equipment`, `Model`,`InternalUsers`,`ExternalUsers`,`IndustryUsers`,`RateType`)
      VALUES ('$id', '$e_name', '$e_model','$internalprice','$externalprice','$industryprice','$rate')";
      //if it returns some value then success
      if (mysqli_query($conn, $sql)) {
        // Success
        $msg = "Equipment added";
        $msgClass = "green";
      }//if it doesnot return some value then error  
      else {
        $msg = "Fail to add equipment error: " . $sql . "<br>" . mysqli_error($conn);
        $msgClass = "red";
      }
    } else {
      // failed
      $msg = "Please fill in all fields";
      $msgClass = "red";
    }
  }

  // Delete form handling
  if (isset($_POST['delete'])) {
    //escape special characters from id
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    //sql statement to delete from equipment
    $sql = "DELETE FROM `equipment` WHERE `equip_id`='$id'";
    //perform query on $sql
    if (mysqli_query($conn, $sql)) {
      $msg = "Delete Successfull";
      $msgClass = "green";
    } else {
      $msg = "Error deleting this equipment";
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
      <h5><i class="fas fa-cogs"></i> Equipment setting</h5>
      <div class="divider"></div>
      <br>
      <div class="row">
        <div class="col s12 m6">
          <a href="#addequipment" class="btn green modal-trigger">Add New equipment</a>
        </div>
        <div class="col s12 m6">
          <div class="input-field">
            <i class="material-icons prefix">search</i>
            <input type="text" id="search">
            <label for="search">Search</label>
          </div>
        </div>
      </div>
      <!-- Equipment table list -->
      <table id="myTable" class="responsive-table highlight centered">
        <thead class="blue darken-2 white-text">
          <!-- to reppresent the following data in the table  -->
          <tr class="myHead">
            <th>#</th>
            <th>Equipment id</th>
            <th>Equipment Name</th>
            <th>Equipment Model</th>
            <th>Internal User price</th>
            <th>External User price </th>
            <th>Industry User price </th>
            <th>Rate Type </th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            //sql statement to select equipment
            $sql = "SELECT * FROM `equipment`";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)):
          ?>
            <tr>
              <td><?php echo $i; $i++ ?></td>
              <td><?php echo $row['equip_id']; ?></td>
              <td><?php echo $row['Equipment']; ?></td>
              <td><?php echo $row['Model']; ?></td>
              <td><?php echo $row['InternalUsers']; ?></td>
              <td><?php echo $row['ExternalUsers']; ?></td>
              <td><?php echo $row['IndustryUsers']; ?></td>
              <td><?php echo $row['RateType']; ?></td>
              <td>
                  <a href="equip_edit.php?id=<?php echo $row['equip_id']; ?>" class='blue-text tooltipped' data-position='right' data-tooltip='Edit'><i class='fas fa-pencil-alt'></i></a>
              </td>
              <td>
                <form method='POST' action='equip.php'>
                  <input type='hidden' name='id' value="<?php echo $row['equip_id']; ?>">
                  <button type='submit' onclick='return confirm(`Delete this equip "<?php echo $row['equip_id']; ?>" ?`);' name='delete' class='btn1 red-text tooltipped' data-position='top' data-tooltip='Delete'>
                    <i class='far fa-trash-alt'></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php endwhile ?>
        </tbody>
      </table>

      <!-- Add equipment -->
      <div id="addequipment" class="modal">
        <div class="modal-content">
          <h5>Add Equipment</h5>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="row">
              <div class="input-field col s12">
                <!-- enter equipment id -->
                <input id="id" type="text" name="id">
                <label for="id">Equipment Id</label>
              </div>
            </div>
           
            <div class="row">
              <div class="input-field col s12">
                <input id="equipmentname" type="text" name="equipmentname">
                <label for="equipmentname"> Equipment Name </label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="equipmentmodel" type="text" name="equipmentmodel">
                <label for="equipmentmodel"> Equipment Model </label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="internaluserprice" type="text" name="internaluserprice">
                <label for="internaluserprice"> Internal User Price</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="externaluserprice" type="text" name="externaluserprice">
                <label for="externaluserprice">External User Price</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="industryuserprice" type="text" name="industryuserprice">
                <label for="industryuserprice">Industry User Price</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <select name="ratetype">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="perhour">per hour</option>
                  <option value="persample">per sample</option>
                </select>
                <label>Rate Type</label>
              </div>
            <button type="submit" class="btn blue" name="submit">Add</button>
          </form>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
  mysqli_close($conn);
  include 'footer.php';
?>
