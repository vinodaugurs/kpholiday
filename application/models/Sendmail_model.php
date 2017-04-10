<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SendMail_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('My_PHPMailer');
    }

    function send_mail2($sender_email, $username, $receiver_email, $subject, $msg) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host = "linux.gipdns.com";      // mail.kpholidays.com setting GMail as our SMTP server
        $mail->Port = 465;                   //25 SMTP port to connect to GMail
        $mail->Username = "no-reply@kpholidays.com";  // user email address
        $mail->Password = "Augurs@123";            // password in GMail       
        $mail->SetFrom($sender_email, 'no-reply@kpholidays.com');  //Who is sending the email	
        $mail->AddReplyTo($sender_email, 'info@kpholidays.com');  //email address that receives the response
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";

        $mail->AddAddress($receiver_email, $username);
        $mail->addbCC('khalidhashmi13@gmail.com');
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }

    function send_mail12($sender_email, $username, $receiver_email, $subject, $msg, $host, $port, $usrnm, $pswd) {

        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        //$mail->SMTPDebug = 1; 
        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server

        $mail->Host = $host;   // setting GMail as our SMTP server
        $mail->Port = $port;   // SMTP port to connect to GMail
        $mail->Username = $usrnm;  // user email address
        $mail->Password = $pswd;   // password in GMail

        $mail->AddReplyTo($sender_email, $username);  //email address that receives the response
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress($receiver_email, $username);

        if (!$mail->Send()) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function send_mail3() {

        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPDebug = 1;

        $mail->IsSMTP(); // we are going to use SMTP
        //$mail->SMTPDebug = 3; 

        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->Host = "mail.cash-buyers.info";      // setting GMail as our SMTP server
        $mail->Port = 25;                   // SMTP port to connect to GMail
        $mail->Username = "noreply@cash-buyers.info";  // user email address
        $mail->Password = "1qaz2wsx3edc";            // password in GMail	

        $mail->SetFrom('noreply@cash-buyer.info', 'Cash-buyers.info');  //Who is sending the email
        $mail->AddReplyTo('shailesh87singh@aol.com', 'ss');  //email address that receives the response
        $mail->AddReplyTo('shailesh87singh@gmail.com', 'ss');
        $mail->AddReplyTo('singh87shailu@yahoo.co.in', 'ss');
        $body = 'hello';
        $mail->Subject = 'ABCD';
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress('shailesh87singh@gmail.com', "aa");
        $mail->AltBody = "User Password";
        $mail->addbCC('khalidhashmi13@gmail.com');
        if (!$mail->Send()) {
            echo "ERROR";
        } else {
            echo "OKKK";
            die;
        }
    }

    function sendMail4() {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth = true; // enabled SMTP authentication
        // $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host = "mail.cash-buyers.info";      // setting GMail as our SMTP server
        $mail->Port = 25;                   // SMTP port to connect to GMail
        $mail->Username = "singh@cash-buyers.info";  // user email address
        $mail->Password = "1qaz2wsx3edc";            // password in GMail
        $mail->AddReplyTo("singh87shailu@gmail.com", "Firstname Lastname");  //email address that receives the response

        $body = "TEST Message";
        $mail->Subject = "SUB";
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AddAddress("singh87shailu@gmail.com", "Firstname Lastname");
        $mail->AltBody = "Plain text message";
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return true;
        }
    }

    function test_mail2($sender_email, $username, $receiver_email, $subject, $msg) {

        $this->load->library("fpdf181/fpdf");

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont("Arial", "B", 14);
        $pdf->Cell(40, 10, $msg);

// a random hash will be necessary to send mixed content
        $separator = md5(time());
// carriage return type (we use a PHP end of line constant)
        $eol = PHP_EOL;
// attachment name
        $filename = "example.pdf";
// encode data (puts attachment in proper format)
        $pdfdoc = $pdf->Output("", "S");
        $attachment = chunk_split(base64_encode($pdfdoc));
// main header (multipart mandatory)
        $headers = "From: " . $from . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
        $headers .= "This is a MIME encoded message." . $eol . $eol;
// message
        $headers .= "--" . $separator . $eol;
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $headers .= $message . $eol . $eol;
// attachment
        $headers .= "--" . $separator . $eol;
        $headers .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $headers .= "Content-Transfer-Encoding: base64" . $eol;
        $headers .= "Content-Disposition: attachment" . $eol . $eol;
        $headers .= $attachment . $eol . $eol;
        $headers .= "--" . $separator . "--";

        $mail = new PHPMailer();
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host = "linux.gipdns.com";      // mail.kpholidays.com setting GMail as our SMTP server
        $mail->Port = 465;                   //25 SMTP port to connect to GMail
        $mail->Username = "no-reply@kpholidays.com";  // user email address
        $mail->Password = "Augurs@123";            // password in GMail       
        $mail->SetFrom($sender_email, 'no-reply@kpholidays.com');  //Who is sending the email    
        $mail->AddReplyTo($sender_email, 'info@kpholidays.com');  //email address that receives the response
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";

        $mail->AddAddress($receiver_email, $username);
        $mail->AddAttachment($headers);
        $mail->addbCC('khalidhashmi13@gmail.com');
        //$mail->SMTPDebug = 3; 
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }

    function send_ticket_mail($sender_email, $username, $receiver_email, $subject, $msg) {
        $this->load->library('pdf');
        $data = $this->pdf->createPdf($msg);

        $mail = new PHPMailer();
        //$mail->SMTPDebug = 2;   
        $mail->IsSMTP(); // we are going to use SMTP
        $mail->SMTPAuth = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host = "linux.gipdns.com";      // mail.kpholidays.com setting GMail as our SMTP server
        $mail->Port = 465;                   //25 SMTP port to connect to GMail
        $mail->Username = "no-reply@kpholidays.com";  // user email address
        $mail->Password = "Augurs@123";            // password in GMail       
        $mail->SetFrom($sender_email, 'no-reply@kpholidays.com');  //Who is sending the email    
        $mail->AddReplyTo($sender_email, 'info@kpholidays.com');  //email address that receives the response
        $body = $msg;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->IsHTML(true);
        $mail->AltBody = "Plain text message";

        $mail->AddAddress($receiver_email, $username);
        $mail->addbCC('khalidhashmi13@gmail.com');
        $mail->addAttachment($data);

        //$mail->SMTPDebug = 3; 
        if (!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
            die;
        } else {
            return TRUE;
        }
    }

}