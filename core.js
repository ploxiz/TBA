$(document).ready(function() {

    var keyWord = null;

    $("#submit").click(function() { // basically the 'main' function.
        keyWord = $("#key").val();

        wikipedia.callWikipediaAPI(keyWord.replace(" ", "_"));
    });

    var wikipedia = {
        name: "Wikipedia",
        address: "http://en.wikipedia.org/",

        callWikipediaAPI : function(page) {
            $.getJSON("http://en.wikipedia.org/w/api.php?action=parse&format=json&callback=?", function(data, textStatus) {
                $("#results").html(textStatus); // TODO: data retine tot continutul paginii, practic in el gasim informatiile care ne intereseaza
            })
        }
    };

    var twitter = {
        name: "Twitter",
        address: "http://twitter.com/"
    };

    var facebook = {
        name: "Facebook",
        address: "http://facebook.com/"
    };

});