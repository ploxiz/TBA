<?php

$keyword = $_GET["q"];
$keyword = str_replace(" ", "%20", $keyword);

/*function callTwitterAPI($keyword) {
    // the token required for twitter oauth2
    $base64BearerTokenCredentials = "SGloTUxpelFxMTRNcVhOajJaWExoazJ1TDpxQVE3V2V6UDF1ZWtiamFBQXo1c2hUUFhUVHNUZnJvdnh" .
        "ZU2lyM0xtbzdwSDY1dkR4Nw==";

    $url = 'https://api.twitter.com/oauth2/token';

    $options = array(
        'http' => array(
            'header'  => array(
                "Content-type: application/x-www-form-urlencoded;charset=UTF-8",
                "Authorization: Basic " . $base64BearerTokenCredentials,
            ),
            'method'  => 'POST',
            'content' => "grant_type=client_credentials",
        ),
    );
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    return $response;
}

$response = callTwitterAPI($keyword);

// cuts only the access token
$response = substr($response, 17);
$pos = strpos($response, '"');
$accessToken = substr($response, 0, $pos);
echo $accessToken;*/

$token = "AAAAAAAAAAAAAAAAAAAAAAmNXgAAAAAAS%2BjQkM7hgaCEa1%2FVnT0KrYczrOc%3DMG2P7WOybROb39whVMHXqeDKE5VoydpVwSaY0" .
    "wlZD5lnRsohMa"; // created using the above function
$url = "https://api.twitter.com/1.1/search/tweets.json?lang=en&count=10&q=%23" . $keyword;

$request = array(
    'http' => array(
        'header' => array(
            "Authorization: Bearer " . $token,
            "Content-Type: application/x-www-form-urlencoded"
        ),
        'method' => 'GET'
    ),
);
$context  = stream_context_create($request);
$response = file_get_contents($url, false, $context);

$response = json_decode($response);

foreach ($response->statuses as $tweet) {
    $screenName = $tweet->user->screen_name;
    $message = $tweet->text;


    // Properly construct links in html for each tweet.
    // TODO: construct links for replies (@...)
    // TODO: construct links for hashtags (#...) directly to TBD.
    // TODO: BUG: https://www.dropbox.com/s/b3w6k6vdah8mktt/Screenshot%202014-06-19%2011.12.48.png // TOCHECK
    if (strpos($message, "http://t.co/")) {
        $posStart = strpos($message, "http://t.co/"); // the starting position of the link in $message
        $link = substr($message, $posStart);
        if (strpos($link, " ")) { // check whether there is anything after the link; if true then crop it
            $posEnd = strpos($link, " "); // the ending position of the link in $link
            $link = substr($link, 0, $posEnd);
            if (ctype_alpha($link[count($link) - 1]) || is_numeric($link[count($link) - 1])) {        
                $message = substr_replace($message, '</a>', $posStart + $posEnd, 0);
                $message = substr_replace($message, '<a target="_blank" href="' . $link . '">', $posStart, 0);
            }
            else { // TODO: CHECK IF WORKS!!!
                $link[count($link) - 1] = "";
                $posEnd = $posEnd - 1;
                $message = substr_replace($message, '</a>', $posStart + $posEnd, 0);
                $message = substr_replace($message, '<a target="_blank" href="' . $link . '">', $posStart, 0);    
            }
        }
        else { // if false, construct without croping as $link contains the actual link                       
            $message = $message . '</a>';
            $message = substr_replace($message, '<a target="_blank" href="' . $link . '">', $posStart, 0); 
        }
    }

    echo '<a target="_blank" href="https://twitter.com/' . $screenName . '"><b>' . $screenName . '</b></a>';
    echo '<br>';
    echo $message;
    echo '<br><br>';
    echo '<div class="content-separator"></div>';
    echo '<br>'; 
}