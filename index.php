<!DOCTYPE html>

<head>
    <title>TBA</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="scripts.js"></script>
</head>
<body>
    <h1>TBA</h1>
    <!-----------------------------------------PHP----------------------------------------------->
    <?php
        public $keyWord;

        public function toURL() {
            
        }

        class Wiki {
            public $url = "http://wikipedia.org/";
            public $name = "Wikipedia";

            public function getPararaph($keyWord) {
                $url = "http://en.wikipedia.org/w/api.php?format=json&action=query&titles=" + 
                    +$keyWord->toURL() + "&prop=revisions&rvprop=content";
            }
        }

        class Twitter {
            public $url = "http://twitter.com/"
            public $name = "Twitter";
            public function searchHashTag($keyWord) {
                $keyUrl = "https://twitter.com/search?q=" + $keyWord + "&src=hash";

            }
        }
    
    
        
    ?>
    <!-----------------------------------------PHP----------------------------------------------->
</body>
