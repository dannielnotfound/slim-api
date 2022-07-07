<?php
require_once "../vendor/autoload.php";

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();


$app->get('/', function(Request $request, Response $response, $args){
    $response->getBody()->write("Hello World");
    return $response;
});

$app->get('/books', function(Request $request, Response $response, $args){
   $books = [
    '1' => 'Book 1',
    '2' => 'Book 2',
    '3' => 'Book 3',
   ];
   $response->getBody()->write(json_encode($books));
   return $response->withHeader('Content-type', 'application/json');
});

$app->get('/books/{id}', function(Request $request, Response $response, $args){
    $books = [
        '1' => 'Book 1',
        '2' => 'Book 2',
        '3' => 'Book 3',
    ];
    $book[$args['id']] =  $books[$args['id']];
    $response->getBody()->write(json_encode($book));
    return $response->withHeader('Content-type', 'application/json');
});

$app->run();

?>