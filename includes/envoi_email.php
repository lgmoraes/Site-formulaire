<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	function envoi_mail($destinataires, $copiesCachees, $subject, $msgHTML) {
		if(!MAIL_ENABLED)
			return "MAIL DISABLED";
		
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		// Set encoding. Must be after $mail = new PHPMailer();
		$mail->CharSet = MAIL_CHARSET;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = MAIL_HOST;
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = MAIL_PORT;
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		//Username to use for SMTP authentication
		$mail->Username = MAIL_USERNAME;
		//Password to use for SMTP authentication
		$mail->Password = MAIL_PASSWORD;
		//Set who the message is to be sent from
		$mail->setFrom(MAIL_FROM, MAIL_NAME);
		//Set an alternative reply-to address
		$mail->addReplyTo(MAIL_FROM, MAIL_NAME);
		//Set who the message is to be sent to
		foreach ($destinataires as $adresse) {
			$mail->addAddress($adresse);
		}
		//Indique des adresses en copie cachées
		foreach ($copiesCachees as $adresse) {
			$mail->addBCC($adresse);
		}
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		//$mail->msgHTML($msgHTML);
		$mail->msgHTML($msgHTML);
		//Replace the plain text body with one created manually
		//$mail->AltBody = 'This is a plain-text message body';
		//Attachment
		
		//send the message, check for errors
		if (!$mail->send()) {
			error_log(print_r("Mailer Error: " . $mail->ErrorInfo, TRUE), 0);
		}
	}
	
	function envoi_mail_formulaire() {
		$destinataires = explode(';', MAIL_LIST);
		$copiesCachees = array();
		$msgHTML = "";
		$responses = "";

		foreach ($_POST as $key => $value) {
			$responses .= $key . ' : ' . $value . '<br />';
		}
		
		$msgHTML = '
			<table width="100%" style="background: #ececec">
				<tr>
					<td align="center">
						<table width="550px" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border:1px solid #b3b3b3;font-family:\'Open Sans\',\'Helvetica Neue\',Helvetica,Arial,sans-serif;font-weight: bold;background:#f9fbf8;">
							<tr>
								<td>
									<div style="color:white;background:#1687a7;font-size:40px;padding:15px;">
										FORMULAIRE ENVOYÉ
									</div>
									<div style="text-align:center;color:white;background:#D20014;line-height:40px;">
									'. date("d-m-Y H:i:s") .'
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div style="padding:1em;">
										' . $responses . '
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		';
		
		envoi_mail($destinataires, $copiesCachees, 'Formulaire envoyé', $msgHTML);
	}
	
?>