<?php session_start(); ?>

<?php 

if(isset($_POST['art1'])){
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
    print_r($_SESSION);
    echo $_SESSION['userID'];
    if(isset($_SESSION['userID'])){
        $outf = 'INSERT INTO Outfit (shoeProductID, bottomProductID, topProductID, accessoryProductID, outerwearProductID, user_id) VALUES (';
        $outf .= $_POST['art1'];
        $outf .= " , ";
        $outf .= $_POST['art2'];
        $outf .= " , ";
        $outf .= $_POST['art3'];
        $outf .= " , ";
        $outf .= $_POST['art4'];
        $outf .= " , ";
        $outf .= $_POST['art5'];
        $outf .= " , ";
        $outf .= $_SESSION['userID'];
        $outf .= " ) ";
    //print_r($outf);
        $result1 = mysqli_query($connection, $outf);
        if(!$result1){
          die("Database query failed: Show categories");
      }else{
        echo 'success';
    }
}else{
    echo 'Please sign in to add outfits to your acount';
}
//echo $_POST['art2'];
  // echo 'success'; //json_encode(($resultsArray[$rand]));
}
}


?>