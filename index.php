<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>TuxSeeto - RESTful API</title>
    <meta name="description" content="A web application for practice.">
</head>
<body>
	Test
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
require 'Model_Item.php';

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
$app->get('/api/item/:id', function () use ($app) {
    $request = (array) json_decode($app->request()->getBody());

    $id = $request['id'];

    // $friend is an instance of Model_Friend
    $item = Model_ItemFinder::getById($id);

    $app->response()->header('Content-Type', 'application/json');
    echo json_encode($item);
});

// POST route
$app->post('/api/item', function () {
    echo 'This is a POST route';
});

// PUT route
$app->put('/api/item', function () {
    echo 'This is a PUT route';
});

// DELETE route
$app->delete('/api/delete', function () {
    echo 'This is a DELETE route';
});

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
?>
</body>
</html>