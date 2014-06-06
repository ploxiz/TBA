<?php

function getWikipediaResults($keyword) {
    $url = "http://en.wikipedia.org/w/api.php?action=query&list=search&format=json&srprop&srsearch=" . $keyword;
    $response = file_get_contents($url);
    return $response;
}

function callTwitterAPI($keyword) {
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