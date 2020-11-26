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
			<div class="card-heading text-center"><h2 class="prodTitle"><img src="'.$Site['siteProtocol'].$Site['domainName'].'/site/media/i/logo1.png" style="height: 70px;"></h2></div>
			<div class="card-body">
				<h5>Dear '.$posts->informant_firstname.',</h5>
                <p>Your Registration of birth detail is successfully sent for verification</p>
                <p>Your Registration Search ID is <strong>'.$genRefid.'</strong> encure to copy and keep it safe. You can also find it in the informant\'s email</p>
                <p>We will send you a mail once the registration is verified and approved.</p>
                <p>Use this link to check for the certificate and print when approved: <a href="'.$Site['siteProtocol'].$Site['domainName'].'/find-registration?regId='.$genRefid.'">'
                .$Site['siteProtocol'].$Site['domainName'].'/find-registration?regId='.$genRefid.'</a></p>
			</div>
		</div>
	</div>
</div>';

    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPDebug  = 0;
    $mailer->SMTPAuth = true;
    $mailer->Username = $mailConfig->auth["email"];
    $mailer->Password = $mailConfig->auth["password"];
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 465;

    $mailer->setFrom($mailConfig->contact["email"], $companyName);
    $mailer->addAddress($posts->informant_email, $posts->informant_firstname);

    $mailer->isHTML(true);
    $mailer->Subject = $companyName." Says!";
    $mailer->Body = '<html>
	     <head>
	      	<title>Signup</title>
	      	<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/css/bootstrap.min.css" />
			<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/css/style.css" type="text/css" />
			<style>
			</style>
	      </head>
      	  <body>
      	  	'.$divElements.'
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-3.3.1.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/js/bootstrap.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>
      	  </body>
      </html>';

    $text="Sender :Registration@$domainName\n\nMessage: Dear $posts->informant_firstname,
    \n\n\tYour Registration of birth detail is successfully sent for verification
    \n\n\tYour Registration Search ID is <strong>'.$genRefid.'</strong> encure to copy and keep it safe. You can also find it in the informant\'s email
    \n\n\tWe will send you a mail once the registration is verified and approved.
    \n\n Use this link to check for the certificate and print when approved: ".$Site['siteProtocol'].$Site['domainName'].'/find-registration?regId='.$genRefid." \n".PHP_EOL;
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
        <h3>Success!</h3><p>Registration of birth detail is successfully added</p>
        <p>A mail had been sent to informant\'s email regarding this registration</p>
        <p>Your Registration Search ID is <strong>'.$genRefid.'</strong>.</p>
        <p>Kindly notify informat to check email form time to time for notification with link to print the birth certificate if approved.</p>
    </div>';

} catch (Exception $e) {
    // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    $fail.='<div class="alert text-warning alert-dismissible" role="alert"><i class="fa fa-warning"></i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Oops!</h3> 
        <h3>Success!</h3><p>Your Registration of birth detail is successfully sent for verification</p>
        <p>Unable to connect to send message</p>
        <p>Your Registration Search ID is <strong>'.$genRefid.'</strong> encure to copy and keep it safe. You can also find it in the informant\'s email</p>
        <p>Kindly visit your email form time to time for you will receive email notification with link to print the birth certificate if approved.</p>
    </div>';
}