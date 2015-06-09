<?php

session_start();

require_once 'libs/phpmailer/PHPMailerAutoload.php';

$errors = [];
$result;

if(isset($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['county-select'])) {

	$fields = [
	'name' => $_POST['name'],
	'email' => $_POST['email'],
	'tel' => $_POST['tel'],
	'county-select' => $_POST['county-select']
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
		$m->Host = 'smtp.mailgun.org';
		$m->Username = 'postmaster@sandbox2899f05c85a5400fa405280d4ea67ff2.mailgun.org';
		$m->Password = 'abd9cf08e2c70dd036e0617f8b0c4325';
		$m->SMTPSecure = 'tls';
		$m->isHTML();


		$m->Subject = 'Registration for Volunteering';
		$m->Body = '<p><strong>From:</strong> '. $fields['name']. '</p>'."\n".'<p><strong>Email:</strong> '. $fields['email']. '</p>'."\n".'<p><strong>Telephone:</strong> '. $fields['tel']. '</p>'."\n".'<p><strong>County:</strong> '. $fields['county-select']. '</p>';

		$m->From = $fields['email'];

		$m->FromName = 'BBBS Registration';

		$m->AddAddress('ian.arbuckle18@gmail.com', 'Foroige');

		if($m->send()){
			header('Location: index.php');
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