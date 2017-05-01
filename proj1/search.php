<!-- search.php - This file contains the weather clothing search capability
                  of this website. Inputing a location will fetch the weather of that particular location and applicable clothing choices for that location. 

                  The functionality works using AJAX and API calls to Weather Underground and ShopStyle.com. Entering a location makes an API call to Weather Underground, which returns information about the weather. This information is then processed and, using database data about which clothing categories map to which weather conditions, returns some viable categories. These categories are then used to make an API call to Shopstyle to return relevant clothing.

                  The majority of the processing and the logic of this function is carried out by: 
                  1. script.js (in js folder)
                  2. randSubCategory.php (in js folder)
                  3. randOutfit.php (in js folder)

                  Concepts:
                  1. AJAX usage to make API Calls
                  2. AJAX usage to reload only a portion of the webpage
                  3. js to php informtion sending thorugh AJAX and POST method
                  4. Database quering and processing

-->




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
                echo "</li> </ul>";
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
      </div>
    </form>

    <br>
    <br>
    <br>
    <br>

    <div class="templates hidden">

      <!-- <div class="article"> -->
      <!-- <div class="column"> -->
<!--     <br>
    <li>
      <img class="thumbnail image" src="">
    </li> -->
    <!-- <p> </p> -->
    <!-- </div> -->
    <li  class="article">
      <div class="image-hover-wrapper">
        <span class="image-hover-wrapper-banner"> </span>
        <a href="#">
          <img class="thumbnail image" src="">
          <span class="image-hover-wrapper-reveal">
            <p>Check it<br><i class="fa fa-link" aria-hidden="true"></i></p>
          </span>
        </a>
      </div>

    </li>
    <!-- </div> -->

    <div class="outfit">
      <div class="row small-up-2 medium-up-3 large-up-4">
      </div>
    </div>
  </div>

  <div class="container">
    <div class='results'>
      <ul class="r small-block-grid-2 medium-block-grid-3 large-block-grid-4">

      </ul>
    </div>
    <div id='addDiv'>
      <a href='my_catalogue.php'>
        <button class="button addOutfit hidden" >Add to Catalogue</button>
      </a>
    </div>

  </div>
<!-- </div>
-->

<script>
//maybe make a global results array
</script>
<script src="js/jquery-3.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="js/script.js"></script>




</body>
</html>