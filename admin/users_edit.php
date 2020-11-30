<?php
  session_start();
  //include or require takes the code from *.php files to this file
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';
  // Error message and class
  $msg = $msgClass = '';

  // handle the get request base on user id
  if (isset($_REQUEST['id'])) {
    //escapes special characters from the id
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    //sql statement to select user
    $sql = "SELECT * FROM `user` WHERE `user_id`='$id'";
    //perform query on $sql
    $result = mysqli_query($conn, $sql);
    //returns row in an associative array
    $row = mysqli_fetch_array($result);
  }

  // Check for submit
  if (filter_has_var(INPUT_POST, 'submit')){
    // Get form data
    //then euipment id in session will be stored as the equipment id in row and same for other
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $SUname = mysqli_real_escape_string($conn, $_POST['SUname']);
    $SUemail = mysqli_real_escape_string($conn, $_POST['SUemail']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //echo "$id";
    //echo "$name";
    //echo "$SUname";
    //echo "$SUemail";
    //echo "$type";
    //echo "$password";

    // Check required fields
    //if id, name and email .. is not empty then
    if (!empty($id) && !empty($name) && !empty($email) && !empty($SUname) && !empty($SUemail) && !empty($type) && !empty($password)){
      // pass
      // Check email is wrong
      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // failed
        $msg = "Please use a valid email";
        $msgClass = "red";
      } else {
        // pass
        // Hashing the password
        $hashedPwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // var_dump($hashedPwd);

        // Insert user into database
        $sql = "UPDATE `user` SET `user_name`='$name', `user_email`='$email',`user_supervisor`='$SUname', `user_supervisor_email`='$SUemail', `user_type`='$type',`user_pwd`='$hashedPwd' WHERE `user_id`='$id'";
        //if it returns some value then success
        if (mysqli_query($conn, $sql)){
          $msg = "Update success";
          $msgClass = "green";
        }//if it doesnot return some value then error 
         else {
          $msg = "Update error: " . $sql . "<br>" . mysqli_error($conn);
          $msgClass = "red";
        }
      }
    } //if id, name and email is empty then 
    else {
      // failed
      $msg = "Please fill in all fields";
      $msgClass = "red";
    }
  }
  mysqli_close($conn);
?>

<div class="wrapper">
  <section class="section">
    <div class="container2">
      <?php if($msg != ''): ?>
        <div id="msgBox" class="card-panel <?php echo $msgClass; ?>">
          <span class="white-text"><?php echo $msg; ?></span>
        </div>
      <?php endif ?>
      <h5><i class="fas fa-edit"></i> Edit user <span class="blue-text"><?php echo $row['student_id']; ?></span></h5>
      <div class="divider"></div><br><br>

      <!-- User data edit form  -->
      <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">credit_card</i>
            <!-- enter user id -->
            <input type="text" id="id" name="id" value="<?php echo isset($_POST['id']) ? $id : ''; ?>">
            <label for="id">User ID (Roll No. for Internal Users, Affiliation No. for Ex. Users)</label>
          </div>
        
        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <!-- enter user full name -->
            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            <label for="name">Full Name</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <!-- enter user email -->
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            <label for="email">Email</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <!-- enter user supervisor name -->
            <input type="text" id="SUname" name="SUname" value="<?php echo isset($_POST['SUname']) ? $SUname : ''; ?>">
            <label for="SUname">Superivisor Name</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <!-- enter user supervisor email -->
            <input type="email" id="SUemail" name="SUemail" value="<?php echo isset($_POST['SUemail']) ? $SUemail : ''; ?>">
            <label for="SUemail">Superivisor Email</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" id="type" name="type" value="<?php echo isset($_POST['type']) ? $type : ''; ?>">
            <label for="type">Type (Internal/Extenal/Industrial)</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field">
            <i class="material-icons prefix">lock</i>
            <input type="password" id="password" name="password">
            <label for="userid">New password</label>
          </div>
        </div>

        <div class="row">
          <div class="center">
            <button type="submit" class="waves-effect waves-light btn blue" name="submit">Update</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
<?php
  // mysqli_close($conn);
  include 'footer.php';
?>
