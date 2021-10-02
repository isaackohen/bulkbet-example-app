<?php
    /*
        This is a working example snippet on basic bet & result processing. Retrieving balance from balance.txt.

        Please note that the balance is always integer in USD$ cents.

        Make sure everything is chmodded and accessible to read/write. Will write callback Log to playGameLog.txt so you can check there for any errors.
    */
    
    $win = $_GET["win"];
    $bet = $_GET["bet"];
    $userId = $_GET["userid"];


    $data = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]; 

    $betLogFile = '../../callbackLogs/betLog.txt';
    $writeToLog = file_put_contents($betLogFile, $data."\n", FILE_APPEND);
    
    $balanceFile = '../../balance.txt';
    $getBalance = file_get_contents($balanceFile);

    $newBalanceAfterGame = ($getBalance - $bet) + $win;

    $writeNewBalance = file_put_contents($balanceFile, $newBalanceAfterGame); 

    $responsePayload = array('status' => 'ok', 'result' => array('balance' => $newBalanceAfterGame, 'freegames' => 0));
    
    echo json_encode($responsePayload);

?>