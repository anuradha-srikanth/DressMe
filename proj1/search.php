<?php session_start(); ?>


<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Syncopate" rel="stylesheet">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/search.css">
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


<br>
<br>

<form data-abide novalidate id='location'>
    <div class="row form_anu small-9 large-centered columns">
        <div class="small-6 large-centered columns">
          <label>City
            <input id='city' type="text" placeholder="City" aria-describedby="exampleHelpText" required>
            <span class="form-error">
              You had better fill this out, it's required.
          </span>
      </label>
      <p class="help-text" id="exampleHelpText">Here's how you use this input field!</p>
  </div>


  <div class="small-6 large-centered columns">
      <label> State/Country
        <input id='state' type="text" placeholder="State" aria-describedby="exampleHelpText" required >
        <span class="form-error">
          I'm required!
      </span>
  </label>
  <p class="help-text" id="exampleHelpText">Enter a state/country please.</p>
</div>

<div class="row">
    <fieldset class="small-3 small-centered columns">
      <button class="expanded button" type="submit" value="Submit">Submit</button>
  </fieldset>
</div>
</form>
<!-- <div class="row">
  <div class="small-6 large-centered columns">6 centered</div>
</div> -->
</div>

<br>
<br>
<br>
<br>

<div class="templates hidden">
    <div class="article">
        <div class="column">
            <br>
            <img class="thumbnail image" src="">
            <p> </p>
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
        <!-- <button class='addOutfit hidden'> Add to My Outfits </button> -->
        <!-- <input class='addOutfit hidden' type='button' /> -->
        <div id='addDiv'>
            <a href='my_profile.php'>
                <button class="button addOutfit hidden" >Add to Cart</button>
            </a>
        </div>
    </div>
</div>

<div id='divThat'>
    <!-- <p> 'hello' </p> -->
</div>

<script>
//maybe make a global results array
</script>
<script src="js/jquery-3.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/script.js"></script>




</body>
</html>