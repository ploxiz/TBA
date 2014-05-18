$(document).ready(function() {

    var keyWord = null;
    var wikipediaAPI = null;
    var twitterAPI = null;
    var facebookAPI = null;

    function getData() { // basically the 'main' function.
        keyWord = document.getElementById("key").value;
        wikipediaAPI = "http://en.wikipedia.org/w/api.php?" + "format=json&action=query&list=search&srsearch=" +
            keyWord.replace(" ", "+") + "&srprop";
        // TODO: twitterAPI.
        // TODO: facebookAPI.

        // TODO: EVERYTHING!
    }

    function httpGet(URL) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", URL, true);
        xmlHttp.send();
        return xmlHttp.responseText;
    }

    var wikipedia = {
        name: "Wikipedia",
        address: "http://en.wikipedia.org/",

        getResults: function () {
            var allResults = httpGet(wikipediaAPI);

            var results = null; // array with the results we actually care about.

            while (allResults.search('title":"') != null) {
                var pos = allResults.search('title":"') + 9; // index of the first character in the first result.
                allResults = allResults.slice(pos, allResults.length + 1);
                pos = allResults.search('"},') - 1; // index of where one of the results ends.
                results.push(allResults.slice(0, pos + 1));
            }

            return results;
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