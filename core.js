var keyWord = null;

function getKey() {
    keyWord = document.getElementById("key").value;
    document.getElementById("testLabel").innerHTML = keyWord; // testing purpose
}

var wikipedia = {
    name : "Wikipedia",
    address : "http://wikipedia.org/",

    getParagraph : function() {

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