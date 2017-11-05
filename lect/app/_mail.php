<?php


			require 'mail_mgr/class.phpmailer.php';
			$from = "josina08@gmail.com";
			$mail = new PHPMailer();
			$mail->IsSMTP(true); // SMTP
			$mail->SMTPAuth   = true;  // SMTP authentication
			$mail->Mailer = "smtp";
			$mail->Host       = "smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
			$mail->Port       = 587;                    // set the SMTP port
			$mail->Username   = "josina08@gmail.com";  // SES SMTP  username
			$mail->Password   = "p@ssw0rd4me";  // SES SMTP password
			$mail->SetFrom($from, 'From Web-Based File Manager');
			$mail->AddReplyTo($from,'From Web-Based File Manager');
			$mail->AddEmbeddedImage($logo, 'logoimg'); 
			
			/* foreach($attachments as $key => $value) { 
			$mail->AddAttachment($value);
			} */
			
			$mail->Subject = $subject;
			$mail->MsgHTML($body);
			//$mail->IsHTML(false);
			$address = $to;
			$mail->AddAddress($address, $to);
			
			if(!$mail->Send())
			{
			//return false;
			$errmsg_arr[] = 'Your email was not sent!';
					$errflag = true;
					
			}
			else
			{
			//return true;
			$errmsg_arr[] = 'Your Email Was sent!';
					
			}


?>