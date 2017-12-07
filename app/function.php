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
        return ($timediff / 60) . ' минут назад';
    }
    return ($timediff / 3600) . ' часов назад';
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