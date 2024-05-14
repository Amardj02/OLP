<?php

require "../vendor/autoload.php";
require "./services/OLPservice.php";

Flight::register('olpService', 'OLPservice');

require './routes/OLProutes.php';


Flight::map('header', function($name){
    $headers = getallheaders();
    return @$headers[$name];
});

Flight::start();

