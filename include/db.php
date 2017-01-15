<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'ExtaZY_123');
define('DB_NAME', 'db_test');

function db_connect() {
	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die("Error: " . mysqli_error($link));
	if(!mysqli_set_charset($link, "utf8")){
		printf("Error: " . mysqli_error($link));
	}

	return $link;
}