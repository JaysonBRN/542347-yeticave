<?php

function shablon($waytofile, $arrayfile) {
	
	if (file_exists($waytofile)) {
		ob_start();
		extract ($arrayfile);
		include $waytofile;
		return ob_get_clean();
	}
    return '';
}