<?php
$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

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
$categories = [
                [
                    'name' => 'Доски и лыжи',
                    'cssClass' => 'boards'
                ],
                [
                    'name' => 'Крепления',
                    'cssClass' => 'attachment'
                ],
                [
                    'name' => 'Ботинки',
                    'cssClass' => 'boots'
                ],
                [
                    'name' => 'Одежда',
                    'cssClass' => 'clothing'
                ],
                [
                    'name' => 'Инструменты',
                    'cssClass' => 'tools'
                ],
                [
                    'name' => 'Разное',
                    'cssClass' => 'other'
                ]
            ];
require_once ('data.php');
require_once ('function.php');


$pagecontent = include_template ('templates/index.php', ['categories' => $categories, 'lots' => $lots, 'lot_time_remaining' => $lot_time_remaining]);
$layoutcontent = include_template ('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Главная', 'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar]);
print ($layoutcontent);

