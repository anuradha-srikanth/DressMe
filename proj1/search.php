<?php session_start(); ?>


<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
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
                <ul class="dropdown menu" data-dropdown-menu>
                  <li class="menu-text">Site Title</li>
                  <li class="has-submenu">
                    <a href="#">One</a>
                    <ul class="submenu menu vertical" data-submenu>
                      <li><a href="#">One</a></li>
                      <li><a href="#">Two</a></li>
                      <li><a href="#">Three</a></li>
                  </ul>
              </li>
              <li><a href="#">Two</a></li>
              <li><a href="#">Three</a></li>
          </ul>
      </div>
 <div class="top-bar-right">
<!--         <ul class="menu">
          <li>
            <input type="search" placeholder="Search">
        </li>
        <li>
            <button type="button" class="button">Search</button>
        </li>
    </ul> -->
    <?php 

if(isset($_SESSION['userID'])){
    echo "<ul class='menu'> <li> Hi, ";
    echo $_SESSION['username'];
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


<!-- <div id="hide_form">

    <form id='location'>
        <input name='location' id='city' type='textbox' placeholder='City'>
        <input name='location' id='state' type='textbox' placeholder="State"> 
        <button type='submit' id='sub' placeholder='SUBMIT' value='Submit'> </button>
    <div class="large-12 columns">
    <a href="my_outfit.php" type="submit" name="location" class="button expand large">Submit</a>
</div>

</form>

</div>
-->
<br>
<br>

<form data-abide novalidate id='location'>
    <div class="row form_anu small-9 large-centered columns">
        <div class="small-6 large-centered columns">
          <label>Number Required
            <input id='city' type="text" placeholder="City" aria-describedby="exampleHelpText" required>
            <span class="form-error">
              Yo, you had better fill this out, it's required.
          </span>
      </label>
      <p class="help-text" id="exampleHelpText">Here's how you use this input field!</p>
  </div>


  <div class="small-6 large-centered columns">
      <label>Password Required
        <input id='state' type="text" placeholder="State" aria-describedby="exampleHelpText" required >
        <span class="form-error">
          I'm required!
      </span>
  </label>
  <p class="help-text" id="exampleHelpText">Enter a password please.</p>
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