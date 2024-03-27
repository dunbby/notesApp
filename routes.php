<?php

// main pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// note views
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
$router->get('/note/create', 'controllers/notes/create.php')->only('auth');

// note actions
$router->post('/note', 'controllers/notes/store.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->delete('/note', 'controllers/notes/destroy.php');

// register
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');
