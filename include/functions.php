<?php

/**
 * Store form data
 * @param $link
 * @param $phone
 * @param $email
 */
function store_data($link, $phone, $email)
{
	if (!$email){
		return return_back();
	}

	$phone = clear_data($phone);

	$email = clear_data($email);

	$q = "INSERT INTO users (phone, email) VALUES ('%s', '%s')";

	$query = sprintf($q, mysqli_real_escape_string($link, $phone), mysqli_real_escape_string($link, $email));

	$result = mysqli_query($link, $query);

	if(!$result){
		die(mysqli_error($link));
	}

	return header("Location: index.php?action=retrieve");
}

/**
 * Return back if data is empty
 */
function return_back()
{
	return header("Location: index.php");
}

/**
 * Clear form data
 * @param $data
 *
 * @return string
 */
function clear_data($data)
{
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);

	return $data;
}