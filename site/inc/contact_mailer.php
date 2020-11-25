<?php global $sitePage;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$posteds =(object)$Site['post'];
if ($requestMethod == 'POST' and !empty($posteds->trigger) and $posteds->trigger=='contact'):

redirect("home");
	$err=0;
	if ( empty($posteds->names) ):
		$err++;
		$fail .= '<p>Invalid name: enter sender\'s name!</p>';
	endif;
	if ( empty($posteds->email) or !checkEmail($posteds->email)):
		$err++;
		$fail .= '<p>Invalid email: Kindly enter a valid email!</p>';
	endif;
	if ( empty($posteds->message) ):
		$err++;
		$fail .= '<p>Invalid message: Kindly enter a message!</p>';
	endif;
	if ( empty($posteds->subject) ):
		$posteds->subject= 'Enquiry';
	endif;
	if($err==0):
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
			$text="Subject: $posteds->subject\n Name: $posteds->names \n Email: $from \n Message: $posteds->message \n".PHP_EOL;

		    $mailer->Host = 'localhost';
		    $mailer->SMTPDebug  = 0;
		    $mailer->SMTPAuth = true;
		    $mailer->Username = $mailConfig->auth["email"];
		    $mailer->Password = $mailConfig->auth["password"];
		    $mailer->SMTPSecure = 'tls';
		    $mailer->Port = 587;

		    $mailer->setFrom($posteds->email, $posteds->names);
		    $mailer->addAddress($mailConfig->contact["email"], $Site['companyName']);

		    $mailer->isHTML(true);
		    $mailer->Subject = $posteds->subject;
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
		      	  	<div class="container"><h4>Name: '.$posteds->names.' </h4> <h4>Email: '.$posteds->email.' </h4> <h4>Message: '.$posteds->message.' </h4></div>
					<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-3.3.1.js"></script>
					<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/bootstrap.min.js"></script>
					<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>
		      	  </body>
		      </html>'."\n$text";

			if ($mailer->send()) :
				/*if (!empty($subDet=$ezDb->get_row("SELECT * FROM `newsletter` WHERE `email`='$posteds->email'"))) {
					$ezDb->query("UPDATE `newsletter` SET `names`='$posteds->names', `message`='$posteds->message', `options`='".json_encode($posteds->options)."', `subject`='$posteds->subject', `dateupdated`='$dateNow' WHERE `email`='$posteds->email'");
				}else{
					$ezDb->query("INSERT INTO `newsletter` (`names`, `message`, `subject`, `dateupdated`, `email`, `options`) VALUES ('$posteds->names', '$posteds->message', '$posteds->subject', '$dateNow', '$posteds->email', '".json_encode($posteds->options)."');");
				}*/
				$fail='<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p>Your message had been successfully sent.<br/>Thanks!</p></div>';
			else:
				$fail='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error 601:</h3> <p>Unable to connect to send message</p></div>';
			endif;
	    	$mailer->ClearAllRecipients();

		} catch (Exception $e) {
		    // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
		    $fail.='<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error 601:</h3> <p>Unable to connect to send message</p></div>';
		}

	else:
		$fail='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error:</h3> '.$fail.'</div>';
	endif;
	$smarty->assign("posts", $posteds)->assign("msg", $fail);
	$fail='';
endif;

if ($requestMethod == 'POST' and !empty($posteds->trigger) and $posteds->trigger=='Subscribe'):
	
redirect("home");
	$err=0;
	if ( empty($posteds->email) or !checkEmail($posteds->email)):
		$err++;
		$fail .= ' <p class="text-dark">Invalid email: Kindly enter a valid email!</p>';
	endif;
	if($err==0):
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

			$text="Subject: Newsletter Subscription\n This is to notify that the email: $posteds->email had just recently subscribe to a newsletter form $companyName website".PHP_EOL;

		    $mailer->Host = 'localhost';
		    $mailer->SMTPDebug  = 0;
		    $mailer->SMTPAuth = true;
		    $mailer->Username = $mailConfig->auth["email"];
		    $mailer->Password = $mailConfig->auth["password"];
		    $mailer->SMTPSecure = 'tls';
		    $mailer->Port = 587;

		    $mailer->setFrom($posteds->email, "Newsletter@$companyName");
		    $mailer->addAddress($mailConfig->contact["email"], $companyName.' Newsletter Subscription');

		    $mailer->isHTML(true);
		    $mailer->Subject = 'Newsletter Subscription';
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
		      	  	<div class="container">This is to notify that the email: '.$posteds->email.' had just recently subscribe to a newsletter form your website <br> <a href=\''.$siteProtocol."$domainName".'\'>'.$companyName.'</a></div>
					<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-3.3.1.js"></script>
					<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/bootstrap.min.js"></script>
					<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>
		      	  </body>
		      </html>'."\n$text";

		    /*$mailer->send();
		    $mailer->ClearAllRecipients();*/

			if (!$mailer->send()) :
				$fail='<div class="alert alert-warning alert-dismissible" role="alert" style=" position: absolute; top: 20%; margin: 10%; z-index: 1;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error 601:</h3> <p>Unable to connect to send message</p></div>';
			else:
				if (!empty($ezDb->get_row("SELECT * FROM `newsletter` WHERE `email`='$posteds->email'"))) {
					$ezDb->query("UPDATE `newsletter` SET `status`='1', `dateupdated`='$dateNow' WHERE `email`='$posteds->email'");
				}else{
					$ezDb->query("INSERT INTO `newsletter` (`status`, `dateupdated`, `email`) VALUES ('1', '$dateNow', '$posteds->email');");
				}
				$fail='<div class="alert alert-success alert-dismissible text-dark" role="alert" style=" position: absolute; top: 20%; margin: 10%; z-index: 1;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <p class="text-dark">Your newsletter subscription request is successfull.<br/>Thanks!</p></div>';
			endif;
	    	$mailer->ClearAllRecipients();
	    	
		} catch (Exception $e) {
		    // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
		    $fail.='<div class="alert alert-warning alert-dismissible  text-dark" role="alert" style=" position: absolute; top: 20%; margin: 10%; z-index: 1;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3 class="text-dark">Error 601:</h3> <p class="text-dark">Unable to connect to send message</p></div>';
		}
	else:
		$fail='<div class="alert alert-danger alert-dismissible text-dark" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error:</h3> '.$fail.'</div>';
	endif;
	$smarty->assign("posts", $posteds)->assign("msg_nl", $fail);
	$fail='';
endif;


/*if (!empty($posts->downloadPdf) and $posts->downloadPdf=='download'):
    if(empty($posts->fullname)) {
        $global_err='<p>Invalid Full Name: Kindly enter your full name</p>';
    }
    if(empty($posts->useremail) or !filter_var($posts->useremail, FILTER_VALIDATE_EMAIL)) {
        $global_err.='<p>Invalid Email Address: Kindly a valid email</p>';
    }
    if(empty($posts->phonenumber)) {
        $global_err.='<p>Invalid Phone Number: Kindly enter a valid phone number</p>';
    }
    if (empty($global_err)) {
        require_once "mail_pdf.php";
        header("location:pdf.php");
    }else{
        $global_err='<div class="form-group">
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="alert-heading">Error</h4>
                '.$global_err.'
            </div>
        </div>';
    }
endif;*/