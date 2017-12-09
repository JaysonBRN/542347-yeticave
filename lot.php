<?php
require_once('app/init.php');


$lot = null;

if (isset($_GET['id'])) {
    $lot = getLotById( $_GET['id'], $lots );
}

$lotbetuser = getBetsBylotId($lot['id']);

foreach ($lotbetuser as &$userinfo) {
    $user = getUserById($userinfo['userid'], $users);

    $userinfo['username'] = $user['name'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cost = (int)$_POST['cost'];
    $lotbet = [
        'cost' => $cost,
        'lotid' => $lot['id'],
        'time' => time(),
        'userid' => $autorizedUser['id']
    ];

    if ($cost >= ($lot['lot-rate'] + $lot['lot-step'])) {
        makeBet($lotbet);
        header ('location: /mylots.php');
        exit();
    }
}

if (!$lot) {
    http_response_code (404);
    $pagecontent = '<h1 style="color: black">Лот с этим ID не найден</h1>';
}
else
{
    $pagecontent = include_template( 'templates/lot.php', [ 'lot' => $lot, 'lotbetuser' => $lotbetuser, 'categories' => $categories, 'autorizedUser' => $autorizedUser]);
}

echo include_template ('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Главная', 'autorizedUser' => $autorizedUser]);




