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
            $.getJSON("http://en.wikipedia.org/w/api.php?action=parse&format=json&callback=?", {
                page: page,
                prop:"text",
                redirects: false
            }).done(function(data) {
                var readData = $("<div>" + data.parse.text["*"] + "</div>");
                var paragraph = readData.find("p:first");
                $("#wiki_content").html(paragraph);
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