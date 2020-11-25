<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl'=> [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
    }

$divElements='<div class="row justify-content-center">
	<div class="container">
		<div class="card col-md-6">
			<div class="card-heading text-center"><h2 class="prodTitle"><img src="'.$Site['siteProtocol'].$Site['domainName'].'/site/media/i/scog-logo.jpg" style="height: 70px;"></h2></div>
			<div class="card-body">
				<h5>Dear '.$posts->firstName.',</h5>
				<p>
					Thank you for registering with ('.$domainName.')!
				</p>
				<p>
					To complete the signup process, we do require email authentication. We request that you activate your account by clicking below or copy and paste the link down below which expires in 48 hours: <br/>
					<a href="'.$Site['siteProtocol'].$Site['domainName'].'/verify?k='.$confirmkey.'" target="__blank">'.$Site['siteProtocol'].$Site['domainName'].'/verify?k='.$confirmkey.'</a>
				</p>
			</div>
		</div>
	</div>
</div>';



    $mailer->Host = 'localhost';
    $mailer->SMTPDebug  = 0;
    $mailer->SMTPAuth = true;
    $mailer->Username = $mailConfig->auth["email"];
    $mailer->Password = $mailConfig->auth["password"];
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    $mailer->setFrom($mailConfig->contact["email"], $companyName);
    $mailer->addAddress($posts->email, $posts->firstName);

    $mailer->isHTML(true);
    $mailer->Subject = "Welcomes You To Her Outstanding Business Network Platform!";
    $mailer->Body = '<html>
	     <head>
	      	<title>Signup</title>
	      	<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/bootstrap.min.css" />
			<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/css/style.css" type="text/css" />
			<style>
			</style>
	      </head>
      	  <body>
      	  	'.$divElements.'
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-3.3.1.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/bootstrap.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>
      	  </body>
      </html>';

    $text="Sender :Signup@$domainName\n\nMessage: Dear $posts->firstName,\n\n\tThank you for signing up on $domainName, To complete the signup process, we do require email authentication for email identitly confirmation. We request that you activate your account by copying and opening the link down below which expires in 48 hours on a browser:\n\n".$Site['siteProtocol'].$Site['domainName'].'/verify?k='.$confirmkey." \n".PHP_EOL;
    $mailer->AltBody = $text; 

    /*$mailer->AddReplyTo("reply@thehost.com", "Reply to address");
    $mailer->addAttachment("file.txt", "File.txt");
    $mail->setLanguage("ru");
    $mailer->msgHTML( $htmlMessage ); # <- right here!
    $mailer->CharSet = 'UTF-8';

    # Use PHP's mail() instead of SMTP:
    $mailer->IsMail();*/

    $mailer->send();
    $mailer->ClearAllRecipients();
    // echo "MAIL HAS BEEN SENT SUCCESSFULLY";
    $fail='<div class="alert text-primary alert-dismissible" role="alert">
			<i class="fa fa-checked"></i> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h3>Success!</h3><p>Your '.$Site['companyName'].' account was successfully created, and a verification link had been sent to your email</p>
			<p>Kindly visit your email to verify OR Click on <a href="'.$Site['siteProtocol'].$Site['domainName']."/resend?e=$posts->email".'" class="btn btn-link">Resend</a> if you are not receiving any confirmation link</p>
		</div>';

} catch (Exception $e) {
    // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    $fail.='<div class="alert text-warning alert-dismissible" role="alert"><i class="fa fa-warning"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Oops!</h3> <p>Unable to connect to send message</p></div>';
}