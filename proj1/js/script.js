



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
    var allCategories = ['Category_top', 'Category_bottom', 'Category_outerwear', 'Category_shoes', 'Category_accessories' ];
    for (var i=0; i<allCategories.length; i++){
      //console.log(i);
      var results_array = '';
      //randomly picks a subcategory out of category
      var subCat = (pickSubCategories(results_array, allCategories[i]));
      //randomly picks an article out of chosen subcategory
      //console.log(subCat);
      //var article = pickOutfit(subCat);

      //appends the article 
      // var show = showArticle(results_array, article);
      // if(!show){
      //   console.log("choice failure");
      // }
    }
  });

});

function getWeather(city,state){
  var state1 = encodeURIComponent(state);
  var city1 = encodeURIComponent(city);
  $.ajax({
    url : "http://api.wunderground.com/api/e1a14a833d1ce535/geolookup/conditions/q/" + state1+ "/" + city1 +".json",
    dataType : "jsonp",
    success : function(parsed_json) {
      var location = parsed_json['location']['city'];
      var temp_f = parsed_json['current_observation']['temp_f'];
      alert("Current temperature in " + location + " is: " + temp_f);
      console.log(parsed_json);
    }
  });

}


/* 
 * pickSubCategories - This function takes in a category and  randomly picks a
 *                     subcategory within it. 
 */
 function pickSubCategories(results_array, categoryName){
  console.log('1');
  var request = $.ajax({
    //async: false, 
    //dataType: 'json',
    url: "js/randSubcategory.php",
    type: "post",
    data: {categoryName: categoryName}
  }).done(function(results){
    var jsonString =  (JSON.parse(results)).name;
    pickOutfit(results_array, jsonString);

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
