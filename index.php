<?php
require_once 'app/init.php';

$pagecontent = include_template ('templates/index.php', ['categories' => $categories, 'lots' => $lots, 'lot_time_remaining' => $lot_time_remaining]);
$layoutcontent = include_template ('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Главная', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar]);
print ($layoutcontent);

