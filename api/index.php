<?php

require("vendor/autoload.php");
require_once("class/urlOperation.php");


#-.=================================
#-.slim settings.
#-.=================================
$app = new Slim\App([
    'settings'=>[
        'displayErrorDetails'=>true
    ]
]);

#-.=================================
#-.default test page.
#-.=================================
$app->get("/",function(){
	print("welcome to URL shortener application.");
});
#-.=================================
#-.route to url encoder.
#-.=================================
$app->get('/encode', function ($request, $response, $args) {
	$paramValue = $_REQUEST['myurl'];
	$convertedUrl = new BaseURLEncoder();
	echo($convertedUrl->urlHandleEncode($paramValue));
});
#-.=================================
#-.route to url decoder.
#-.=================================
$app ->get("/decode",function(){
	$paramValue = $_REQUEST['myurl'];
	$convertedUrl = new BaseURLEncoder();
	echo($convertedUrl->urlHandleDecode($paramValue));
});

$app->run();
?>