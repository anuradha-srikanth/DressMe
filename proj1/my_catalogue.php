<?php session_start(); 

?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Syncopate" rel="stylesheet">
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/my_catalogue.css">
</head>
<body>
  <?php if(!(isset($_SESSION['login']) && ($_SESSION['login'] == true))){
    echo 'Please Login before you can access this information';
    echo '<a href="login.php"> Login </a>';
  }else{
//echo out all of the following:
  }
  ?>

  <div class="top-bar-container" data-sticky-container>
    <div class="sticky" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
      <div class="top-bar">
        <div class="row column">
          <div class="top-bar-left">
            <ul class='menu icon-top'> <li><a href='search.php'><i class='fi-list'></i> <span> <p class="change_font"> Dress Me! </p></span></a></li> </ul>
          </div>
          <div class="top-bar-right">

            <?php 

            if(isset($_SESSION['userID'])){
              echo "<ul class='menu icon-top'> <li><a href='my_profile.php'><i class='fi-list'></i> <span>My Profile</span></a></li> <li><a href='my_catalogue.php'><i class='fi-list'></i> <span>My Catalogue</span></a></li>";
        //echo "<li><a href='my_profile.php'><i class='fi-list'></i> <span>My Profile</span></a></li>";
              echo "</li> </ul>";
        //echo ""
            }else{
              echo "<ul class='menu'> <li> <a href='login.php'> Login </a>";
              echo "</li> </ul>";
            }
            ?>

          </div> 
        </div>
      </div>
    </div>
  </div>




  <?php
  if(isset($_SESSION['userID'])){
    echo "<div class='welcome'> <p>Hi, ";
    echo $_SESSION['userID'];
    echo "! </p> </div>";
  }else{
    echo "Please login to access this page";
  }

  ?>


  <div class="row small-up-2 medium-up-3 large-up-4">
    <?php
//Create the connection
    //Use the Pitt server or for your local stack use "localhost"
  $host = "sis-teach-01.sis.pitt.edu";
  //$host = "localhost";  
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

  </div>

  <hr>

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