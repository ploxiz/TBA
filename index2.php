<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>webfiz - Search the web. EFFICIENTLY</title>
		<link rel="stylesheet" type="text/css" href="css/index2.css">
		<!--[if IE]>
		<style type="text/css">
			.submit-button {
				bottom: 2px;
				height: 61px;
			}

			.submit-button:focus {
				bottom: 2px;
			}
		</style>
		<![endif]-->
		<script src="libs/jquery-1.11.1.min.js"></script>
	</head>
	
	<body>
		<div id="top-container">
			<img id="logo" width="242" height="76" src="pics/logo-horizontal.png">
			<div id="navbar">
				<ul>
					<li><a href="#">ABOUT</a></li>
					<li><a href="#">BLOG</a></li>
					<li><a href="#">SUPPORT US</a></li>
					<li><a id="facebook" href="https://facebook.com">FACEBOOK</a></li>
					<li><a id="twitter" href="https://twitter.com">TWITTER</a></li>
				</ul>
			</div>
			<div class="headline first">SEARCH THE WEB. <span>EFFICIENTLY</span></div>
			<div class="headline second">WE HELP YOU GET THE INFORMATION YOU WANT FROM THE MOST POPULAR SOURCES</div>
			<form action="search.php" method="get">
                <label>
                    <input class="search-input" type="text" name="q" autofocus="autofocus" autocomplete="off">
                </label>
                <input class="submit-button" type="submit" value="SEARCH">
			</form>
		</div>
	</body>

</html>