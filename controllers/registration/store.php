<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'You must provide a valid email.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Your password must be at least 7 characters long.';
}


if (!empty($errors)) {
    /** @noinspection PhpVoidFunctionResultUsedInspection */
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


$db = App::resolve(Database::class);


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    // user exists
    header('location: /about');
    exit();
} else {
    // create a new user
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('Location: /');
    exit();
}
