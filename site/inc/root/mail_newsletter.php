<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$developmentMode = true;
$mailer = new PHPMailer($developmentMode);
try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
        $mailer->SMTPOptions = [ 'ssl'=> [ 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ] ];
    }
	$text="$posts->title\n$posts->content\n".(empty($posts->author)?'': "Author: $posts->author")."\n".PHP_EOL;

    $mailer->Host = 'localhost';
    $mailer->SMTPDebug  = 0;
    $mailer->SMTPAuth = true;
    $mailer->Username = $mailConfig->auth["email"];
    $mailer->Password = $mailConfig->auth["password"];
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    $mailer->setFrom($mailConfig->newsletter["email"], $Site['companyName']);
    foreach ($newsletters as $key => $newsletter) {
   		$mailer->addAddress($newsletter->email, (empty($newsletter->names)? 'Newsletter Subscriber': $newsletter->names));
	}
	// $mailer->AddReplyTo("Reply@email.com", "Hcsc"); 

    $mailer->isHTML(true);
    $mailer->Subject = $Site['companyName'].' | Newsletter';
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
      	  	<div class="container">
				<h5>'.$posts->title.' </h5>
				<div>'.$posts->content_stripe.'</div>
				'.(empty($posts->author)?'': "<strong>Author: $posts->author</strong>").'
      	  	</div>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-3.3.1.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/bootstrap.min.js"></script>
			<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>
      	  </body>
        </html>';
       $mailer->AltBody ="\n$text";
       if (!empty($files->file_upload['tmp_name']) and file_exists($files->file_upload['tmp_name'])) {
    		$mailer->addAttachment($files->file_upload['tmp_name'], $files->file_upload['name']);
       }
	if ($mailer->send()) :
		$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="border badge-pill border-success"> newsletter was successfully mailed.</p></div>';
	else:
		$fail='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error 601:</h3> <p>Unable to connect to send message</p></div>';
	endif;
	$mailer->ClearAllRecipients();

} catch (Exception $e) {
    // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
    $fail.='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error 601:</h3> <p>Unable to connect to send message</p></div>';
}
