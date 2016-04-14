<?

function send_email_reminder($email, $firstname, $host, $time, $link){
  date_default_timezone_set('Etc/UTC');

  require 'vendor/autoload.php';
  $mail = new PHPMailer;

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.mandrillapp.com';                 // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'lionelpaulus@gmail.com';           // SMTP username
  $mail->Password = 'D--1W8oPFHf7OFTbALWZlA';           // SMTP password
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom('noreply@homely-app.com', 'Homely');
  $mail->addAddress($email);

  $mail->isHTML(true);                                  // Set email format to HTML

  $postdata = http_build_query(
      array(
          'firstname' => $firstname,
          'host' => $host,
          'time' => $time,
          'link' => $link
      )
  );

  $opts = array('http' =>
      array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => $postdata
      )
  );

  $context  = stream_context_create($opts);

  $mail->Subject = "Reminder: You've got a movie session today";
  $mail->msgHTML(file_get_contents(URL.'views/emails/reminder.php', false, $context), dirname(__FILE__));

  if(!$mail->send()) {
      return $mail->ErrorInfo;
  } else {
      return true;
  }
}