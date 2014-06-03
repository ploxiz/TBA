/* (c) 2014 https://github.com/ploxiz/TBD */
$(document).ready(function() {

    var keyWord = null;

    // associates pressing the ENTER key with clicking the submit-button
    $("#keyword-input").keypress(function(e) {
        if (e.keyCode == 13)
            $("#submit-button").click();
    });

    // basically the main() function.
    $("#submit-button").click(function() {
        keyWord = $("#keyword-input").val();
        wikipedia.callWikipediaAPI(keyWord.replace(" ", "_"));
        twitter.callTwitterAPI();
    });

    var wikipedia = {
        name: "Wikipedia",
        address: "http://en.wikipedia.org/",

        callWikipediaAPI : function(pageName) {
            $.getJSON("http://en.wikipedia.org/w/api.php?action=parse&format=json&callback=?", {
                    page: pageName,
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
        address: "http://twitter.com/",

        callTwitterAPI : function () {
            var base64BearerTokenCredentials = "SGloTUxpelFxMTRNcVhOajJaWExoazJ1TDpxQVE3V2V6UDF1ZWtiamFBQXo1c2hUUFhUV" +
                "HNUZnJvdnhZU2lyM0xtbzdwSDY1dkR4Nw==";

            $.ajax({
                type: "POST",
                url: "https://api.twitter.com/oauth2/token",
                headers: {
                    Authorization: "Basic " + base64BearerTokenCredentials,
                    contentType: "application/x-www-form-urlencoded;charset=UTF-8"
                },
                data: "grant_type=client_credentials",
                success: function(data, textStatus) {
                    // TODO:
                }
            });
        }
    };

});