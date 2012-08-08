<?php
/*
 * World's best PHP form handler
 *
 * This isn't really the world's best PHP form handler, it's just a PHP script
 * that knows how to delegate work to the JSON handler.
 */

/* Buffer the output and let the JSON handler do all the work */
ob_start();

include 'json_handler.php';

/* By now, the JSON handler will have outputted to our buffer */
$response = json_decode(ob_get_clean(), true);

switch ($response['status']) {
  case 'invalid':
?>
<h1>Validation errors</h1>
<p>Please use your &lsquo;back&rsquo; button to return to the form and fix the following errors:</p>
<ul>
<?php
  foreach ($response['errors'] as $error)
    echo '<li><b>'.$error['field'].':</b> '.$error['msg'].'</li>';
?>
</ul>
<?php
  break;

  case 'sent':
?>
<h1>Success</h1>
<p>Your message was sent. Thank you!</p>
<?php
  break;

  default:
  case 'failed':
?>
<h1>Serious error</h1>
<p>There was a computer error. Your message was not sent.</p>
<?php
  break;
}
