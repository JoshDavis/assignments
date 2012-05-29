<?php

$errors = array();
$completed = false;

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);
$notes = filter_input(INPUT_POST,'notes', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$preferredlang = filter_input (INPUT_POST, 'preferredlang', FILTER_SANITIZE_STRING);


if  ($_SERVER['REQUEST_METHOD']=='POST'){
	
	
	if (empty($name)) {
		$errors['name'] = true;
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email'] = true;
			
	}
	
	if (strlen($username) < 1 || strlen ($username) > 25) {
		$errors['username'] = true;	
	}
	
	
	if (empty($password)) {
		$errors['password'] = true;
	}
	
	if (!in_array($preferredlang, array('e', 'f', 's')))
    $errors['preferredlang'] = true;
	

	if(strlen($notes) < 1 || strlen($notes) > 25) {
	$errors['notes'] = true;
	}
	
	if (!isset($_POST['terms'])) {
		$errors['terms'] = true;	
	}
	
	if (empty($errors)) {
		$completed = true;
		mail($email, 'Thanks for your feedback', 'Thanks you for your feedback', "From: Josh Davis <davi0582@algonquincollege.com>\r\n");
		
	}
}