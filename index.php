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

//Define a default route (home)
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
}
);


//Define a personal information route
$f3->route('GET|POST /personalinformation', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $f3->reroute('experience');
    }
    $view = new Template();
    echo $view->render('views/personalinfo.html'); //routing from index to html on any page
}
);



//Define an experience route
$f3->route('GET|POST /personexperience', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $f3->reroute('openings');
    }
    $view = new Template();
    echo $view->render('views/experience.html'); //routing from index to html on any page
}
);


//Define an openings route (mailing list)
$f3->route('GET|POST /newopenings', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $f3->reroute('submission'); //change
    }
    $view = new Template();
    echo $view->render('views/openings.html'); //routing from index to html on any page
}
);


//Define a summary/submission page
//$f3->route('GET|POST /newappsub', function($f3) {
//    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//        $f3->reroute(''); //change
//    }
//    $view = new Template();
//    echo $view->render('views/newapplicant.html'); //routing from index to html on any page
//}
//);


//Run fat free
$f3->run();