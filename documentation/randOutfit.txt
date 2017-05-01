<?php
/*randSubcategory.php - This file contains helper functions for search.php. 
                        This code is called from script.js using an AJAX call 
                        and the POST method to send information. This file mainly
                        queries the daatabase to look for an outfit in the 
                        requested caategory of clothing.  It also randomizes 
                        the results so that the first category isnt returned always 
                        for similar weather conditions.

                           Concepts:
                           1. Database queries and results processing
                           2. Random selection
 */
 ?>

<?php
if(isset($_POST['subCatName'])){
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
    $show_outfit = 'SELECT * FROM ';
    $show_outfit .= $_POST['subCatName'];
    $result1 = mysqli_query($connection, $show_outfit);
    if(!$result1){
      die("Database query failed: Show categories");
    }else{
      $resultsArray = [];
      while($row1 = mysqli_fetch_assoc($result1)){
        array_push($resultsArray, $row1);
      }
      $rand = rand(0,count($resultsArray));
      echo 'var jsArray = '.($resultsArray[$rand]). ';\n';
    }
  }

}
?>

