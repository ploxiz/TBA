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
            }).done(function(data, textStatus) {
                var readData = $('<div>' + data.parse.text["*"] + '</div>');

                 var redirect = readData.find('li:contains("REDIRECT") a').text();
                    if(redirect != '') {
                    	callWikipediaAPI(redirect);
                        return;
                    }
                 var bar = readData.find("p:first");

                if (data=!null)$("#results").html(bar);


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