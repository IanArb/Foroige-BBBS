<?php if(empty($_POST) || !isset($_POST)) {
 
  ajaxResponse('error', 'Post cannot be empty.');
 
} else {
 
  $postData = $_POST;
  $dataString = implode($postData,",");
 
  $mailgun = sendMailgun($postData);
 
  if($mailgun) {
 
    ajaxResponse('success', 'Great success.', $postData, $mailgun);
 
  } else {
 
    ajaxResponse('error', 'Mailgun did not connect properly.', $postData, $mailgun);
 
  }
 
}

function ajaxResponse($status, $message, $data = NULL, $mg = NULL) {
  $response = array (
    'status' => $status,
    'message' => $message,
    'data' => $data,
    'mailgun' => $mg
    );
  $output = json_encode($response);
  exit($output);
}

function sendMailgun($data) {
 
  $api_key = 'key-4bf750cc493394097315292f2c7d03a3';
  $api_domain = 'sandbox2899f05c85a5400fa405280d4ea67ff2.mailgun.org';
  $send_to = 'ian.arbuckle18@gmail.com';
 
  $name = $data['name'];
  $email = $data['email'];
  $tel = $data['tel'];
  $county-select = $data['county-select'];
 
  $messageBody = '<p><strong>From:</strong> '. $name. '</p>'."\n".'<p><strong>Email:</strong> '. $email. '</p>'."\n".'<p><strong>Telephone:</strong> '. $tel. '</p>'."\n".'<p><strong>County:</strong> '. $county-select. '</p>';
 
  $config = array();
  $config['api_key'] = $api_key;
  $config['api_url'] = 'https://api.mailgun.net/v2/'.$api_domain.'/messages';
 
  $message = array();
  $message['from'] = $email;
  $message['to'] = $send_to;
  $message['h:Reply-To'] = $email;
  $message['subject'] = $data['subject'];
  $message['text'] = $messageBody;
 
  $curl = curl_init();
 
  curl_setopt($curl, CURLOPT_URL, $config['api_url']);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_POST, true); 
  curl_setopt($curl, CURLOPT_POSTFIELDS,$message);
 
  $result = curl_exec($curl);
 
  curl_close($curl);
  return $result;
 
}

?>