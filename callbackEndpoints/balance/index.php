<?php
$data = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]; 

$balanceLogFile = '../../callbackLogs/balanceLog.txt';
$writeToLog = file_put_contents($balanceLogFile, $data."\n", FILE_APPEND);


$getBalance = file_get_contents('../../balance.txt');


$responsePayload = array('status' => 'ok', 'result' => array('balance' => $getBalance, 'freegames' => 0));

echo json_encode($responsePayload);
?>