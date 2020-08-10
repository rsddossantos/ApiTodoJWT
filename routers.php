<?php
global $routes;
$routes = array();

//params
$routes['/users/login'] = '/users/login'; //email;pass; {POST}
$routes['/users/new'] = '/users/new_record'; //name;email;pass; {POST}
$routes['/users/feed'] = '/users/feed'; // (opcionais) offset;per_page; {GET}
$routes['/users/{id}'] = '/users/view/:id'; // jwt; {GET;PUT;DELETE}
$routes['/users/{id}/photos'] = '/users/photos/:id';
$routes['/users/{id}/follow'] = '/users/follow/:id';

$routes['/photos/random'] = '/photos/random';
$routes['/photos/new'] = '/photos/new_record';
$routes['/photos/{id}'] = '/photos/view/:id';
$routes['/photos/{id}/comment'] = '/photos/comment/:id';
$routes['/photos/{id}/like'] = '/photos/like/:id';