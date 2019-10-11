<?php
/**
 * Created by PhpStorm.
 * User: pascu
 * Date: 27-5-2019
 * Time: 12:58
 */

require_once('app/config/Credentials.php');
require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail extends Credentials
{
    public static function send($email, $subject, $message)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                // Set mailer to use SMTP
            $mail->SMTPAuth   = Credentials::$smtpAuth;     // Enable SMTP authentication
            $mail->Port       = Credentials::$port;         // TCP port to connect to mail
            $mail->SMTPDebug  = Credentials::$debug;        // 0 = No output / 1 = errors + msg / 2 = msg
            $mail->Host       = Credentials::$smtp;         // Specify main and backup SMTP servers
            $mail->Username   = Credentials::$email;        // SMTP username
            $mail->Password   = Credentials::$mailpwd;      // SMTP password
            $mail->SMTPSecure = Credentials::$encryption;   // Enable TLS encryption, ssl also accepted




            $mail->setFrom(Credentials::$email, Credentials::$name);            // Email from sender
            $mail->addAddress($email);                      // Email to recipient
            $mail->isHTML(true);                     // Set email format to HTML
            $mail->Subject = $subject;                      // Subject for recipient mail
            $mail->Body    = $message;                      // Body content
            $mail->AltBody = strip_tags($message);          // Stripped message for mailservices without HTML
        } catch (Exception $e) {
            echo "mail error: " . $e;
        }
        if ($mail->send()) {
            return true;
        }else {
            return false;
        }
    }
}