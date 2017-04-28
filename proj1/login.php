<?php session_start(); 

    //Create the connection
    //Use the Pitt server or for your local stack use "localhost"
//$host = "sis-teach-01.sis.pitt.edu"; 
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
        // echo "<p> AAAAAAAAAAAA </p>";
}else if($_POST){
    print_r($_POST);
    #validate?
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        if(empty($username)||empty($pwd)){
            echo "Please enter both username and password";
        }
        else{
                #validate username and password
            $query = "SELECT user_id FROM User WHERE username = '$username' AND password = '$pwd'";
            $userquery = mysqli_query($connection, $query);
                //echo($userquery);
            $returned_rows = mysqli_num_rows($userquery);
            if($returned_rows == 0){
                echo "This is not a valid username or incorrect password";
            } 
            else{
                    //echo "Login information stored";
                $_SESSION['username'] = $username;
                $result = mysqli_fetch_assoc($userquery);
                $_SESSION['userID'] = $result['user_id'];
                $_SESSION['login'] = true;
                    // echo '<p>' . $_SESSION['userID'] . '</p>';
                header('Location: search.php');
            }
        }
    }
    else if(!empty($_POST['newUsername']) && !empty($_POST['newPassword'])){
        $username = $_POST['newUsername'];
        $pwd = $_POST['newPassword'];
        $email = $_POST['email'];
        if(empty($username)||empty($pwd)||empty($email)){
            echo "Please enter username, password and email";
        }
        else if(isset($_SESSION['userID'])){
            $addUser = 'INSERT INTO User (username , password) VALUES ( "';
            $addUser .= $_POST['newUsername'];
            $addUser .= '" , "';
            $addUser .= $_POST['newPassword'];
            $addUser .= '" )';
            echo $addUser;
            $result1 = mysqli_query($connection, $addUser);
            if(!$result1){
                die("Database query failed: Add User");
            }else{
                //echo 'success';
                $style1 = 'dress-pant';
                $color1 = 'blue';
                $pref = 'INSERT INTO Preferences (color , style , user_id) VALUES ("';
                $pref .= $color1 .'", "';
                $pref .= $style1 .'", ';//", 'dress-pant' , '";
                $pref .= $_SESSION['userID'];
                $pref .= ')';

                echo $pref;
                $result2 = mysqli_query($connection, $pref);
                echo $result2;
                if(!$result2){
                    die("Database query failed: Add Preference");
                }else{
                    echo 'Successfully made an account! Please sign in.';
                }
            }
        }
    }else{
        echo 'Please enter username and password';
    }
}

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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div id="background-img">
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<form class="medium-4 medium-offset-4 columns" action="login.php" method="post">
    <div class="row">
        <div class="large-12 columns">

            <!-- foundation tabs -->
            <ul class="tabs" data-tabs id="loginTabs">
              <li class="tabs-title is-active"><a href="#panelLogin" aria-selected="true">Login</a></li>
              <li class="tabs-title"><a href="#panelRegister">Register</a></li>
          </ul>

          <div class="tabs-content" data-tabs-content="loginTabs">
              <div class="tabs-panel is-active" id="panelLogin">
                 <div class="row">
                     <div class="large-12 columns hidden">
                        <label>Existing User
                            <input type="text" name="existingUser" placeholder="existingUser" value="existingUser">
                        </label>
                    </div>
                    <div class="large-12 columns">
                        <label>Username
                            <input type="text" name="username" placeholder="">
                        </label>
                    </div>
                    <div class="large-12 columns">
                        <label>Password
                            <input type="password" name="password" placeholder="">
                        </label>
                    </div>
                    <div class="large-6 columns text-right">
                        <div class="switch small">
                          <input class="switch-input" id="largeSwitch" type="checkbox" name="exampleSwitch">
                          <label class="switch-paddle" for="largeSwitch">
                            <span class="show-for-sr">Show Large Elephants</span>
                        </label>
                    </div>
                </div>
                <div class="large-6 columns">
                    Remember me
                </div>
                <div class="large-12 columns">
                    <!-- <label> Login -->
                    <input class='button expanded large' name='submit' value='login' type='submit'>
                    <!-- </label> -->
                    <!-- <a href="search.php" type="submit" name="existingUser" class="button expand large">Login</a> -->

                </div>
                <div class="large-12 columns">
                    <a href="search.php" class='skip float-right'> Skip for now </a>
                </div>
<!--                     <div class="large-12 columns">
                        <a type="submit" name="existingUser"class="button expand large">Login</a>
                    </div> -->
                    <!-- <input type=submit value="Submit"> -->
<!--                     <div class="large-12 columns">
                        <a href="my_profile.php" type="submit" name="existingUser"class="button expand large">Login</a>
                    </div> -->
                </div>
            </div>
            <div class="tabs-panel" id="panelRegister">
                <div class="row">
                    <div class="large-12 columns hidden">
                        <label>New User
                            <input type="text" name="newUser" placeholder="newUser" value="newUser">
                        </label>
                    </div>
                    <div class="large-12 columns">
                        <label>Username
                            <input type="text" name="newUsername" placeholder="">
                        </label>
                    </div>
                    <div class="large-12 columns">
                        <label>Email
                            <input type="text" name="email" placeholder="">
                        </label>
                    </div>
                    <div class="large-12 columns">
                        <label>Password (6 char minimum)
                            <input type="password" name="newPassword" placeholder="">
                        </label>
                    </div>
                    <div class="large-12 columns">
                        <label>Confirm Password
                            <input type="password" name="confirmPassword" placeholder="">
                        </label>
                    </div>

                    <div class="large-12 columns">
                        <!-- <label> Login -->
                        <input class='button expanded large' name='submit' value='login' type='submit'>
                        <!-- </label> -->
                        <!-- <a href="search.php" type="submit" name="existingUser" class="button expand large">Login</a> -->
                    </div>

<!--                     <div class="large-12 columns">
                        <a href="search.php" type="submit" name="newUser" class="button expand large">Sign Up</a>
                    </div> -->
<!--                     <div class="large-12 columns">
                        <a type="submit" name="newUser" class="button expand large">Sign Up</a>
                    </div> -->
                    <!--                     <input type=submit value="Submit"> -->
<!--                     <div class="large-12 columns">
                        <a href="my_profile.php" type="submit" name="newUser" class="button expand large">Sign Up</a>
                    </div> -->
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