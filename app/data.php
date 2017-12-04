<?php

$lots = [
    [
        'id' => '0',
        'lot-name' => '2014 Rossignol District Snowboard',
        'category' => 0,
        'description' => '',
        'lot-rate' => '10999',
        'lot-step' => 10,
        'lot-date' => '',
        'lot-img' => '/img/lot-1.jpg'
    ],
    [
        'id' => '1',
        'lot-name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 0,
        'description' => '',
        'lot-rate' => '159999',
        'lot-step' => 10,
        'lot-date' => '',
        'lot-img' => '/img/lot-2.jpg'
    ],
    [
        'id' => '2',
        'lot-name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 1,
        'description' => '',
        'lot-rate' => '8000',
        'lot-step' => 10,
        'lot-date' => '',
        'lot-img' => '/img/lot-3.jpg',
    ],
    [
        'id' => '3',
        'lot-name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 2,
        'description' => '',
        'lot-rate' => '10999',
        'lot-step' => 10,
        'lot-date' => '',
        'lot-img' => '/img/lot-4.jpg',
    ],
    [
        'id' => '4',
        'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 3,
        'description' => '',
        'lot-rate' => '7500',
        'lot-step' => 10,
        'lot-date' => '',
        'lot-img' => '/img/lot-5.jpg',
    ],
    [
        'id' => '5',
        'lot-name' => 'Маска Oakley Canopy',
        'category' => 5,
        'description' => '',
        'lot-rate' => '5400',
        'lot-step' => 10,
        'lot-date' => '',
        'lot-img' => '/img/lot-6.jpg',
    ]
];

$categories = [
    [
        'id' => 0,
        'name' => 'Доски и лыжи',
        'cssClass' => 'boards'
    ],
    [
        'id' => 1,
        'name' => 'Крепления',
        'cssClass' => 'attachment'
    ],
    [
        'id' => 2,
        'name' => 'Ботинки',
        'cssClass' => 'boots'
    ],
    [
        'id' => 3,
        'name' => 'Одежда',
        'cssClass' => 'clothing'
    ],
    [
        'id' => 4,
        'name' => 'Инструменты',
        'cssClass' => 'tools'
    ],
    [
        'id' => 5,
        'name' => 'Разное',
        'cssClass' => 'other'
    ]
];

$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];