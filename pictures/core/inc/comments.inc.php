<?php

//fetches all of the comments for a given blog post.
function get_comments($pid){
	$pid = (int)$pid;
	
	$sql = "SELECT
				`comment_body` AS `body`,
				`comment_user` AS `user`,
				DATE_FORMAT(`comment_date`, '%d/%m/%Y %H:%i:%s') AS `date`
			FROM `comments`
			WHERE `post_id` = {$pid}
			ORDER BY `comments`.`comment_date` DESC";
			
	$comments = mysql_query($sql);
	
	$return = array();
	while (($row = mysql_fetch_assoc($comments)) !== false) {
		$return[] = $row;
	}
	
	return $return;
}

//adds a new comment
function add_comment($pid, $user, $body){
	if (valid_pid($pid) === false) {
		return false;
	}
	
	$pid = (int)$pid;
	$user = mysql_real_escape_string(htmlentities($user));
	$body = mysql_real_escape_string(nl2br(htmlentities($body)));
	
	mysql_query("INSERT INTO `comments` (`post_id`, `comment_user`, `comment_body`, `comment_date`) VALUES ({$pid}, '{$user}', '{$body}', NOW())");
	
	return true;
}

?>