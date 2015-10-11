<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>TBD7</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script src="libs/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div id="top-container">
            <div id="logo"></div>
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
                    <input id="keyword-input" type="text" name="q" autofocus="autofocus" autocomplete="off">
                </label>
                <input id="keyword-submit" type="submit" value="SEARCH">
            </form>
        </div>
        <div id="tips">
            <div class="section one">
                <div class="tip-pic one"></div>
                <span class="tip">Simply type a keyword in the upper search box, click the SEARCH button and wait a while everything is being processed.</span>
            </div>
            <div class="section two">
                <div class="tip-pic two"></div>
                <span class="tip">Using our own algorithms and based on your keyword, the website is going to try and find the data which you should be interested in and is currently popular on the internet.</span>
            </div>
            <div class="section three">
                <div class="tip-pic three"></div>
                 <span class="tip">You get results from multiple popular websites, either strictly informational like Wikipedia, media like YouTube or social networks including Facebook, Twitter and many others.</span>
            </div>
        </div>
    </body>
</html>