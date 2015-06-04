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

    /** Connect to Database */
    require_once 'dbconfig.php';
    $db = connect_db();

    /** Execute SQL and return result */
    $sql = "SELECT * FROM items";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $results[] = array(
            'id'    => $row['id'],
            'name'  => $row['name'],
            'price' => $row['price']
        );
    }

    /** Return response data (JSON) to page */
    $app->response()->headers->set('Content-Type', 'application/json');
    echo json_encode($results);

});

$app->get('/api/item/:id', function ($id) use ($app) {
    
    /** Connect to Database */
    require_once 'dbconfig.php';
    $db = connect_db();

    /** Execute SQL and return result */
    $sql = "SELECT * FROM items WHERE id = \"$id\"";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $results[] = array(
            'id'    => $row['id'],
            'name'  => $row['name'],
            'price' => $row['price']
        );
    }

    /** Return response data (JSON) to page */
    $app->response->headers->set('Content-Type', 'application/json');
    echo json_encode($results);

});

// POST route
$app->post('/api/item', function () use ($app) {

    /** Parse request for passed in data */
    $request = $app->request();
    $body = json_decode($request->getBody());

    /** Initialize variables for values taken from request body */
    $name = $body->name;
    $price = $body->price;

    /** Connect to Database */
    require_once 'dbconfig.php';
    $db = connect_db();

    /** Execute SQL and return result */
    $sql = "INSERT INTO items(name, price) VALUES(\"$name\", \"$price\")";
    mysqli_query($db, $sql);

});

// PUT route
$app->put('/api/item/:id', function ($id) use ($app) {
    
    /** Parse request for passed in data */
    $request = $app->request();
    $body = json_decode($request->getBody());

    /** Initialize variables for values taken from request body */
    $name = $body->name;
    $price = $body->price;

    /** Connect to Database */
    require_once 'dbconfig.php';
    $db = connect_db();

    /** Execute SQL and return result */
    $sql = "UPDATE items SET name = \"$name\", price = \"$price\" WHERE id = \"$id\"";
    mysqli_query($db, $sql);

});

// DELETE route
$app->delete('/api/item/:id', function ($id) use ($app) {
    
    /** Connect to Database */
    require_once 'dbconfig.php';
    $db = connect_db();

    /** Execute SQL and return result */
    $sql = "DELETE FROM items WHERE id = \"$id\"";
    mysqli_query($db, $sql);

});

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();

?>