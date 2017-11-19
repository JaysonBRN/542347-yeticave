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
                

$lots = [
                [
                        'name' => '2014 Rossignol District Snowboard',
                        'Categorie' => 'Доски и лыжи',
                        'price' => '10999',
                        'pic' => '/img/lot-1.jpg'
                    ],
                 [
                        'name' =>'DC Ply Mens 2016/2017 Snowboard',
                        'Categorie' => 'Доски и лыжи',
                        'price' => '159999',
                        'pic' => 'img/lot-2.jpg'
                    ],
                 [
                        'name' =>'Крепления Union Contact Pro 2015 года размер L/XL',
                        'Categorie' => 'Крепления',
                        'price' => '8000',
                        'pic' => 'img/lot-3.jpg'
                    ],
                [
                        'name' =>'Ботинки для сноуборда DC Mutiny Charocal',
                        'Categorie' => 'Ботинки',
                        'price' => '10999',
                        'pic' => 'img/lot-4.jpg'
                    ],
                [
                        'name' =>'Куртка для сноуборда DC Mutiny Charocal',
                        'Categorie' => 'Одежда',
                        'price' => '7500',
                        'pic' => 'img/lot-5.jpg'
                    ],
                [
                        'name' =>'Маска Oakley Canopy',
                        'Categorie' => 'Разное',
                        'price' => '5400',
                        'pic' => 'img/lot-6.jpg'
                    ]
                ];
require_once ('function.php');
$pagecontent = shablon ('./templates/index.php', ['categories' => $categories, 'lots' => $lots, 'lot_time_remaining' => $lot_time_remaining]);
$layoutcontent = shablon ('layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Главная', 'user_name' => $user_name, 'user_avatar' => $user_avatar]);
print ($layoutcontent);
?>
