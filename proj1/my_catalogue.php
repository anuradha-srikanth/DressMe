<?php session_start(); 

?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <?php if(!(isset($_SESSION['login']) && ($_SESSION['login'] == true))){
    echo 'Please Login before you can access this information';
    echo '<a href="login.php"> hello </a>';
  }else{
//echo out all of the following:
  }
  ?>

  <div class="top-bar-container" data-sticky-container>
    <div class="sticky" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
      <div class="top-bar">
        <div class="row column">
          <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
              <li class="menu-text">Site Title</li>
              <li class="has-submenu">
                <a href="#">One</a>
                <ul class="submenu menu vertical" data-submenu>
                  <li><a href="#">One</a></li>
                  <li><a href="#">Two</a></li>
                  <li><a href="#">Three</a></li>
                </ul>
              </li>
              <li><a href="#">Two</a></li>
              <li><a href="#">Three</a></li>
            </ul>
          </div>
 <!--      <div class="top-bar-right">
        <ul class="menu">
          <li>
            <input type="search" placeholder="Search">
        </li>
        <li>
            <button type="button" class="button">Search</button>
        </li>
    </ul>
  </div> -->
</div>
</div>
</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-4">
  <?php
//Create the connection
    //Use the Pitt server or for your local stack use "localhost"
  $host = "sis-teach-01.sis.pitt.edu"; 
    //Your Pitt username for the Pitt server and "root" for localhost
  $user = "asrikant";
    //Your password for the Pitt server and your password, if any, for localhost
  $password = "!S1059CMU&*";
    //Name of your db - Pitt username for Pitt, and whatever you named it for local
  $dbname = "asrikant";
  $connection = mysqli_connect($host, $user, $password, $dbname);
  if(mysqli_connect_errno()){
    die("Database connection failed: ".
      mysqli_connect_error() . 
      " (" . mysqli_connect_errno(). ")"
      );
  }else{
    if(isset($_SESSION['userID'])){
      $outfits = 'SELECT * FROM Outfit';
      $outfits .= ' WHERE user_id = ';
      $outfits .= $_SESSION['userID'];
      $result1 = mysqli_query($connection, $outfits);
      if(!$result1){
        die("Database query failed: Show outfits");
      }else{
        while($row1 = mysqli_fetch_assoc($result1)){

          echo  '<div class="column">';
          echo '<a href="my_outfit.php?id=';
          echo $row1['outfitID'];
          echo '">';
          echo '<img class="thumbnail" src="http://placehold.it/550x550">';
          echo '</a>';
          echo '<h5>My Site</h5>';
          echo '</div>';
        }
      }
    }
  }

  ?>
<!--     <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
    </div> -->
  <!-- <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
  </div>
  <div class="column">
      <img class="thumbnail" src="http://placehold.it/550x550">
      <h5>My Site</h5>
    </div> -->
  </div>

  <hr>

  <div class="row">
    <div class="medium-6 columns">
      <h3>Contact Me</h3>
      <p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus. Mauris iaculis porttitor.</p>
      <ul class="menu">
        <li><a href="#">Dribbble</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Yo</a></li>
      </ul>
    </div>
    <div class="medium-6 columns">
      <label>Name
        <input type="text" placeholder="Name">
      </label>
      <label>Email
        <input type="text" placeholder="Email">
      </label>
      <label>
        Message
        <textarea placeholder="holla at a designerd"></textarea>
      </label>
      <input type="submit" class="button expanded" value="Submit">
    </div>
  </div>
</div>
</div>
</div>

</form>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>



</body>
</html>