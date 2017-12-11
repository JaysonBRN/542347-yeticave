<?php

/**
 * @param string $waytofile
 * @param array $arrayfile
 * @return string
 */
function include_template($waytofile, $arrayfile) {
	
	if (file_exists($waytofile)) {
		ob_start();
		extract ($arrayfile);
		include $waytofile;
		return ob_get_clean();
	}
    return '';
}

/**
 * @param int $categoryId
 * @param array $categories
 * @return null|array
 */
function getCategoryById( $categoryId, array $categories )
{
    foreach ( $categories as $category )
    {
        if ( $category['id'] == $categoryId )
        {
            return $category;
        }
    }

    return null;
}

/**
 * @param int $lotId
 * @param array $lots
 * @return null|array
 */
function getLotById( $lotId, array $lots )
{
    foreach ( $lots as $lot )
    {
        if ( $lot['id'] == $lotId )
        {
            return $lot;
        }
    }

    return null;
}

/**
 * @param int $datebet
 * @return string
 */
function timeform($datebet) {
    $timediff = time() - $datebet;
    if ($timediff > 86400) {
        return date("d. m. y. H:i:s", $datebet);
    }
    if ($timediff < 3600) {
        return floor($timediff / 60) . ' минут назад';
    }
    return floor($timediff / 3600) . ' часов назад';
}

/**
 * @param string $email
 * @param array $users
 * @return bool
 */
function searchUserByEmail($email, $users) {
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }
    return $result;
}

function getAllBets() {
    if (!isset($_COOKIE['bet'])) {
        return [];
    }
    return json_decode($_COOKIE['bet'], true);
}

function makeBet($mybet) {
    $bets = getAllBets();
    $bets[] = $mybet;
    return setcookie('bet', json_encode($bets), strtotime ('+30 days'), '/');
}

function getBetsByLotId($lotid) {
    $result = [];
    foreach (getAllBets() as $bet) {
        if ($bet['lotid'] == $lotid) {
            $result[] = $bet;
        }
    }
    return $result;
}

function getBetsByUserId($userid)
{
    $result = [];
    foreach (getAllBets() as $bet) {
        if ($bet['userid'] == $userid) {
            $result[] = $bet;
        }
    }
    return $result;
}

function getUserById( $userId, array $users )
{
    foreach ( $users as $user )
    {
        if ( $user['id'] == $userId )
        {
            return $user;
        }
    }

    return null;
}

function getTimeRemaining($dt_over) {
    $now = strtotime('now');
    $time_expire = strtotime($dt_over);
    $days = ($time_expire - $now) % 86400;
    $daysFull = floor(($time_expire - $now) / 86400);
    $hours = $days % 3600 ;
    $hoursFull = floor($days / 3600) ;
    $minutes = floor($hours / 60) ;
    $lot_time_remaining = $daysFull . ' days ' . sprintf('%02d', $hoursFull) . ':' . sprintf('%02d', $minutes) ;
    return $lot_time_remaining;
}