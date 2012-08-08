<?php
/*
 * World's best JSON form handler
 */

/* Include configuration file */
require 'formal.conf';

$response = array('status' => null);

/* Make sure no one field is empty */
foreach ($fields as $field)
  if (empty($_POST[$field]))
    $response['errors'][] = array('field' => $field, 'msg' => 'This field cannot be left blank.');

if (isset($response['errors'])) {
  $response['status'] = 'invalid';
  echo json_encode($response);
  return;

} else {
  
  $message = '';
  
  /* Attempt to send the e-mail */
  foreach ($fields as $field)
    $message .= sprintf('%s: %s'.PHP_EOL, $field, $_POST[$field]);

  foreach ($recipients as $recipient)
    if (mail($recipient, $subject, $message) == false) {
      
      /* Sending notification failed */
      $response['status'] = 'failed';
      echo json_encode($response);
      return;
    }
  
  /* Nothing weird happened */
  $response['status'] = 'sent';
  echo json_encode($response);
  return;
}
