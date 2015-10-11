// change logo color(pic) or text color on hover (backwards also)
$(document).ready(function() {
    $(".source.allresults").hover(function() {
        $(".source-name.allresults").css("color", "#e44655");
    }, function() {
        $(".source-name.allresults").css("color", "#ececec");
    });

    $(".source.wikipedia").hover(function() {
        $("#wikipedia-logo").css("background-image", "url(pics/wikipedia-logo-focused.png)");
    }, function() {
        $("#wikipedia-logo").css("background-image", "url(pics/wikipedia-logo-unfocused.png)");
    });

    $(".source.twitter").hover(function() {
        $("#twitter-logo").css("background-image", "url(pics/twitter-logo-focused.png)");
    }, function() {
        $("#twitter-logo").css("background-image", "url(pics/twitter-logo-unfocused.png)");
    });

    $(".source.reddit").hover(function() {
        $("#reddit-logo").css("background-image", "url(pics/reddit-logo-focused.png)");
    }, function() {
        $("#reddit-logo").css("background-image", "url(pics/reddit-logo-unfocused.png)");
    });
});

// basically every event for each button on the sidebar, except changing the logo color(pic) or text color on hover
$(window).load(function() {
    $(".source.allresults").mousedown(function() {
        $(".content").hide();
        $(".source").css("border-left", "none");
        $(".selector").css("display", "none");
        $(".source.allresults").css("border-left", "10px solid #e44655");
        $(".content.allresults").show();
        $(".selector.allresults").css("display", "block");
    });

    $(".source.wikipedia").mousedown(function() {
        $(".content").hide();
        $(".source").css("border-left", "none");
        $(".selector").css("display", "none");
        $(".source.wikipedia").css("border-left", "10px solid #e44655");
        $(".content.wikipedia").show();
        $(".selector.wikipedia").css("display", "block");
    });

    $(".source.twitter").mousedown(function() {
        $(".content").hide();
        $(".source").css("border-left", "none");
        $(".selector").css("display", "none");
        $(".source.twitter").css("border-left", "10px solid #e44655");
        $(".content.twitter").show();
        $(".selector.twitter").css("display", "block");
    });

    $(".source.reddit").mousedown(function() {
        $(".content").hide();
        $(".source").css("border-left", "none");
        $(".selector").css("display", "none");
        $(".source.reddit").css("border-left", "10px solid #e44655");
        $(".content.reddit").show();
        $(".selector.reddit").css("display", "block");
    });
});