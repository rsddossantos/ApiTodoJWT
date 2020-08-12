<?php
global $routes;
$routes = array();

//params
$routes['/users/login'] = '/users/login'; //email;pass; {POST}
$routes['/users/new'] = '/users/new_record'; //name;email;pass; {POST}
$routes['/users/feed'] = '/users/feed'; // (opcionais) offset;per_page; {GET}
$routes['/users/{id}'] = '/users/view/:id'; // jwt; {GET;PUT;DELETE}
