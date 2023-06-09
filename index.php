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
        $_SESSION["fname"] = $_POST["fname"];
        $_SESSION["lname"] = $_POST["lname"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["state"] = $_POST["state"];
        $_SESSION["phone"] = $_POST["phone"]; //saves these in session array & session array keeps going (except the data)

        $f3->reroute('experience');
    }
    $view = new Template();
    echo $view->render('views/personalinfo.html'); //routing from index to html on any page
}
);


//Define an experience route
$f3->route('GET|POST /experience', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION["text"] = $_POST["text"];
        $_SESSION["link"] = $_POST["link"];
        $f3->reroute('openings');
    }
    $view = new Template();
    echo $view->render('views/experience.html'); //routing from index to html on any page
//    var_dump($_SESSION);
}
);


//Define an openings route (mailing list)
$f3->route('GET|POST /openings', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $jobSelected = $_POST['jobs'];
        if(isset($jobSelected)) {
            $_SESSION['jobs'] = implode(", ", $jobSelected);  //imploding
        }
//        $_SESSION['jobs'] = implode(", ", $_POST['jobs']);
        $f3->reroute('submission');
    }

    $view = new Template();
    echo $view->render('views/openings.html'); //routing from index to html on any page
    //var_dump($_SESSION);
}
);


//Define a summary/submission page
$f3->route('GET|POST /submission', function($f3) {
//    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//        $f3->reroute();
//    }
    $view = new Template();
    echo $view->render('views/summary.html'); //routing from index to html on any page
}
);



//Run fat free
$f3->run();