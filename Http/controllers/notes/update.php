<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$current_user_id = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

$auth = authorize($note['user_id'] === $current_user_id);


$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'The description of no more than 1,000 characters is required.';
}

if (count($errors)) {
    return view('/notes/edit.view.php', [
        'heading' => 'Edit a Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes set body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

header('Location: /notes');
die();