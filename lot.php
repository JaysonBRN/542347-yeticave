<?php
require_once('app/init.php');

if (!$link) {
    $error = mysqli_connect_error();
    $content = include_template('templates/error.php', ['error' => $error]);
}
else {
    $sql = 'SELECT id, cat_name, css_class FROM categories';
    $result = mysqli_query($link, $sql);
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('templates/error.php', ['error' => $error]);
    }

    $id = intval($_GET['id']);
    $sql = 'SELECT lots.id, lots.name, img, initial_price, dt_over, dt_create, users.username, description, bet_step, winner, categories.cat_name FROM lots '
        . 'JOIN categories ON lots.cat_id = categories.id '
        . 'JOIN users ON lots.user_id = users.id'
        . 'WHERE lots.id = ' . $id;
    if ($result = mysqli_query($link, $sql)) {
        if (!mysqli_num_rows($result)) {
            http_response_code(404);
            $content = include_template('templates/error.php', ['error' => 'Лот с этим ID не найден']);
        }
        else {
            $lot = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $sql = 'SELECT lots.id, lots.name, img, description, users.username FROM lots'
                . 'JOIN users ON lots.user_id = users.id'
                . 'WHERE cat_id =' . $lot["cat_id"] . 'LIMIT 3';

            $result = mysqli_query($link, $sql);

            $content = include_template('templates/lot.php', ['lot' => $lot, 'result' => $result]);
        }
    }
    else {
        $error = mysqli_error($link);
        $content = include_template('templates/error.php', ['error' => $error]);
    }
}
$layoutcontent = include_template ('templates/layout.php', ['content' => $content, 'title' => 'yeticave - Просмотр лота', 'categories' => $categories, 'autorizedUser' => $autorizedUser]);
print ($layoutcontent);
