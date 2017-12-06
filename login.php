<?php
require_once('app/init.php');
require_once('userdata.php');

$form = [
    'email' => null,
    'password' => null,
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required = ['email', 'password'];

    $errors = [];
    foreach ($_POST as $field => $value) {
        if (in_array($field, $required)) {
            if ($value == '') {
                $errors[$field] = 'Это поле надо заполнить';
            }
        }
    }

    if ($user = searchUserByEmail($_POST['email'], $users)) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
        }
        else {
            $errors['password'] = 'Вы ввели неверный пароль';
        }
    }
    else {
        $errors['email'] = 'Пользователь не найден';
    }

    $form['email'] = $_POST['email'];
    $form['password'] = $_POST['password'];

    if (count($errors)) {
        $pagecontent = include_template('templates/login.php', ['form' => $form, 'errors' => $errors, 'categories' => $categories]);
    }
    else {
        header('location: /index.php');
        exit();
    }
}
else {
    $pagecontent = include_template('templates/login.php', ['form' => $form, 'categories' => $categories, 'errors' => [] ]);
}
$layoutcontent = include_template ('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Вход на сайт']);

print ($layoutcontent);