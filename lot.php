<?php
require_once( 'app/init.php' );

$lot = null;

if (isset($_GET['id'])) {
    $lot = getLotById( $_GET['id'], $lots );
}
if (!$lot) {
    http_response_code (404);
    $pagecontent = '<h1 style="color: black">Лот с этим ID не найден</h1>';
} else
{
    $pagecontent = include_template( 'templates/lot.php', [ 'lot' => $lot, 'categories' => $categories, 'autorizedUser' => $autorizedUser]);
}

echo include_template ('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Главная', 'autorizedUser' => $autorizedUser]);
