<?php
require_once ('app/init.php');
$lotbet = getBetsByUserId($autorizedUser['id']);

foreach ( $lotbet as &$bet )
{
    $lot = getLotById( $bet['lotid'], $lots );
    $category = getCategoryById( $lot['category'], $categories );

    $bet['lot-img'] = $lot['lot-img'];
    $bet['lot-name'] = $lot['lot-name'];
    $bet['lot-id'] = $lot['id'];
    $bet['category-name'] = $category['name'];
}

$pagecontent = include_template('templates/mylots.php', ['lotbet' => $lotbet]);
$layoutcontent = include_template('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Мои ставки', 'autorizedUser' => $autorizedUser]);
echo $layoutcontent;