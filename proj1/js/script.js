// script.js - This file contains helper functions for the search capability
//             on the search.php page. It basically takes in the information
//             from HTML page, listens for events and calls functions accordingly.

//             Concepts:
//             1. Javascript and jQuery Library functions
//             2. Event handling and actions
//             3. JSON data processing and sending
//             4. AJAX and API calling


var allCategories = ['Category_top', 'Category_bottom', 'Category_outerwear', 'Category_shoes', 'Category_accessories' ];
var resultsString = '';
var weatherArray = [];
var resultsArray = [];

/* This function fires as soon as the index page loads. It will listen for
 * key events and process them accordingly. 
 */
 $(function(){

  //when the user submits a location in the form, the getWeather function 
  //is called. 
  $("#location").submit(function(){
    event.preventDefault();
    var city = $("#city").val();
    var state = $("#state").val();
    //weather is an array of different weather conditions 
    getWeather(city,state);
  });

//when the user chooses to add the outfit to his catalogue, this function is
//called and an AJAX request with the items data is sent to 
//addOutfitToProfile.php to process and add to database
$('.addOutfit').click(function(){
  var request = $.ajax({
    url: "js/addOutfitToProfile.php",
    type: "post",
    data: {
      art1: (resultsArray[0]).id,
      art2: (resultsArray[1]).id,
      art3: (resultsArray[2]).id,
      art4: (resultsArray[3]).id,
      art5: (resultsArray[4]).id
    }
  }).done(function(results){
    alert("You have successfully added this outfit to your database");
  }).fail(function(){
    alert("An error has occured when adding your outfit");
    console.log("ERROR");
  });
})

});


/*
 *  getWeather - This function is called after the user enters a location
 *               into the form. An API call is made to weather underground
 *               with the city and state information to return weather data.
 *               A call is made to pickSubCategories function with this data
 *               as input.
 *
 */

 function getWeather(city,state){
  //encoded so that input into API calls are safe and within accepted data
  //as requested by the API Weather Underground
  var state1 = encodeURIComponent(state);
  var city1 = encodeURIComponent(city);
  $.ajax({
    url : "http://api.wunderground.com/api/e1a14a833d1ce535/geolookup/conditions/q/" + state1+ "/" + city1 +".json",
    dataType : "jsonp",
    success : function(weather) {
      var out = "<p id='make_white'> The temperature in " + weather['location']['city'] + " is " + weather['current_observation']['temp_f'] + " but feels like " + weather['current_observation']['feelslike_f'] + "</p>";
      $('.results .row').append(out);

      //various variables are ppulated with weather data
      var location = weather['location']['city'];
      var temperature = weather['current_observation']['temp_f'];
      var feelslike = weather['current_observation']['feelslike_f'];
      weatherArray.push(location); //at index 0
      weatherArray.push(temperature); //at index 1
      weatherArray.push(feelslike); //at index 2
      var precipBool = !!(weather['current_observation']['precip_today']);
      var weatherString = weather['current_observation']['weather'];
      if(precipBool || weatherString.toLowerCase().includes("rain")){
        var rainBool = 'true';
      }else{
        var rainBool = 'false';
      }if(precipBool || weatherString.toLowerCase().includes("snow")){
        var snowBool = 'true';
      }else{
        var snowBool = 'false';
      }
      weatherArray.push(rainBool); //at index 3
      weatherArray.push(snowBool); //at index 4

      for (var i=0; i<allCategories.length; i++){
      //randomly picks a subcategory out of category
      pickSubCategories(weatherArray, resultsString, allCategories[i]);
    }

  }
});

}


/* 
 * pickSubCategories - This function takes in a category and  randomly picks a
 *                     subcategory within it. 
 */
 function pickSubCategories(weatherArray, resultsString, categoryName){
  //ajax call to randSubcategory.php page to exchange information
  // with database
  var request = $.ajax({
    url: "js/randSubcategory.php",
    type: "post",
    data: {categoryName: categoryName,
     tempFeelsLike: weatherArray[2],
     rainBool: weatherArray[3],
     snowBool: weatherArray[4]}
   }).done(function(results){

    //if processing is successful, pickOutfit function is called with the 
    //category information
     var jsonString =  (JSON.parse(results)).name;
     pickOutfit(resultsString, jsonString);

   }).fail(function(jqXHR, textStatus, errorThrown) {
    console.log("request failed" +textStatus);
  });

 }

 /* 
 * pickOutfit- This function takes in a subcategory and makes an API call to
 *             Shopstyle.com. It will then call showArticle if successfully 
 *             returns results.  
 */

 function pickOutfit(array, subCategory){

  var subCat = subCategory.toLowerCase();
  $.ajax({
      url : "http://api.shopstyle.com/api/v2/products?pid=uid2009-39252003-12&cat=" + subCat + "&offset=0&limit=300",//"http://api.shopstyle.com/api/v2/categories?pid=uid2009-39252003-12",
      dataType : "json",
      success : function(article) {
        var length = article.products.length;
        console.log(length);
        var rand = Math.floor(Math.random()*10)%(length-1);

        showArticle(array, article.products[rand]);

      }
    });
}

 /* 
 * showArticle - This function clones a HTML template and appends the
 *               relevant information to this template and displays it.
 */

function showArticle(array, article){
  console.log(article);
  resultsArray.push(article);

  //This is a HTML template
  var result = $('.templates .article ').clone();
  var imgDiv = result.find('img');
  imgDiv.attr('src', article.image.sizes.Large.url);
  var name = result.find('.image-hover-wrapper-banner');
  name.innerHTML = article.name;
$('.results .r').append(result);

if($('.addOutfit').hasClass("hidden")){
  $('.addOutfit').removeClass("hidden");
}
}



