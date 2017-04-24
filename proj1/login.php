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
                        <a href="search.php" type="submit" name="existingUser"class="button expand large">Login</a>
                    </div>
                </div>
            </div>
            <div class="tabs-panel" id="panelRegister">
                <div class="row">
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
                        <a href="search.php" type="submit" name="newUser" class="button expand large">Sign Up</a>
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
    <script src="js/login-processing.js"></script>

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
    }else if($_POST){
    #validate?
        if(isset($_POST['existingUser'])){
           $username = $_POST['username'];
           $pwd = $_POST['password'];
           if(empty($username)||empty($pwd)){
            echo "Please enter both username and password";
        }
        else{
        #validate username and password
            $query = "SELECT userID FROM User WHERE username = '$username' AND password = '$pwd'";
            $userquery = mysqli_query($connection, $query);
        //echo($userquery);
            $returned_rows = mysqli_num_rows($userquery);
            if($returned_rows == 0){
                echo "This is not a valid username or incorrect password";
            } 
            else{
                $_SESSION['username'] = $username;
                $result = mysqli_fetch_assoc($userquery);
                $_SESSION['userID'] = $result['userID'];
                $_SESSION['login'] = true;
                header('Location: search.php');
            }
        }
    }
}

?>
</body>
</html>
