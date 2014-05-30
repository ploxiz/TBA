/* (c) 2014 https://github.com/ploxiz/TBD */
$(document).ready(function() {

    var keyWord = null;

    // click the submit button in case of pressing the ENTER key.
    $("#keyword").keypress(function(e){
        if(e.keyCode == 13)
            $("#submit-button").click();
    });

    // basically the main() function.
    $("#submit-button").click(function() {
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

                    $("#wikipedia-result").html(paragraph);
            })
        }
    };

    var twitter = {
        name: "Twitter",
        address: "http://twitter.com/"
    };

});