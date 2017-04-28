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
            <ul class='menu icon-top'> <li><a href='search.php'><i class='fi-list'></i> <span> <p class="change_font"> Dress Me! </p></span></a></li></ul>
          </div>
          <div class="top-bar-right">

            <?php 

            if(isset($_SESSION['userID'])){
              echo '<ul class="dropdown menu" data-dropdown-menu>
              <li>
                <a href="#">Item 1</a>
                <ul class="menu">
                  <li><a href="#">Item 1A</a></li>
                  <!-- ... -->
                </ul>
              </li>
            </ul>';

        //       echo '<a href="#" data-dropdown="hover1" data-options="is_hover:true; hover_timeout:5000">Has Hover Dropdown</a>
        //       <ul id="hover1" class="f-dropdown" data-dropdown-content>
        //         <li><a href="#">This is a link</a></li>
        //         <li><a href="#">This is another</a></li>
        //         <li><a href="#">Yet another</a></li>
        //       </ul>';
            echo '<ul class="dropdown menu" data-dropdown-menu>
            <li>
              <a href="#">Item 1</a>
              <ul class="menu">
                <li><a href="#">Item 1A</a></li>
                <!-- ... -->
              </ul>
            </li>
            <li><a href="#">Item 2</a></li>
            <li><a href="#">Item 3</a></li>
            <li><a href="#">Item 4</a></li>
          </ul>';


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
          <!-- <img src="https://images.pexels.com/photos/163704/bike-old-wheel-two-wheeled-vehicle-163704.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb"> -->
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
      <!-- <div class="row small-up-2 medium-up-3 large-up-4"> -->
      <!-- <p> 'hello' </p> -->
      <ul class="r small-block-grid-2 medium-block-grid-3 large-block-grid-4">
        <!-- <div class="contain"> -->
        <!-- </div> -->
      </ul>
    </div>
    <!-- <button class='addOutfit hidden'> Add to My Outfits </button> -->
    <!-- <input class='addOutfit hidden' type='button' /> -->
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