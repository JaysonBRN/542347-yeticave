<?php
require_once ('function.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $required = ['lot-name', 'category', 'description', 'lot-rate', 'lot-step', 'lot-date'];
    $dict = ['lot-name' => 'Наименование', 'category' => 'Категория', 'description' => 'Описание', 'lot-rate' => 'Начальная цена', 'lot-step' => 'Шаг ставки', 'lot-date' => 'Дата завершения торгов' ];
    $errors = [];
    foreach ($_POST as $field => $value) {
        if (in_array($field, $required)) {
            if (!$value) {
                $errors[$dict[$field]] = 'Это поле надо заполнить';
            }
        }
    }
    if (isset($_FILES['lot-img']['name'])) {
        $tmp_name = $_FILES['lot-img'] ['tmp_name'];
        $path = $_FILES['lot-img'] ['name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type !== "image/jpeg" and $file_type !== "image/png") {
            $errors['файл'] = 'Загрузите изображение лота';
        }
        else {
            $res = move_uploaded_file($tmp_name, 'img/' . $path);
            $lot['path'] = $path;
        }
    }
    else {
        $errors['файл'] = 'Вы не загрузили изображение';
    }
    if (count($errors)) {
        $pagecontent = include_template('templates/add.php', ['lot' => $lot, 'errors' => $errors]);
    }
    else {
        $pagecontent = include_template('templates/lot.php', ['lot' => $lot]);
    }
}
else {
    $pagecontent = include_template('templates/add.php', []);
}
$layoutcontent = include_template('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Добавление лота', 'is_auth' => [], 'user_name' => [], 'user_avatar' => []]);
print ($layoutcontent);