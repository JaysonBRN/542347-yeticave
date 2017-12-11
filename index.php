<?php
require_once 'app/init.php';

if (!$link) {
    $error = mysqli_connect_error();
    $content = include_template('templates/error.php', ['error' => $error]);
}
else {
    $sql = 'SELECT id, cat_name, css_class FROM categories';
    $result = mysqli_query($link, $sql);
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $content = include_template('templates/error.php', ['error' => $error]);
    }
    $sql = 'SELECT lots.id, lots.name, img, initial_price, dt_over, categories.cat_name FROM lots '
        . 'JOIN categories ON lots.cat_id = categories.id '
        . 'ORDER BY dt_over DESC LIMIT 6';
    if ($result = mysqli_query($link, $sql)) {
        $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $content = include_template('templates/index.php', ['lots' => $lots, 'categories' => $categories]);
    }

}
//echo $layoutcontent - include_template('/templates/index.php', ['content' => $content, 'categories' => $categories]);



//$pagecontent = include_template ('templates/index.php', ['categories' => $categories, 'lots' => $lots, 'lot_time_remaining' => $lot_time_remaining]);
$layoutcontent = include_template ('templates/layout.php', ['content' => $content, 'title' => 'yeticave - Главная', 'categories' => $categories, 'autorizedUser' => $autorizedUser]);
print ($layoutcontent);

