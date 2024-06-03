<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

function getSubject($fContent, $subjectContent){
	$subjectPresent = fread($fContent,filesize($subjectContent));

	return $subjectPresent;
}

function getBody($fContent, $bodyContent){
	$bodyContent = fread($fContent,filesize($bodyContent));

	return $bodyContent;
}


function sendMessage($receiver_email,
					$sender_email = 'junet@bpitattendance.online',
					$receiver_name = '',
					$sender_name = '',
					$attachments = null,
					$replyTo_email = '',
					$replyTo_name = '',
					$subFilename = 'MailContent/subjectContent.txt',
					$bodyFilename = 'MailContent/bodyContent.txt',
					$altBodyFilename = 'MailContent/altBodyContent.txt') {
	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		
		//Server settings
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'mail.bpitattendance.online';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'junet@bpitattendance.online';                     //SMTP username
	$mail->Password   = 'root';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465; 
		
		//Sender
		if( $sender_name == ''){
			$mail->setFrom($sender_email);
		}
		else{
			$mail->setFrom($sender_email,$sender_name);
		}
		

		//Receiver
		if( $receiver_name == '' ){
			$mail->addAddress($receiver_email);
		}
		else{
			$mail->addAddress($receiver_email,$receiver_name);
		}
		
		
		//Reply to
		
		if( $replyTo_email != '' ){
			if( $replyTo_name == '' ){
				$mail->addReplyTo($replyTo_email);
			}
			else{
				$mail->addReplyTo($replyTo_email,$replyTo_name);
			}
		}
		
		//Attachments
		
		if( $attachments != null ){
			$sz = count($attachments);
			$n_ele;
			for( $idx = 0 ; $idx < $sz ; $idx++ ){
				$n_ele = count($attachment[$idx]);
				
				if( $n_ele == 1 ){
					$mail->addAttachment($attachment[$idx][0]);
				}
				else{
					$mail->addAttachment($attachment[$idx][0],$attachment[$idx][1]);
				}
			}
		}
		
		
		//Recipients
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');


		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		
		//File stream reading..
		
		$fSContent = fopen($subFilename,'a+');
		$fBContent = fopen($bodyFilename,'a+');
		$fABContent = fopen($altBodyFilename,'a+');
		

		$mail->Subject = getSubject($fSContent,$subFilename);	
		$htmlBody =  getBody($fBContent,$bodyFilename);


		$mail->Body = $htmlBody;
		$nonHtmlBody = getBody($fABContent,$altBodyFilename);

		$mail->AltBody = $nonHtmlBody;

		
		fclose($fSContent);
		fclose($fBContent);
		fclose($fABContent);

		$mail->send();
		echo 'Message has been sent';
	} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>
