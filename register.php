<?php

session_start();

require_once 'libs/phpmailer/PHPMailerAutoload.php';

$errors = [];
$result;

if(isset($_POST['name'], $_POST['email'], $_POST['tel'])){

	$fields = [
	'name' => $_POST['name'],
	'email' => $_POST['email'],
	'tel' => $_POST['tel']
	];

	foreach($fields as $field => $data){
		if(empty($data)){
			$errors[] = 'The '. $field ." field is required";
		}
	}

	if(empty($errors)){
		$m = new PHPMailer;

		$m->isSMTP();
		$m->SMTPAuth = true;
		//$m->SMTPDebug = 1;
		//setting up email
		$m->Host = 'stmp.gmail.com';
		$m->Username = '';
		$m->Password = '';
		$m->SMTPSecure = 'ssl';
		$m->Port = 465;

		$m->Subject = 'Registration for Volunteering';
		$m->Body = 'From: '. $fields['name'] .' ('. $fields.['email'] . ') ('. $fields['tel']. ')';

		$m->FromName = 'Contact';

		$m->AddAddress('foroige@foroige.ie', 'Foroige');

		if($m->send()){
			$result = 'Thanks, we will be in touch!';
		} else{
			$errors[] = 'Sorry could not send email. Try again later.';
		}


	} 
	else{
		$errors[] = 'Something went wrong.';
	}

	$_SESSION['errors'] = $errors;

	header('Location: index.php');
}







?>