<?php

require_once 'data.php';
require_once 'function.php';
require_once 'userdata.php';

$db = require_once 'db.php';

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($link, 'utf8');

$categories = [];
$content = '';

if (!$link) {
    $error = mysqli_connect_error();
    $content = include_template('templates/error.php', ['error' => $error]);
    echo $layoutcontent - include_template('/templates/layout.php', [['content' => $content, 'title' => 'Ошибка подключения к БД', 'autorizedUser' => $autorizedUser]);
    exit();
}

session_start();

$autorizedUser = isset($_SESSION['user']) ? $_SESSION['user'] : null;

//$is_auth = (bool) rand(0, 1);

//$user_name = 'Константин';
//$user_avatar = 'img/user.jpg';

// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');

// временная метка для настоящего времени
$now = strtotime('now');

$hours = ($tomorrow - $now) % 3600 ;
$hoursFull = floor(($tomorrow - $now) / 3600) ;
$minutes = floor($hours / 60) ;
$lot_time_remaining = sprintf('%02d', $hoursFull) . ':' . sprintf('%02d', $minutes) ;