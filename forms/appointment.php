<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Load .env (simple loader)
  function load_env_file($path) {
    if (!file_exists($path)) return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
      $line = trim($line);
      if ($line === '' || $line[0] === '#') continue;
      if (strpos($line, '=') === false) continue;
      list($name, $value) = explode('=', $line, 2);
      $name = trim($name);
      $value = trim($value);
      // strip surrounding quotes if present
      $value = trim($value, "\"'");
      putenv("$name=$value");
      $_ENV[$name] = $value;
      $_SERVER[$name] = $value;
    }
  }

  // look for .env in repo root (forms/ is one level down)
  $envPath = dirname(__DIR__) . '/.env';
  load_env_file($envPath);

  // Replace contact@example.com with your real receiving email address (can be overridden via .env)
  $receiving_email_address = getenv('RECEIVING_EMAIL_ADDRESS') ?: 'bsrealtyllc@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'] ?? '';
  $contact->from_email = $_POST['email'] ?? '';
  $contact->subject = 'Online Appointment Form';

  // Use SMTP only if SENDINBLUE_API_KEY (or SMTP_PASSWORD) present in env
  $smtp_password = getenv('SENDINBLUE_API_KEY') ?: getenv('SMTP_PASSWORD');
  $smtp_username = getenv('SENDINBLUE_USERNAME') ?: 'bsrealtyllc@gmail.com';
  if ($smtp_password) {
    $contact->smtp = array(
      'host' => 'smtp-relay.brevo.com',
      'SMTPAuth' => true,
      'username' => $smtp_username,
      'password' => $smtp_password,
      'port' => 587
    );
  }

  $contact->add_message( $_POST['name'] ?? '', 'Name');
  $contact->add_message( $_POST['email'] ?? '', 'Email');
  $contact->add_message( $_POST['phone'] ?? '', 'Phone');
  $contact->add_message( $_POST['date'] ?? '', 'Appointment Date');
  $contact->add_message( $_POST['department'] ?? '', 'Department');
  $contact->add_message( $_POST['doctor'] ?? '', 'Doctor');
  $contact->add_message( $_POST['message'] ?? '', 'Message');

  echo $contact->send();
?>
