

var allCategories = ['Category_top', 'Category_bottom', 'Category_outerwear', 'Category_shoes', 'Category_accessories' ];
var resultsArray = '';
var weatherArray = [];

/* This function fires as soon as the index page loads. It will listen for
 * key events and process them accordingly. 
 */
 $(function(){
  //document.cookie = 'user = "ANu"';
  $("#location").submit(function(){
    event.preventDefault();
    var city = $("#city").val();
    var state = $("#state").val();
    //weather is an array of different weather conditions 
    var weather = getWeather(city,state);
    
    // for (var i=0; i<allCategories.length; i++){
    //   //randomly picks a subcategory out of category
    //   var subCat = (pickSubCategories(resultsArray, allCategories[i]));
    //   //randomly picks an article out of chosen subcategory
    // }
  });

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
      weatherArray
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
      var subCat = (pickSubCategories(weatherArray, resultsArray, allCategories[i]));
    }

  }
});

}


/* 
 * pickSubCategories - This function takes in a category and  randomly picks a
 *                     subcategory within it. 
 */
 function pickSubCategories(weatherArray, resultsArray, category_name){
  console.log('1');
  var request = $.ajax({
    //async: false, 
    //dataType: 'json',
    url: "js/randSubcategory.php",
    type: "post",
    data: {categoryName: category_name,
           tempFeelsLike: weatherArray[2],
           rainBool: weatherArray[3],
           snowBool: weatherArray[4]}
  }).done(function(results){
    console.log(results);
    console.log(typeof JSON.parse(results));
    var jsonString =  (JSON.parse(results)).name;
    pickOutfit(resultsArray, jsonString);

  }).fail(function(){
    console.log("ERROR");
    //return 'null';
  });

}

function pickOutfit(array, subCategory){
  //   var request = $.ajax({
  //   url: "js/randOutfit.php",
  //   type: "post",
  //   data: {subCatName: subCategory}
  // }).done(function(results){
  //   console.log(results);
  //   //document.getElementById("divThat").innerHTML = results;
  //   //$('.divThat').html(results);
  //   return results;
  // }).fail(function(){
  //   console.log("ERROR");
  // })
  var subCat = subCategory.toLowerCase();
  $.ajax({
      url : "http://api.shopstyle.com/api/v2/products?pid=uid2009-39252003-12&cat=" + subCategory + "&offset=0&limit=30",//"http://api.shopstyle.com/api/v2/categories?pid=uid2009-39252003-12",
      dataType : "json",
      success : function(article) {
          // var location = parsed_json['location']['city'];
          // var temp_f = parsed_json['current_observation']['temp_f'];
          // alert("Current temperature in " + location + " is: " + temp_f);
          // cojhhnsole.log(parsed_json);
          // var img =  parsed_json['products'][0]['image']['sizes']['Original']['url'];
          // document.getElementById("also").innerHTML = "<img src='" + img + "' </img>"
          var length = article.products.length;
          var rand = Math.floor(Math.random()*10)%(length-1);
          //console.log(rand);

          showArticle(array, article.products[rand]);

        }
      });
}

function showArticle(array, article){
// console.log(1);
console.log(article);
var temp = "<img src='" + article.image.sizes.IPhoneSmall.url +"'>"
//array.push(temp);
array += temp;
//return temp;
}

function showResults(results){
  var html = "";
  $.each(results, function(index,value){
    html += '<p>' + value.Title + '</p>';
    console.log(value.Title);
  });
  $('#search-results').html(html);
}




/*
function getRequest(searchRequest){
    var params = {
        s: searchRequest,
        r: 'json'
    };
    url = 'http://api.wunderground.com/api/e1a14a833d1ce535/geolookup/conditions/q/';

    $.getJSON(url,params,function(data){
        //showResults(data.Search);
        console.log(data.Search);
    });
}

*/

function getOutfits(x){
  // var state1 = encodeURIComponent(state);
  // var city1 = encodeURIComponent(city);
  // $.ajax({
  //   url : "http://api.wunderground.com/api/e1a14a833d1ce535/geolookup/conditions/q/" + state1+ "/" + city1 +".json",
  //   dataType : "jsonp",
  //   success : function(parsed_json) {
  //     var location = parsed_json['location']['city'];
  //     var temp_f = parsed_json['current_observation']['temp_f'];
  //     alert("Current temperature in " + location + " is: " + temp_f);
  //     console.log(parsed_json);
  //   }
  // });

  $.ajax({
      url : "http://api.shopstyle.com/api/v2/products?pid=uid2009-39252003-12&cat=camisole-tops&offset=0&limit=10",//"http://api.shopstyle.com/api/v2/categories?pid=uid2009-39252003-12",
      dataType : "json",
      success : function(parsed_json) {
          // var location = parsed_json['location']['city'];
          // var temp_f = parsed_json['current_observation']['temp_f'];
          // alert("Current temperature in " + location + " is: " + temp_f);
          console.log(parsed_json);
          var img =  parsed_json['products'][0]['image']['sizes']['Original']['url'];
          document.getElementById("also").innerHTML = "<img src='" + img + "' </img>"

        }
      });

}


//http://api.shopstyle.com/api/v2/categories?pid=YOUR_API_KEY


var showResult = function(question){
  var result = "<"

  //brandedName
}


/*
 * getArticles - this function takes in a category and randomly selects one 
 *               article of clothing from the array that is returned from the
 *               api call. It also appends the results of this random selection
 **              to the 
 */
 var getArticles = function(category) {

//you get the category 
$.ajax({
      url : "http://api.shopstyle.com/api/v2/products?pid=uid2009-39252003-12&cat=" + category + "&offset=0&limit=10",//"http://api.shopstyle.com/api/v2/categories?pid=uid2009-39252003-12",
      dataType : "json",
      // success : function(\arsed_json) {
      //     // var location = parsed_json['location']['city'];
      //     // var temp_f = parsed_json['current_observation']['temp_f'];
      //     // alert("Current temperature in " + location + " is: " + temp_f);
      //     console.log(parsed_json);
      //     var img =  parsed_json['products'][0]['image']['sizes']['Original']['url'];
      //     document.getElementById("also").innerHTML = "<img src='" + img + "' </img>";

      //   }
    })
  .done(function(result){ //this waits for the ajax to return with a succesful promise object

    var searchResults = showResult(result)
    console.log(result);
    var img =  result['products'][0]['image']['sizes']['Original']['url'];
          //document.getElementById("also").innerHTML = "<img src='" + img + "' </img>";




          $('.results').html(searchResults);
    //$.each is a higher order function. It takes an array and a function as an argument.
    //The function is executed once for each item in the array.
    $.each(result.items, function(i, item) {
      var article = showOutfit(item);
      $('.results').append(question);
    });
  })
  .fail(function(jqXHR, error){ //this waits for the ajax to return with an error promise object
    var errorElem = showError(error);
    $('.search-results').append(errorElem);
  });
};
