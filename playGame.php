<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">

<style>
 .gameWrapper {
     position: relative;
     padding-bottom: 56.25%;
    /* 16:9 */
     height: 0;
          max-height: 700px;

     border-top-left-radius: 16px;
     border-top-right-radius: 16px;
    /* border: 2px solid #263337;

     */
}
 .gameWrapper iframe {
     position: absolute;
     top: 0;
     border-top-left-radius: 16px;
     border-top-right-radius: 16px;
     left: 0;
     width: 100%;
     height: 700px;
}
</style>

</head>
<body>
<header class="sticky">
  <a href="/" role="button">Home</a>
  <a href="https://cp.bulk.bet/panel/" target="_blank" role="button">Bulk Control Panel</a>
</header>
<div class="container">
<?php
    /*
        This is a working example snippet on how to start-up a session. Retrieving balance from balance.txt.

        Make sure everything is chmodded and accessible to read/write. Will write result to playGameLog.txt so you can check there for any errors.
    */
    $apikey = $_GET["apikey"];
    $gameId = $_GET["game"];
    $userId = $_GET["userid"];
    $mode = $_GET["mode"];

    $url = "https://api.bulk.bet/v2/createSession?apikey=$apikey&userid=$userId&game=$gameId&mode=$mode";
    $result = file_get_contents($url);


    echo "<p>Request URL: $url</p>";

    echo "<p>Create Session Result: $result</p>";

    $decodeArray = json_decode($result, true);
    $retrieveIframeURL = $decodeArray['url'];
    echo "<div class='gameWrapper'><iframe src=$retrieveIframeURL></div>";
?>


  </div>
<footer>
    <p>Copyright &copy; Your Website 2017 | Built using <a href="https://chalarangelo.github.io/mini.css/">mini.css</a>
    </p>
</footer>


</body>
</html>