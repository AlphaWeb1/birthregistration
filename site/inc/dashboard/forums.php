<?php

$userinfo=$Site['session']['User']['userinfo'];
$whereClause="";


if ( in_array($sitePage, array("forums")) && ($requestMethod == 'POST') && isset($Site["post"]['triggers']) && $Site["post"]['triggers']=='converse' ) {
	if ( empty(trim($posts->title)) ):
		$fail.='<p class="border-danger">Post title is required</p>';
		$err++;
	endif;
	if ( empty(trim($posts->content)) ):
		$fail.='<p class="border-danger">Post content is required</p>';
		$err++;
	endif;
	if ( $err==0 ) {
		$posts->content=testInput(str_replace("\n", "<br/>", $posts->content));
		$posts->title=testInput(str_replace("\n", "<br/>", $posts->title));
		$posts->tag=testInput($posts->tag);
		$posts->tokened=(getToken(5).$ezDb->get_var("SELECT IFNULL((`id`+1),1) FROM `forums` ORDER BY `id` DESC LIMIT 1;"));
		$ezDb->query("INSERT INTO `forums` (`token`, `creator`, `title`, `content`, `dateadded`, `lastvisit`) VALUES ('$posts->tokened', '$userinfo->email', '$posts->title', '$posts->content', '$dateNow', '$dateNow')");
		redirect("forum?id=$posts->tokened");
	}else{
		$fail='<div class="alert bg-secondary text-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> '.$fail.'</div>';
	}
}

$forums=tableRoutine("forums", '*' , " `id`!=0 $whereClause", '`id`');

if (!empty($forums)) {
	foreach ($forums as $key => $forum) {
		$forum->creatornames=$ezDb->get_var("SELECT CONCAT(`firstname`,' ',`middlename`,' ',`lastname`) FROM `userprofile` WHERE `email`='$forum->creator';");
		$forum->creatorimg=$ezDb->get_var("SELECT CONCAT(`userimg`) FROM `userprofile` WHERE `email`='$forum->creator';");
		$forum->title_formatted=str_replace("<br/>", "\n", ($forum->title=testInputReverse($forum->title)));
		$forum->content_formatted=str_replace("<br/>", "\n", ($forum->content=testInputReverse($forum->content)));
		$forum->replies=$ezDb->get_var("SELECT COUNT(`id`) FROM `comments` WHERE `postid`='$forum->token';");
		$forum->members=$ezDb->get_var("SELECT COUNT(DISTINCT `email`) FROM `comments` WHERE `postid`='$forum->token';");
	}
}
$smarty->assign("forums", $forums);