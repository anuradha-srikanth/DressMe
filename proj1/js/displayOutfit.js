var items = ['#prodid1','#prodid2', '#prodid3','#prodid4','#prodid5'];

$(function(){

    for(var i=0; i<5; i++){
        console.log($(items[i]).text());
        var productid = $(items[i]).text();
        $.ajax({
            url : 'http://api.shopstyle.com/api/v2/products/' + productid + '?pid=uid2009-39252003-12',
            dataType : "json",
            success : function(article) {
                console.log(article);
                var result = $('.templates .article').clone();
                var imgDiv = result.find('img');
                imgDiv.attr('src', article.image.sizes.Large.url);
                result.find();
                $('.results .row').append(result);
            }
        });
    }

});