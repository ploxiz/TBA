<?php

$keyword = $_GET["q"];

function getWikipediaTitles($keyword) {
    $url = "http://en.wikipedia.org/w/api.php?action=query&list=search&format=json&srprop&srsearch=" . $keyword;
    $response = file_get_contents($url);
    return $response;
}

function getWikipediaContent($title) {
	$title = urlencode($title);
    $url = "http://en.wikipedia.org/w/api.php?action=parse&format=json&redirects=false&prop=text&page=" . $title;
    $response = file_get_contents($url); // In order to fix "Fatal error: Maximum execution time of 30 seconds exceeded", I have changed 
                                         // the max_execution_time parameter in php.ini to 100 seconds.
    return $response;
}

$responseTitle = json_decode(getWikipediaTitles($keyword));

foreach ($responseTitle->query->search as $titleObject) {
	// GET title for each relevant page.
	$title = $titleObject->title;
	$url = 'https://en.wikipedia.org/wiki/' . $title;	

	echo '<a target="_blank" href="' . $url . '">';
	echo '<b>' . $title . '</b>';
	echo '</a>';

	echo "<br>";

	// GET content and exctract the first paragraph for each page received using its title.
	$responseContent = getWikipediaContent($title);

	while (!(strpos($responseContent, "<p>") && (($responseContent[strpos($responseContent, "<p>") + 3] == "<" && (($responseContent[strpos($responseContent, "<p>") + 4] == "b" || $responseContent[strpos($responseContent, "<p>") + 4] == "i") && (ctype_alpha($responseContent[strpos($responseContent, "<p>") + 6]) || ctype_alpha($responseContent[strpos($responseContent, "<p>") + 9]) )) || $responseContent[strpos($responseContent, "<p>") + 4] == "a") || ctype_alpha($responseContent[strpos($responseContent, "<p>") + 3])))) {
        $responseContent = substr($responseContent, strpos($responseContent, "<p>") + 3);    
    }

	$paragraphStart = strpos($responseContent, "<p>") + 3;
    $responseContent = substr($responseContent, $paragraphStart);
    $paragraphEnd = strpos($responseContent, "</p>");
    $paragraph = substr($responseContent, 0, $paragraphEnd);
    for ($i = 1; $i <= 10; $i++) {
        $paragraph = str_replace("<span>[</span>" . $i . "<span>]</span>", "", $paragraph); // TODO: search for "Buddha" - [note x]
    }

    // Construct each link properly
    while (strpos($paragraph, '"/wiki/')) {
        $start = strpos($paragraph, '"/wiki/') + 1;
        $paragraph = substr_replace($paragraph, 'target=\"_blank\"', $start - 7, 0);
        $start = strpos($paragraph, '"/wiki/') + 1;
        $paragraph = substr_replace($paragraph, "https://en.wikipedia.org", $start, 0);      
    }

    // Encoding
    $paragraph = json_decode('"' . $paragraph . '"');

    echo $paragraph;

    // TODO: ":" exception    
        // TODO: "may refer to:" handler
    // TODO: "is a x-letter abbreviation which may represent" handler

	echo '<br><br>';
}