<?php

require_once 'function.php';
require_once 'userdata.php';
require_once 'mysql_helper.php';
require_once 'db.php';

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($link, 'utf8');

$categories = [];
$content = '';


session_start();



$autorizedUser = isset($_SESSION['user']) ? $_SESSION['user'] : null;

//$is_auth = (bool) rand(0, 1);

//$user_name = 'Константин';
//$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');




