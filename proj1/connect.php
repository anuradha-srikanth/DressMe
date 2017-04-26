<!DOCTYPE HTML>
<html>
<head>
<title>
</title>
</head>
<body>
<p> Anuadh </p>

</body>
</html>


<?php
    //Create the connection
    //Use the Pitt server or for your local stack use "localhost"
    $host = "localhost"; //"sis-teach-01.sis.pitt.edu"; 
    //Your Pitt username for the Pitt server and "root" for localhost
    $user = "asrikant";
    //Your password for the Pitt server and your password, if any, for localhost
    $password = "!S1059CMU&*";
    //Name of your db - Pitt username for Pitt, and whatever you named it for local
    $dbname = "pitt";
    $connect = mysqli_connect($host, $user, $password, $dbname);
    if(mysqli_connect_errno()){
        die("Database connection failed: ".
            mysqli_connect_error() . 
            " (" . mysqli_connect_errno(). ")"
            );
    }else{
        $cat1 = "category1";
        $title1 = "title1";
        $date1 = null;
$insert_query = "INSERT INTO categories (";
$insert_query .= "categoryID, title, date";
$insert_query .= ") VALUES (";
$insert_query .= " '{$cat1}', $title, {$date}";
$insert_query .= ")";


        $show_categories = "SELECT * FROM categories";
        $result1 = mysqli_query($connection, $show_categories);
        if(!result1){
            die("Database query failed: Show categories");
        }else{
            while($row = mysqli_fetch_row($result1)){
                echo($row);
                echo( "<hr />");
            }
        }

    }

?>