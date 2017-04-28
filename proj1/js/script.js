
//var allCategories = ['Category_top', 'Category_bottom', 'Category_shoes'];
var allCategories = ['Category_top', 'Category_bottom', 'Category_outerwear', 'Category_shoes', 'Category_accessories' ];
var resultsString = '';
var weatherArray = [];
var resultsArray = [];

/* This function fires as soon as the index page loads. It will listen for
 * key events and process them accordingly. 
 */
 $(function(){
  $("#location").submit(function(){
    event.preventDefault();
    var city = $("#city").val();
    var state = $("#state").val();
    //weather is an array of different weather conditions 
    getWeather(city,state);
  });

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

   console.log(results);

 }).fail(function(){
  console.log("ERROR");
    //return 'null';
  });


})

});

 function getWeather(city,state){
  var state1 = encodeURIComponent(state);
  var city1 = encodeURIComponent(city);
  $.ajax({
    url : "http://api.wunderground.com/api/e1a14a833d1ce535/geolookup/conditions/q/" + state1+ "/" + city1 +".json",
    dataType : "jsonp",
    success : function(weather) {
      //var weatherArray = array('location'=>)
      // var weatherArray = [];
      //weatherArray
      var out = "<p id='make_white'> The temperature in " + weather['location']['city'] + " is " + weather['current_observation']['temp_f'] + " but feels like " + weather['current_observation']['feelslike_f'] + "</p>";
      $('.results .row').append(out);
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
  var request = $.ajax({
    //async: false, 
    //dataType: 'json',
    url: "js/randSubcategory.php",
    type: "post",
    data: {categoryName: categoryName,
     tempFeelsLike: weatherArray[2],
     rainBool: weatherArray[3],
     snowBool: weatherArray[4]}
   }).done(function(results){
   // console.log(results);
   var jsonString =  (JSON.parse(results)).name;
   //console.log(JSON.parse(results));
   pickOutfit(resultsString, jsonString);

 }).fail(function(){
  console.log("ERROR");
    //return 'null';
  });

}

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

function showArticle(array, article){
  console.log(article);
  resultsArray.push(article);

  var result = $('.templates .article ').clone();
  var imgDiv = result.find('img');
  imgDiv.attr('src', article.image.sizes.Large.url);
  var name = result.find('.image-hover-wrapper-banner');
  name.innerHTML = article.name;
  //var name = result.find('p');
//name.text = article.name;
// result = result+ "<h5> "+article.name +"</h5>";
$('.results .r').append(result);

if($('.addOutfit').hasClass("hidden")){
  $('.addOutfit').removeClass("hidden");
}
}



