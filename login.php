<?php
  session_start();
  // require 'session.php';
  //include or require takes the code from *.php files to this file
  include 'navbar.php';
  require 'model/db.php';

  // if user already login redirect them to index page
  if (isset($_SESSION['u_id'])) {
    header("Location: index.php");
  }

  // Error message and class
  $msg = $msgClass = '';
  //if variable submit exist or not
  if (filter_has_var(INPUT_POST, 'submit')) {
    // Get form data
    $id = mysqli_real_escape_string($conn, $_POST['userid']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the inputs are empty or not
    //if not empty 
    if (!empty($id) && !empty($password)){
      // if inputs are not empty then success
      //sql statement for selecting user ids from user
      $sql = "SELECT * FROM `user` WHERE `user_id`='$id'";
      //perform query on sql
      $result = mysqli_query($conn, $sql);
      //returns no. of rows from result
      $resultCheck = mysqli_num_rows($result);
      //returns row in an associative array 
      $row = mysqli_fetch_assoc($result);
      //if no. of rows is less than 1
      if ($resultCheck < 1) {
        // error, id not exist
        $msg = "Invalid user Id or password";
        $msgClass = "red";
        //if the rows are greater than 1
      } else {
        // dehashing the password
        $pwdCheck = ($_POST['password'] == $row['user_pwd']);
        //if wrong password entered
        if($pwdCheck == false) {
          $msg = "Invalid password";
          $msgClass = "red";
        }//if pasword entered is right 
        elseif ($pwdCheck == true) {
          //then user id in session will be stored as the user id in row and same for other
          $_SESSION['u_id'] = $row['user_id'];
          $_SESSION['u_name'] = $row['user_name'];
          $_SESSION['u_email'] = $row['user_email'];
          $_SESSION['u_SUname'] = $row['user_supervisor'];
          $_SESSION['u_SUemail'] = $row['user_supervisor_email'];
          $_SESSION['u_type'] = $row['user_type'];

          header("location: index.php");
        }
      }
    } 
    //if inputs are empty
    else {
      // failed ouput an error
      $msg = "Please fill in all fields";
      $msgClass = "red";
    }

    mysqli_close($conn);
  }

?>

<!-- Login form -->
<div class="container">
  <div class="box">
    <div class="row">
      <div class="col s12 m12">
        <!-- if message is not empty -->
        <?php if($msg != ''): ?>
          <div id="msgBox" class="card-panel <?php echo $msgClass; ?>">
            <span class="white-text"><?php echo $msg; ?></span>
          </div>
        <?php endif ?>
        <div class="card">
          <div class="card-image">
            <img id="userimg" src="img/user.png" class="circle responsive-img">
          </div>
          <div class="card-content">
            <span class="card-title center-align">User Login</span>
            <div class="row">
              <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" id="userid" name="userid">
                    <label for="userid">User id</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                      <i class="material-icons prefix">lock</i>
                    <input type="password" id="password" name="password">
                    <label for="userid">Your password</label>
                  </div>
                </div>
                <div class="row">
                  <p class="center-align">
                    New user? <a href="register.php">Register here</a><br>
                    Admin ? <a href="admin/">Login here</a><br><br>
                    <button type="submit" class="waves-effect waves-light btn blue" name="submit">Login</button>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end login form -->

<?php
  include 'footer.php';
?>