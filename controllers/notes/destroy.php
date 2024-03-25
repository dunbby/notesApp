<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = 1;


$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $current_user_id);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('Location: /notes');
exit();
