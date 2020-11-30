<?php
  require 'session.php';
  include 'navbar.php';
  require '../model/db.php';

  $msg = $msgClass = '';

  if (isset($_REQUEST['id'])) {
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $sql = "SELECT * FROM `student` WHERE `student_id`='$id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
  } else {
    header("Location: index.php");
  }

  // Check for submit
  if (filter_has_var(INPUT_POST, 'submit')){
    // Get form data
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
    if (!empty($id) && !empty($name) && !empty($email) && !empty($SUname) && !empty($SUemail) && !empty($type) && !empty($password)){
      // pass
      // Check email
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

        if (mysqli_query($conn, $sql)){
          $msg = "Update success";
          $msgClass = "green";
        } else {
          $msg = "Update error: " . $sql . "<br>" . mysqli_error($conn);
          $msgClass = "red";
        }
      }
    } else {
      // failed
      $msg = "Please fill in all fields";
      $msgClass = "red";
    }
  }
?>

<div class="wrapper">
  <section class="section">
    <div class="container2">
      <div class="row">
        <div class="col s12 m12">
          <?php if($msg != ''): ?>
            <div id="msgBox" class="card-panel <?php echo $msgClass; ?>">
              <span class="white-text"><?php echo $msg; ?></span>
            </div>
          <?php endif ?>
          <div class="card">
            <div class="card-content">
              <span class="card-title center-align"><h5>User Profile</h5></span>
              <!-- User data edit form  -->
                <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">credit_card</i>
                      <input type="text" id="id" name="id" value="<?php echo isset($_POST['id']) ? $id : ''; ?>">
                      <label for="id">User ID (Roll No. for Internal Users, Affiliation No. for Ex. Users)</label>
                    </div>
                  
                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">account_circle</i>
                      <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                      <label for="name">Full Name</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">email</i>
                      <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                      <label for="email">Email</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">account_circle</i>
                      <input type="text" id="SUname" name="SUname" value="<?php echo isset($_POST['SUname']) ? $SUname : ''; ?>">
                      <label for="SUname">Superivisor Name</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">email</i>
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
                      <label for="userid">Your password</label>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="center">
                      <button type="submit" class="waves-effect waves-light btn blue" name="submit">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
  include 'footer.php';
?>
