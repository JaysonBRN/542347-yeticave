<?php
require_once( 'app/init.php' );

session_destroy();
header('location: /index.php');
exit();