<?php session_start(); ?>


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
  <div class="templates hidden">
    <div class="article">
      <div class="column">
        <img class="thumbnail image" src="">
        <h5>My Site</h5>
      </div>
    </div>
    <div class="outfit">
      <div class="row small-up-2 medium-up-3 large-up-4">
      </div>
    </div>
  </div>

  <div class="container">
    <div class='results'>
      <div class="row small-up-2 medium-up-3 large-up-4">
        <!-- <p> 'hello' </p> -->
      </div>
    </div>
  </div>
  <?php 

//echo $_GET['id'];

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
    if(isset($_GET['id'])){
      $outfitID = $_GET['id'];

    // if(isset($_SESSION['userID'])){
      $outfits = 'SELECT * FROM Outfit';
      $outfits .= ' WHERE outfitID = ';
      $outfits .= $outfitID;
      $result1 = mysqli_query($connection, $outfits);
      if(!$result1){
        die("Database query failed: Show outfit");
      }else{
        while($outfitItem = mysqli_fetch_assoc($result1)){

              // echo  '<div class="column">';
              // echo '<a href="my_outfit.php?id=';
              // echo $row1['outfitID'];
              // echo '">';
              // echo '<img class="thumbnail" src="http://placehold.it/550x550">';
              // echo '</a>';
              // echo '<h5>My Site</h5>';
              // echo '</div>';
          echo '<div id="prodid1" class="hidden">'.$outfitItem["shoeProductID"].'</div>' ;
          echo '<div id="prodid2" class="hidden">'. $outfitItem["bottomProductID"]. '</div>' ;
          echo '<div id="prodid3" class="hidden">'.$outfitItem["topProductID"].'</div>' ;
          echo '<div id="prodid4" class="hidden">'.$outfitItem["accessoryProductID"].'</div>' ;
          echo '<div id="prodid5" class="hidden">'.$outfitItem["outerwearProductID"].'</div>' ;


        }
      }
    }
  }
  // }

  ?>



  <script src="js/jquery-3.1.1.js"></script>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script src="js/app.js"></script>
  <script src="js/displayOutfit.js"></script>
</body>
</html>