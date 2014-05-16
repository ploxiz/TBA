var keyWord = null;

function getKey() {
    keyWord = document.getElementById("key").value;

    document.getElementById("results").innerHTML = httpGet("http://en.wikipedia.org/w/api.php?" +
        "format=json&action=query&list=search&srsearch=" +
        keyWord.replace(" ", "+") +
        "&srprop"); // testing purposes

    // document.getElementById("results").innerHTML = wikipedia.getResults();
}

function httpGet(Url) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", Url, true);
    xmlHttp.send();
    return xmlHttp.responseText;
}

var wikipedia = {
    name : "Wikipedia",
    address : "http://wikipedia.org/",

    getResults : function() {
        var allResults = httpGet("http://en.wikipedia.org/w/api.php?format=json&action=query&list=search&srsearch=" +
            keyWord.replace(" ", "+") +
            "&srprop");

        var allResultsForSlice = allResults; // in order to keep a "clean" variable with the query results.

        var results = null;

        while (allResultsForSlice.search('title":"') != null) {

            var pos = allResultsForSlice.search('title":"') + 9; // index of the first character in the first result.

            allResultsForSlice = allResultsForSlice.slice(pos, allResultsForSlice.length + 1);

            pos = allResultsForSlice.search('"},') - 1; // index of where one of the results ends.

            results.push(allResultsForSlice.slice(0, pos + 1));
        }

        return results;
    }
};

var twitter = {
    name : "Twitter",
    address : "http://twitter.com/"
};

var facebook = {
    name : "Facebook",
    address : "http://facebook.com/"
};