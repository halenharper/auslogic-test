<?php

define('SALT', "lkjahsdfkhjajfhk3434534kuhsdfjkhfg");

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
	$phone = crypt_phone($phone);

	$email = clear_data($email);
	$email = crypt($email, SALT);

	$q = "INSERT INTO users (phone, email) VALUES ('%s', '%s')";

	$query = sprintf($q, mysqli_real_escape_string($link, $phone), mysqli_real_escape_string($link, $email));

	$result = mysqli_query($link, $query);

	if(!$result){
		die(mysqli_error($link));
	}

	return header("Location: index.php?action=retrieve");
}

/**
 * Mail data to user
 * @param $link
 * @param $email
 */
function mail_data($link, $email)
{
	if (!$email){
		return return_back();
	}
	$email = clear_data($email);
	$recipient = $email;
	$email = crypt($email, SALT);

	$q = "SELECT phone FROM users WHERE email='$email'";

	$result = mysqli_query($link, $q);

	if(mysqli_num_rows($result)){
		$row = mysqli_fetch_row($result);
		mail($recipient, 'Your phone', 'Your phone number is: ' . decrypt_phone($row[0]));
	}

	return return_back();
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

function crypt_phone($phone)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, SALT, utf8_encode($phone), MCRYPT_MODE_ECB, $iv);
	$encrypted_string = base64_encode($encrypted_string);

	return $encrypted_string;
}

function decrypt_phone($phone)
{
	$decrypted_string = base64_decode($phone);
	$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, SALT, $decrypted_string, MCRYPT_MODE_ECB, $iv);

	return $decrypted_string;
}