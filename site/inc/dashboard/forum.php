<?php 

$id=(!empty($gets->id)? $gets->id: "");
$forum=$ezDb->get_row("SELECT * FROM `forums` WHERE `token`='$id'");
if (!empty($forum)) {
	$userinfo=$Site['session']['User']['userinfo'];

	if ( in_array($sitePage, array("forum")) && ($requestMethod == 'POST') && isset($Site["post"]['triggers']) && $Site["post"]['triggers']=='reply' ) {
		if ( empty(trim($posts->comment)) ):
			$fail.='<p class="border-danger">Post reply is required</p>';
			$err++;
		endif;
		if ( $err==0 ) {
			$posts->comment=testInput(str_replace("\n", "<br/>", $posts->comment));
			$ezDb->query("INSERT INTO `comments` (`email`, `postid`, `comment`, `dateposted`) VALUES ('$userinfo->email', '$id', '$posts->comment', '$dateNow')");
		}else{
			$fail='<tr><td colspan="3"><div class="alert bg-secondary text-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div></td></tr>';
		}
	}
	$forum->creatornames=$ezDb->get_var("SELECT CONCAT(`firstname`,' ',`middlename`,' ',`lastname`) FROM `userprofile` WHERE `email`='$forum->creator';");
	$forum->creatorimg=$ezDb->get_var("SELECT `userimg` FROM `userprofile` WHERE `email`='$forum->creator';");
	$forum->title_formatted=str_replace("<br/>", "\n", ($forum->title=testInputReverse($forum->title)));
	$forum->content_formatted=str_replace("<br/>", "\n", ($forum->content=testInputReverse($forum->content)));
	$forum->replies=tableRoutine("comments", '*' , " `postid`='$forum->token' ", '`id`', "DESC", "`id`", "5");
	if (!empty($forum->replies)) {
		foreach ($forum->replies as $key => $value) {
			$forum->replies[$key]->image=$ezDb->get_var("SELECT `userimg` FROM `userprofile` WHERE `email`='$value->email';");
			$forum->replies[$key]->names=$ezDb->get_var("SELECT CONCAT(`firstname`,' ',`middlename`,' ',`lastname`) FROM `userprofile` WHERE `email`='$value->email';");
			$forum->replies[$key]->comment_formatted=str_replace("<br/>", "\n", ($forum->replies[$key]->comment=testInputReverse($value->comment)));
		}
	}
	$forum->totolreplies=$ezDb->get_var("SELECT COUNT(`id`) FROM `comments` WHERE `postid`='$forum->token';");
	$forum->members=$ezDb->get_var("SELECT COUNT(DISTINCT `email`) FROM `comments` WHERE `postid`='$forum->token';");
}else{
	redirect("forums");
}
$smarty->assign("forum", $forum);