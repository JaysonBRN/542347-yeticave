<?php
require_once( 'app/init.php' );

$lot = [
    'id' => null,
    'lot-name' => null,
    'category' => null,
    'description' => null,
    'lot-rate' => null,
    'lot-step' => null,
    'lot-date' => null,
    'lot-img' => null,
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required = ['lot-name', 'category', 'description', 'lot-rate', 'lot-step', 'lot-date', 'lot-img'];

    $errors = [];
    foreach ($_POST as $field => $value) {
        if (in_array($field, $required)) {
            if ($value == '') {
                $errors[$field] = 'Это поле надо заполнить';
            }
        }
    }

    if (!getCategoryById($_POST['category'], $categories))
    {
        $errors['category'] = 'Неверная категория';
    }

    if ($_FILES['lot-img']['name'] != '') {
        $tmp_name = $_FILES['lot-img'] ['tmp_name'];
        $name = $_FILES['lot-img'] ['name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type !== "image/jpeg" and $file_type !== "image/png") {
            $errors['lot-img'] = 'Загрузите изображение лота';
        }
        else {
            $path = 'img/' . $name;
            $res = move_uploaded_file($tmp_name, $path);
            $lot['lot-img'] = $path;
        }
    }
    else {
        $errors['lot-img'] = 'Вы не загрузили изображение';
    }

    if ( ! is_numeric( $_POST['lot-rate'] ) )
    {
        $errors['lot-rate'] = 'Нужно ввести число';
    }

    if ( ! is_numeric( $_POST['lot-step'] ) )
    {
        $errors['lot-step'] = 'Нужно ввести число';
    }

    $lot['lot-name'] = $_POST['lot-name'];
    $lot['category'] = (int)$_POST['category'];
    $lot['description'] = $_POST['description'];
    $lot['lot-rate'] = (int)$_POST['lot-rate'];
    $lot['lot-step'] = (int)$_POST['lot-step'];
    $lot['lot-date'] = $_POST['lot-date'];

    if (count($errors)) {
        $pagecontent = include_template('templates/add.php', ['lot' => $lot, 'categories' => $categories, 'errors' => $errors]);
    }
    else {
        $pagecontent = include_template('templates/lot.php', ['lot' => $lot, 'categories' => $categories]);
    }
}
else {
    $pagecontent = include_template('templates/add.php', [ 'lot' => $lot, 'categories' => $categories, 'errors' => [] ]);
}
echo include_template('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Добавление лота', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar]);