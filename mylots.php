<?php
require_once ('app/init.php');
$lotbet = getBetsByUserId($autorizedUser['id']);
$pagecontent = include_template('templates/mylots.php', ['lotbet' => $lotbet]);
$layoutcontent = include_template('templates/layout.php', ['content' => $pagecontent, 'title' => 'yeticave - Главная', 'autorizedUser' => $autorizedUser]);
echo $layoutcontent;