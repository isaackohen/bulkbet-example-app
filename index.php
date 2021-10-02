<?php

$f3=require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<8.0)
	trigger_error('PCRE version is out of date');

$f3->config('config.ini');

$f3->route('GET /',
    function($f3) {

        //Make sure to replace the APIKEY here
        $f3->set('apikey','insertBULKBETapikey');


        $view=new View;
        echo $view->render('index.htm');
    }
);



$f3->run();
