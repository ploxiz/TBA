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
                prop: text,
                redirects: false, // handles redirects
                section: 1
            }).done(function(data, textStatus) {
                $("#results").html(textStatus + "<br />")
                             .append(toFinalForm(data));
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

    // Wikipedia functions.
    function toFinalForm(data) {
        // TODO: Sterge tot astfel incat sa ramana doar primul paragraf.


    }

    // Twitter functions

    // Facebook functions

});