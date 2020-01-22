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

// define a breakfast buffet route
$f3->route('GET /breakfast/buffet', function() {
    $view = new Template();
    echo $view->render('views/breakfast-buffet.html');
});

// define a route that accepts a food parameter
$f3->route('GET /@item', function($f3, $params) {
//    var_dump($params);
    $item = $params['item'];
    echo "<p>You ordered $item</p>";

    $foodsWeServe = array("tacos", "pizza", "lumpia", "bagels");
    if (!in_array($item, $foodsWeServe)) {
        echo "<p>Sorry... we don't serve $item</p>";
    }

    switch($item) {
        case 'tacos':
            echo "<p>We serve tacos on Tuesdays</p>";
            break;
        case 'pizza':
            echo "<p>Pepperoni or Veggie?";
            break;
        case 'bagels':
            $f3->reroute("/breakfast");
        default:
            $f3->error(404);
    }
});

// define a lunch route
$f3->route('GET /lunch', function() {
    $view = new Template();
    echo $view->render('views/lunch.html');
});

// define a route called order displays a view called form1.html
$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render('views/form1.html');
});

// run f3
$f3->run();