<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>TBD7</title>
        <link rel="stylesheet" type="text/css" href="css/search.css">
        <script src="libs/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="sidebar">
                <div id="logo"></div>
                <div class="sidebar-style"></div>
                <div class="source allresults">
                    <span class="source-name allresults">All Results</span>
                </div>
                <div class="sidebar-style"></div>
                <div class="source wikipedia">
                    <div id="wikipedia-logo"></div>
                    <br>
                    <span class="source-name">Wikipedia</span>
                </div>
                <div class="sidebar-style"></div>
                <div class="source twitter">
                    <div id="twitter-logo"></div>
                    <br>
                    <span class="source-name">Twitter</span>
                </div>
                <div class="sidebar-style"></div>
                <div class="source reddit">
                    <div id="reddit-logo"></div>
                    <br>
                    <span class="source-name">Reddit</span>
                </div>
                <div class="sidebar-style"></div>
            </div>
            <!-- the pic which shows next to an active source -->
            <div id="selectors-container">
                <div class="selector allresults"></div>
                <div class="selector wikipedia"></div>
                <div class="selector twitter"></div>
                <div class="selector reddit"></div>
            </div>
            <div id="content-container">
                <div class="content allresults">
                    <?php
                    include "sources/all.php";
                    ?>
                </div>
                <div class="content wikipedia">
                    <?php
                    include "sources/wikipedia.php";
                    ?>
                </div>
                <div class="content twitter">
                    <?php
                    include "sources/twitter.php";
                    ?></div>
                <div class="content reddit">
                    <?php
                    include "sources/reddit.php";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>