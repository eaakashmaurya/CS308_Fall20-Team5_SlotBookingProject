<?php
  session_start();
  //include or require takes the code from *.php files to this file
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';
  // Error message and class
  $msg = $msgClass = '';

  // Delete form handling
  if (isset($_POST['delete'])) {
    //escapes special characters from the id
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    //sql statement to delete user
    $sql = "DELETE FROM `user` WHERE `user_id`='$id'";

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
      <h5><i class="fas fa-users"></i> Users List</h5>
      <div class="divider"></div>
      <br>
      <div class="row">
        <div class="col s12 m6"></div>
        <div class="col s12 m6">
          <div class="input-field">
            <i class="material-icons prefix">search</i>
            <!-- enter for search -->
            <input type="text" id="search">
            <label for="search">Search</label>
          </div>
        </div>
      </div>

      <!-- Equipment table list -->
      <table id="myTable" class="responsive-table highlight centered">
        <thead class="blue darken-2 white-text">
          <!-- to reppresent the following data row in the table  -->
          <tr class="myHead">
            <th>#</th>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Supervisor Name</th>
            <th>Supervisor Email</th>
            <th>Type</th>
            <th colspan="2" class="center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            //sql statment to select user
            $sql = "SELECT * FROM `user`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)):
          ?>
          <!-- to reppresent the following data cell in the table  -->
          <tr>
            <td><?php echo $i; $i++; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_supervisor']; ?></td>
            <td><?php echo $row['user_supervisor_email']; ?></td>
            <td><?php echo $row['user_type']; ?></td>
            
            <td>
              <a href='users_edit.php?id=<?php echo $row['user_id']; ?>' class='btn-flat blue-text tooltip' data-position='right' data-tooltip='Edit'><i class='fas fa-pencil-alt'></i></a>
            </td>
            <td>
              <form method='POST' action='users.php'>
                <input type='hidden' name='id' value="<?php echo $row['user_id'];?>">
                <button type='submit' onclick='return confirm(`Delete this user <?php echo $row['user_id']; ?>?`);' name='delete' class='btn-flat red-text tooltipped' data-position='top' data-tooltip='Delete'>
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
