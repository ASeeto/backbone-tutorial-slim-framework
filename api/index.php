<?php

/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
// $app->get('/', function () use ($app) {

//     /** Return response data HTML to page */
//     $app->response->header->set('Content-Type', 'text/html');
//     echo 'index.html';

// });

// GET route
$app->get('/api/item', function () use ($app) {
    // echo "Items test!";
    /** Execute SQL and store result */
    require_once 'item.php';
    $model = new Item();
    $items = $model->getItems();

    /** Return response data (JSON) to page */
    $app->response()->headers->set('Content-Type', 'application/json');
    echo json_encode($items);

});

$app->get('/api/item/:id', function ($id) use ($app) {
    
    /** Execute SQL and store result */
    require_once 'item.php';
    $model = new Item();
    $item = $model->getItem((int) $id);

    /** Return response data (JSON) to page */
    $app->response->headers->set('Content-Type', 'application/json');
    echo json_encode($item);

});

// DELETE route
$app->delete('/api/item/:id', function ($id) use ($app) {
    
    /** Execute SQL and store result */
    require_once 'item.php';
    $model = new Item();
    $model->removeItem((int) $id);

    /** Redirect to Home (List All Items) */
    $app->redirect('/api/item');

});

// POST route
$app->post('/api/item/:name/:price', function ($name, $price) use ($app) {
    
    /** Execute SQL and store result */
    require_once 'item.php';
    $model = new Item();
    $model->addItem($name, $price);

    /** Redirect to Home (List All Items) */
    $app->redirect('/api/item');

});

// PUT route
$app->put('/api/item/:id/:name/:price', function ($id, $name, $price) use ($app) {
    
    /** Execute SQL and store result */
    require_once 'item.php';
    $model = new Item();
    $model->updateItem($id, $name, $price);

    /** Redirect to Home (List All Items) */
    $app->redirect('/api/item');

});

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();

?>