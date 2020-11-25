<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*------------------------*/
		$theemailer = 'jobs@'.$Site['siteProtocol'].$Site['domainName']; //enter your email address
		// $to = "info@".$domainName; //enter the email address of the contact your sending to
		$to = $jobDetails->email; 
		// error_log($to);
		$developmentMode = true;
		$mailer = new PHPMailer($developmentMode);
		try {

         	$mailer->SMTPDebug = 2;
		    $mailer->isSMTP();

		    if ($developmentMode) {
		        $mailer->SMTPOptions = [ 'ssl'=> [ 'verify_peer' => false, 'verify_peer_name' => false,  'allow_self_signed' => true ] ];
		    }

		    $mailer->Host = 'localhost';
		    $mailer->SMTPDebug  = 0;
		    $mailer->SMTPAuth = true;
		    $mailer->Username = $mailConfig->auth["email"];
		    $mailer->Password = $mailConfig->auth["password"];
		    $mailer->SMTPSecure = 'tls';

	        $mailer->setFrom($theemailer, "$companyName: Job Application Request ('.$jobDetails->jobtitle.')");
	        $mailer->addAddress($to, "Job Application Request ($jobDetails->jobtitle)");
	        $mailer->isHTML(true);
	        $mailer->Subject = "Job Application Request ($jobDetails->jobtitle)";
	        $mailer->Body = '<html>
			    <head>
			      	<title>Job Applicaton</title>
			      	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
			      	<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/css/bootstrap.min.css"/>
			      	<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/font-awesome/css/font-awesome.min.css"/>
					<link rel="stylesheet" href="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/css/style.css" type="text/css" />
			    </head>
				<body>
					<h5>From '.$companyName.': Job Application Request ('.$jobDetails->jobtitle.')</h5>
					<p>An Applicant had recently request to fill the position titled ('.$jobDetails->jobtitle.') of your job post.</p>
					<div class="row justify-content-center">
						<div class="col-sm-8 table-responsive">
							<table class="table table-striped table-hover">
								<tbody>
									<tr>
										<th>Applicant Name</th><td>'.$posts->names.'</td>
										<th>Contact Number</th><td>'.$posts->phone.'</td>
										<th>Applicant Email</th><td>'.$posts->email.'</td>
										<th>Briefing</th><td>'.$posts->comment.'</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<p><strong>Kindly find the applicant details and CV/Resume attachement as below for review.</strong><p>
					Soucre: <i><a href="'.$Site['siteProtocol'].$Site['domainName'].'" target="__blank">'.$Site['siteProtocol'].$Site['domainName'].'</a></i> powered by <a href="http://hoffenheimtechnologies.com" target="__blank"><em class="text-secondary">HOFFENHEIM TECHNOLOGIES</em></a>
					</p>
				</body>
				<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery.min.js"></script>
				<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/jquery/jquery-migrate.min.js"></script>
				<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/bootstrap/js/bootstrap.bundle.min.js"></script>
				<script src="'.$Site['siteProtocol'].$Site['domainName'].'/lib/common/js/script.js"></script>
			</html>';
			 $mailer->AltBody ="Sender : $companyName Jobs\n\nMessage: An Applicant had recently request to fill the position titled ($jobDetails->jobtitle) of your job post.
			\n\n
			Applicant Name: $posts->names\n
			Contact Number: $posts->phone\n
			Applicant Email: $posts->email\n
			Briefing: $posts->comment
			\n\nKindly find the applicant details and CV/Resume attachement as below for review.
			\n\n Thanks".PHP_EOL;
			$mailer->addAttachment($attachment);

	        // $mailer->send();
	        // $mailer->ClearAllRecipients();
	        // echo "MAIL HAS BEEN SENT SUCCESSFULLY";
	        // $msg='You have Subscribed for Newsletter. Thank you!';
	        if ($mailer->send()) :
	        	$mailer->ClearAllRecipients();
				$fail.='<div class="alert alert-info alert-dismissible" role="alert" style="position: absolute; z-index: 9999; vertical-align: middle; align-self: center; width: 70% !important; top: 140px; margin-left: 15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p> Unable to notify job poster. Kindly drop us a message @ <a href="mailto:jobs@'.$Site['siteProtocol'].$Site['domainName'].'" target="__blank"> jobs@'.$Site['siteProtocol'].$Site['domainName'].'</a></p></div>';
			else:
				$fail.='<div class="alert alert-success alert-dismissible" role="alert" style="position: absolute; z-index: 9999; vertical-align: middle; align-self: center; width: 70% !important; top: 140px; margin-left: 15%;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p> Job poster hand been notified by mail. Kindly drop us a message @ <a href="mailto:jobs@'.$Site['siteProtocol'].$Site['domainName'].'" target="__blank"> jobs@'.$Site['siteProtocol'].$Site['domainName'].'</a> for more inquiry</p></div>';
			endif;
		} catch (Exception $e) {
		    // echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
		    $msg='<div class="alert bg-secondary text-warning alert-dismissible" role="alert" style=" position: absolute; top: 20%; margin: 10%; z-index: 1;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Oops!:</h3> <p>Unable to connect to send message</p></div>';
		}
/*---------------------*/

