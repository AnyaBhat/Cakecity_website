<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $shop_now = new PHP_Email_Form;
  $shop_now->ajax = true;
  
  $shop_now->to = $receiving_email_address;
  $shop_now->from_name = $_POST['name'];
  $shop_now->from_email = $_POST['email'];
  $shop_now->subject = "New cake order request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $shop_now->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $shop_now->add_message( $_POST['name'], 'Name');
  $shop_now->add_message( $_POST['email'], 'Email');
  $shop_now->add_message( $_POST['phone'], 'Phone', 4);
  $shop_now->add_message( $_POST['date'], 'Date', 4);
  $shop_now->add_message( $_POST['time'], 'Time', 4);
  $shop_now->add_message( $_POST['weight'], 'Weight in KG', 1);
  $shop_now->add_message( $_POST['message'], 'Message');

  echo $shop_now->send();
?>
