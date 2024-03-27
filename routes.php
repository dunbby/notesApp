<?php

// main pages
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// note views
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->get('/note/create', 'notes/create.php')->only('auth');

// note actions
$router->post('/note', 'notes/store.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');

// register
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

// login & logout
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
