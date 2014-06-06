<?php
require "core.php";

$keyword = $_GET["keyword"];

// --------------------------WIKIPEDIA-----------------------------------

$wikipediaResponse = getWikipediaResults($keyword);

$pages = array(); // will store all titles of the found pages
while (strpos($wikipediaResponse, '"title":')) {
    $pos = strpos($wikipediaResponse, '"title":') + 9; // position of the current found page
    $wikipediaResponse = substr($wikipediaResponse, $pos); // cuts everything before the found page
    $pos = strpos($wikipediaResponse, '"'); // position of where the name of the found page ends
    array_push($pages, substr($wikipediaResponse, 0, $pos)); // stores the full name of the found page
}

for ($i = 0; $i < count($pages); $i++) {
    echo '<a href="https://en.wikipedia.org/wiki/' . $pages[$i] . '">' . $pages[$i] . '</a>' . "<br>";
    //TODO: replace "things" such as \u00e9 when you search for Wikipedia.
    //TODO: add short description for each result.
}

// --------------------------TWITTER-----------------------------------

$response = callTwitterAPI($keyword) . "<br>";

// cuts only the access token
$response = substr($response, 17);
$pos = strpos($response, '"');
$accessToken = substr($response, 0, $pos);
echo $accessToken;

$url = 'https://api.twitter.com/1.1/search/tweets.json';

$options = array(
    'http' => array(
        'header'  => "Authorization: Bearer " . $accessToken,
        'method'  => 'POST',
        'q' => "Einstein",
    ),
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

return $response;
