<?php

$requestUri = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'Start.html',
    '/create' => 'Create.html',
    '/read' => 'Read.html',
    '/update' => 'Update.html',
    '/delete' => 'Delete.html',
    '/changeName' => 'ChangeName.html',
    '/changeRole' => 'ChangeRole.html',
    '/addRole' => 'AddRole.html',
    '/deleteRole' => 'DeleteRole.html',
];

$routesFound = false;

foreach ($routes as $key => $value) {
    if ($requestUri === $key) {
        $routesFound = true;
        include_once 'src/Front/html/' . $value;
    }
}

if (!$routesFound) {
    include_once 'src/Front/html/404.html';
}