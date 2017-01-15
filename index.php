<?php
	require_once "include/db.php";
	require_once "include/functions.php";

	$link = db_connect();

	if(isset($_GET['action'])){
		if($_GET['action'] == 'retrieve'){
			include "views/form_retrieve_data.php";
		} else if($_GET['action'] == 'mail'){
			//mail();
		}
	} else {
		include "views/form_store_data.php";
	}

	if(!empty($_POST)){
		store_data($link, $_POST['phone'], $_POST['email']);
	}


