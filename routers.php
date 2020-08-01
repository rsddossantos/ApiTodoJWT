<?php
global $routes;
$routes = array();

//params
$routes['/users/login'] = '/users/login'; //email;pass;
$routes['/users/new'] = '/users/new_record'; //name;email;pass;
$routes['/users/{id}'] = '/users/view/:id'; // jwt;
$routes['/users/{id}/feed'] = '/users/feed/:id';
$routes['/users/{id}/photos'] = '/users/photos/:id';
$routes['/users/{id}/follow'] = '/users/follow/:id';

$routes['/photos/random'] = '/photos/random';
$routes['/photos/new'] = '/photos/new_record';
$routes['/photos/{id}'] = '/photos/view/:id';
$routes['/photos/{id}/comment'] = '/photos/comment/:id';
$routes['/photos/{id}/like'] = '/photos/like/:id';