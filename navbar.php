<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" href="css/materialize.min.css">
  <script src="js/fontawesome-all.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body >
<header id="masthead" class="site-header" role="banner"><div class="container">			    
<div class="site-branding">

<a href="https://c4dfed.com/" class="custom-logo-link" rel="home"><img width="150" height="100" src="https://c4dfed.com/wp-content/uploads/2018/12/cropped-IItmandi-e1544089564958-1.jpg" class="custom-logo" alt="C4DFED" data-attachment-id="1057" data-permalink="https://c4dfed.com/cropped-iitmandi-e1544089564958-1-jpg/" data-orig-file="https://c4dfed.com/wp-content/uploads/2018/12/cropped-IItmandi-e1544089564958-1.jpg" data-orig-size="150,100" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;1&quot;}" data-image-title="cropped-IItmandi-e1544089564958-1.jpg" data-image-description="&lt;p&gt;https://c4dfed.com/wp-content/uploads/2018/12/cropped-IItmandi-e1544089564958-1.jpg&lt;/p&gt;
" data-medium-file="https://c4dfed.com/wp-content/uploads/2018/12/cropped-IItmandi-e1544089564958-1.jpg" data-large-file="https://c4dfed.com/wp-content/uploads/2018/12/cropped-IItmandi-e1544089564958-1.jpg" /></a>
          
</div>

<div class="wrapper">
    
  <nav class="blue"  role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">
        <img class="logo-img" src="img/logo.png" alt="logo">
      </a>
      <a href="#" class="brand-logo center"> C4DFED</a>
      <ul class="right hide-on-med-and-down black-text">
      
        <?php if(isset($_SESSION['s_id'])): ?>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="user/index.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="active"><a href="index.php">Home</a></li>
          <li ><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        <?php endif ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <?php if(isset($_SESSION['s_id'])): ?>
          <li><a href="index.php">Home</a></li>
          <li><a href="user/index.php">Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="index.php">Home</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="login.php">Login</a></li>
        <?php endif ?>
      </ul>
      
      <a href="#" data-activates="nav-mobile" class="button-collapse grey-text"><i class="material-icons">menu</i></a>
    </div>
    
   </nav>
  <?php if (isset($_SESSION['s_id'])): ?>
  <ul class="side-nav fixed">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="img/ocean.jpg" alt="ocean">
        </div>
        <div class="row">
          <div class="col s4">
            <img src="img/user.png" alt="" class="circle">
          </div>
          <div class="col s8">
            <a href="#">
              <span class="name white-text"><?php echo $_SESSION['s_username']; ?></span>
            </a>
            <a href="#">
              <span class="email white-text"><?php echo $_SESSION['s_email']; ?></span>
            </a>
          </div>
        </div>
      </div>
    </li>
    </ul>
    <?php endif ?> 
</body>

</html>
