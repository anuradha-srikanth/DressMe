<?php
//echo "<script> console.log('hello'); </script>";
//echo 'hello';
//print_r($_POST);
if(isset($_POST['categoryName'])){
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
    //print_r($_POST['categoryName']);
    // print_r("\n");
    $show_subcategories = 'SELECT * FROM ';
    $show_subcategories .= $_POST['categoryName'];
    //print_r($show_subcategories);
    $result1 = mysqli_query($connection, $show_subcategories);
    if(!$result1){
      die("Database query failed: Show categories");
    }else{

      $resultsArray = [];
      while($row1 = mysqli_fetch_assoc($result1)){
        //print_r(gettype($row1));
        array_push($resultsArray, $row1);
      }
      $rand = rand(0,count($resultsArray)-1);

      //this line returns an object
      echo json_encode(($resultsArray[$rand]));
    }
  }

}
?>

