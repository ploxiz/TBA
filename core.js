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
                redirects: false
            }).done(function(data, textStatus) {
                var readData = $('<div>' + data.parse.text["*"] + '</div>');
                if (data=!null)$("#results").html(readData);

                else $("#results").html(0 );
                             //.append(toFinalForm(data));
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
        if (data==null) return 0;
        else return 1;

    }

    // Twitter functions

    // Facebook functions

});