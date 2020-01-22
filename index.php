<?php
/**
 * Kerrie Low
 * 1.22.20
 * Full Stack Software Development
 * http://www.klow.greenriverdev.com/328/food/
 */

// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');

// instantiate F3
// :: means static method
$f3 = Base::instance();

// define a default route
// -> calls an instance method
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

// define a breakfast route
$f3->route('GET /breakfast', function() {
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

// run f3
$f3->run();