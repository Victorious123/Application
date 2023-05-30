<?php

require "vendor/autoload.php";
/*
Author: Viktoriya Kovachyk
Date: 4/26/2023
Description: This file turns on error reporting, Fat-Free, and creates a view */

//Create an instance of the Base class
$f3 = Base::instance();

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

//Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
}
);


//Define an application route
$f3->route('GET|POST /personalinformation', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $f3->reroute('experience');
    }
    $view = new Template();
    echo $view->render('views/personalinfo.html'); //routing from index to html on any page
}
);



//Define an application route
$f3->route('GET /experience', function() {
//    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//        $f3->reroute('experience');
//    }
    $view = new Template();
    echo $view->render('views/experience.html'); //routing from index to html on any page
}
);


//Define an experience route
//$f3->route('GET | POST / experience', function() {
//    $view = new Template();
//    echo $view->render('views/experience.html'); //routing from index to html on any page
//}
//);


//Run fat free
$f3->run();