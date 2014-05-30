$(document).ready(function() {

    var keyWord = null;

    $("#submit-button").click(function() { // basically the 'main' function.
        keyWord = $("#keyword").val();
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

                    $("#wikipedia-content").html(paragraph);
            })
        }
    };

    var reddit = {
        name: "Reddit",
        address: "http://reddit.com/"
    };

    var twitter = {
        name: "Twitter",
        address: "http://twitter.com/"
    };

});