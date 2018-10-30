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



    <div class="top-bar-container" data-sticky-container>
        <div class="sticky" data-sticky data-options="anchor: page; marginTop: 0; stickyOn: small;">
          <div class="top-bar">
            <div class="row column">
              <div class="top-bar-left">
                  <ul class='menu icon-top'> <li><a href='search.php'><i class='fi-list'></i> <span> <p class="change_font"> Dress Me! </p></span></a></li>
                  </div>
                  <div class="top-bar-right">

                    <?php 

                    //This ensures that you can only see profile and catalogue if youre logged in

                    if(isset($_SESSION['userID'])){
                        echo "<ul class='menu icon-top'> <li><a href='my_profile.php'><i class='fi-list'></i> <span>My Profile</span></a></li> <li><a href='my_catalogue.php'><i class='fi-list'></i> <span>My Catalogue</span></a></li>";
                        echo "</li> </ul>";
                    }else{
                        echo "<ul class='menu'> <li> <a href='login.php'> Login </a>";
                        echo "</li> </ul>";
                    }
                    ?>

             s   </div>
            </div>
        </div>
    </div>


    <div class="row medium-8 large-7 columns">
      <div class="blog-post">

        <img class="thumbnail" src="img/profile.jpg">



    </div>
    <h1> Username: <?php echo $_SESSION['username']; ?> </h1>
</div>



<?php

//Create the connection
    //Use the Pitt server or for your local stack use "localhost"
// $host = "sis-teach-01.sis.pitt.edu"; 
$host = "localhost"; 
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
    //echo "hello";
    if(isset($_SESSION['userID'])){
        //echo "hello123";
        $outfits = 'SELECT * FROM Preferences';
        $outfits .= ' WHERE user_id = "';
        $outfits .= $_SESSION['userID'];
        $outfits .= '"';
        $result1 = mysqli_query($connection, $outfits);
        if(!$result1){
            die("Database query failed: Show Profile");
        }else{
            //print_r($result1);
            while($row1 = mysqli_fetch_assoc($result1)){
                echo '<div class="row medium-8 large-7 columns">';
                echo "Color: ".$row1['color'].'<br>';
                echo "Style: ".$row1['style'].'<br>';
                echo '</div>';
            }

        }
    }else{
        echo 'Please log in before you can see your profile';
    }
}

?>


<script src="js/jquery-3.1.1.js"></script>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
</body>
</html>