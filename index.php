<!DOCTYPE html>

<html lang="en">
<!-- (c) 2014 https://github.com/ploxiz/TBD -->
    <head>
        <meta charset="utf-8"/>
        <title>TBD</title>
        <script type="text/javascript" src="scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--[if IE]>
        <style>
            #about-button {
                padding-bottom: 32px;
            }

            #support-button {
                padding-bottom: 32px;
            }

            #keyword-input {
                top: 67px;
            }

            #submit-button {
                top: 60px;
            }
        </style>
        <![endif]-->
        <script src="libs/jquery-1.11.1.min.js"></script>
        <!--<script type="text/javascript" src="core.js"></script>-->
    </head>

    <body>
        <div id="top">
            <div id="logo" onclick="location.href='#';"></div>
            <div id="loader"></div>
            <div id="separator1"></div>
            <div id="about-button" onclick="location.href='#';">ABOUT</div>
            <div id="separator2"></div>
            <div id="support-button" onclick="location.href='#';">SUPPORT</div>
            <div id="separator3"></div>
            <div id="twitter-button" onclick="window.open('http://twitter.com');">
                <img id="twitter-icon" src="pics/twitter-icon.png">
            </div>
            <div id="separator4"></div>
            <div id="facebook-button" onclick="window.open('http://facebook.com');">
                <img id="facebook-icon" src="pics/facebook-icon.png">
            </div>
        </div>

        <div id="search-box-background">
            <div id="text1">
                START SURFING THE WEB. <span style="font-size: 75px;">EFFICIENTLY</span>
            </div>
            <div id="text2">
                WE HELP YOU GET THE INFORMATION YOU WANT FROM THE MOST POPULAR SOURCES ON THE INTERNET
            </div>
            <div id="search-box">
                <form name="input" action="search" method="get">
                    <input type="text" name="keyword" id="keyword-input" autofocus="autofocus">
                    <input type="submit" id="submit-button" value="">
                </form>
            </div>
        </div>

        <div id="wikipedia">
            <div id="wikipedia-logo"></div>
            <p id="wikipedia-result"></p>
        </div>

        <div id="twitter">
            <div id="twitter-logo"></div>
            <p id="twitter-result"></p>
        </div>

        <div id="footer">
            <span id="copyright">All rights reserved. (c) TBD 2014</span>
        </div>
    </body>
</html>
