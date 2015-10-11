<?php

$keyword = $_GET["q"];

function callRedditAPI($keyword) {
	$url = "http://www.reddit.com/search.json?limit=10&sort=new&q=" . $keyword;
	$response = file_get_contents($url);
	return $response;
}

$response = json_decode(callRedditAPI($keyword));

foreach ($response->data->children as $post) {
	$title = $post->data->title;
	$author = $post->data->author;
	$subreddit = $post->data->subreddit;
	$url = $post->data->url;
	$permalink = $post->data->permalink;

	echo '<a class="reddit-links" href="' . $url . '" target="_blank">' . $title . '</a>';

	echo '<p style="font-size: 12px">by ';
	echo '<i><a href="http://www.reddit.com/user/' . $author . '" target="_blank">' . $author . '</a></i>';
	echo ' on ';
	echo '<i><a href="http://www.reddit.com/r/' . $subreddit . '" target="_blank">' . "/r/" . $subreddit . '</a></i>';
	echo " - ";
	echo '<a href="http://www.reddit.com' . $permalink . '" target="_blank"><b>permalink</b></a>';
	echo "</p>";
	
	echo '<div class="content-separator"></div>';
	echo "<br>";
}

/*$responseForTitles = $response;
$responseForUserNames = $response;
$responseForSubReddits = $response;
$responseForUrls = $response;
$responseForPermalinks = $response;

$titles = array();
$usernames = array();
$subreddits = array();
$urls = array();
$permalinks = array();

while (strpos($responseForTitles, '"title": "')) {
	// TODO: BUG: properly attribute the links to posts (sometimes you will find a permalink for example which leads to the permalink of the other post below); probably this happens when there is a post leading to a youtube video
	// title of the post
	$pos = strpos($responseForTitles, '"title": "') + 10;
	$responseForTitles = substr($responseForTitles, $pos);
	if (strpos($responseForTitles, '", "url"') && strpos($responseForTitles, '", "url"') < strpos($responseForTitles, '", "created_utc"')) {
		$pos = strpos($responseForTitles, '", "url"');
	}	
	else if (strpos($responseForTitles, '", "created_utc"')) {
		$pos = strpos($responseForTitles, '", "created_utc"');	
	}
	$title = substr($responseForTitles, 0, $pos);
	array_push($titles, $title);

	// user of the post
	$pos = strpos($responseForUserNames, '"author": "') + 11;
	$responseForUserNames = substr($responseForUserNames, $pos);
	$pos = strpos($responseForUserNames, '", "media"');
	$username = substr($responseForUserNames, 0, $pos);
	array_push($usernames, $username);

	// subreddit of the post
	$pos = strpos($responseForSubReddits, '"subreddit": "') + 14;
	$responseForSubReddits = substr($responseForSubReddits, $pos);
	$pos = strpos($responseForSubReddits, '", "selftext_html"');
	$subreddit = substr($responseForSubReddits, 0, $pos);
	array_push($subreddits, "/r/" . $subreddit);

	// url of the post
	$pos = strpos($responseForUrls, '"url": "') + 8;
	$responseForUrls = substr($responseForUrls, $pos);
	$pos = strpos($responseForUrls, '", "author_flair_text"');
	$url = substr($responseForUrls, 0, $pos);
	array_push($urls, $url);

	// permalink of the post
	$pos = strpos($responseForPermalinks, '"permalink": "') + 14;
	$responseForPermalinks = substr($responseForPermalinks, $pos);
	$pos = strpos($responseForPermalinks, '", "name"');
	$permalink = substr($responseForPermalinks, 0, $pos);
	array_push($permalinks, $permalink);
}

for ($i = 0; $i < count($titles); $i++) {
	echo json_decode('"' . $titles[$i] . '"');
	echo "<br>";
	echo '<p style="font-size: 12px">by '; 
	echo '<i><a href="http://www.reddit.com/user/' . $usernames[$i] . '" target="_blank">' . $usernames[$i] . '</a></i>';
	echo ' on ';
	echo '<i><a href="http://www.reddit.com/' . $subreddits[$i] . '" target="_blank">' . $subreddits[$i] . '</a></i>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<a class="reddit-links" href="' . $urls[$i] . '" target="_blank">go to</a>&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<a class="reddit-links" href="http://www.reddit.com' . $permalinks[$i] . '" target="_blank">permalink</a>'; 
	echo '</p>';
	echo '<div id="content-separator"></div>';
	echo "<br>";
}
*/