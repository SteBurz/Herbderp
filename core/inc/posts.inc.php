<?php

//checks if the given post id is in the table
function valid_pid($pid){
	$pid = (int)$pid;
	
	$total = mysql_query("SELECT COUNT(`post_id`) FROM `posts` WHERE `post_id` = {$pid}");
	$total = mysql_result($total, 0);
	
	if ($total != 1){
		return false;
	} else {
		return true;
	}
}

//fetches a summary of all the blog posts.
function get_posts(){
	$sql = "SELECT
				`posts`.`post_id` AS `id`,
				`posts`.`post_title` AS `title`,
				`posts`.`post_body` AS `preview`,
				`posts`.`post_category` AS `category`,
				`posts`.`post_gif` AS `GIF`,
				DATE_FORMAT(`posts`.`post_date`, '%d/%m/%Y %H:%i:%s') AS `date`,
				`comments`.`total_comments`,
				DATE_FORMAT(`comments`.`last_comment`, '%d/%m/%Y %H:%i:%s') AS `last_comment`
			FROM `posts`
			LEFT JOIN(
				SELECT
					`post_id`,
					COUNT(`comment_id`) AS `total_comments`,
					MAX('comment_date') AS `last_comment`
				FROM `comments`
				GROUP BY `post_id`
			) AS `comments`
			ON `posts`.`post_id` = `comments`.`post_id`
			ORDER BY `posts`.`post_date` DESC";
	
	$posts = mysql_query($sql);
	
	$rows = array();
	while (($row = mysql_fetch_assoc($posts)) !== false) {
		echo mysql_error();
		$rows[] = array (
			'id' 					=> $row['id'],
			'title' 				=> $row['title'],
			'preview' 				=> $row['preview'],
			'category' 				=> $row['category'],
			'GIF'					=> $row['GIF'],
			'date' 					=> $row['date'],
			'total_comments' 		=> ($row['total_comments'] === null) ? 0 : $row['total_comments'],
			'last_comment' 			=> ($row['last_comment'] === null) ? 'never' : $row['last_comment']
			);
	}
	
	return $rows;
}

//fetches a single post from the table
function get_post($pid){
	$pid = (int)$pid;
	
	$sql = "SELECT
				`post_id` AS `id`,
				`post_title` AS `title`,
				`post_body` AS `body`,
				`post_gif` AS `GIF`,
				`post_category` AS `category`,
				`post_date` AS `date`
			FROM `posts`
			WHERE `post_id` = {$pid}";
			
	$post = mysql_query($sql);
	echo mysql_error();
	$post = mysql_fetch_assoc($post);
	
	$post['comments'] = get_comments($pid);
	
	return $post;
}

//fetches a random post

function random_post(){
	$sql = "SELECT `posts`.`post_id` AS `id`,
			`post_title` AS `title`, 
			`post_body` AS `body`,
			`post_category` AS `category`,
			`posts`.`post_gif` AS `GIF`,
			`comments`.`total_comments`
			FROM `posts`
			LEFT JOIN(
				SELECT
					`comments`.`post_id`,
					COUNT(`comment_id`) AS `total_comments`,
					MAX('comment_date') AS `last_comment`
				FROM `comments`
				GROUP BY `post_id`
			) AS `comments`
			ON `posts`.`post_id` = `comments`.`post_id`
			ORDER BY RAND(NOW()) LIMIT 5";
	
	$posts = mysql_query($sql);
	
	$rows = array();
	while (($row = mysql_fetch_assoc($posts)) !== false) {
		echo mysql_error();
		$rows[] = array (
			'id' 					=> $row['id'],
			'title' 				=> $row['title'],
			'category' 				=> $row['category'],
			'GIF'					=> $row['GIF'],
			'body'					=> $row['body'],
			'total_comments' 		=> ($row['total_comments'] === null) ? 0 : $row['total_comments'],
			'last_comment' 			=> ($row['last_comment'] === null) ? 'never' : $row['last_comment']
			);
	}
	
	return $rows;
}

//adds a new blog entry
function add_post($category, $title, $body, $gif){
	$category = mysql_real_escape_string(htmlentities($category));
	$title = mysql_real_escape_string(htmlentities($title));
	$body = mysql_real_escape_string(nl2br(htmlentities($body)));
	$gif = mysql_real_escape_string(nl2br(htmlentities($gif)));
	
	mysql_query("INSERT INTO `posts` (`post_category`, `post_gif`, `post_title`, `post_body`, `post_date`) VALUES ('{$category}', '{$gif}', '{$title}','{$body}', NOW())");
	
}

// Shows only Category Pictures
function pictures() {
	$sql = "SELECT `posts`.`post_id` AS `id`,
			`post_title` AS `title`, 
			`post_body` AS `body`, 
			`post_category` AS `category`,
			`comments`.`total_comments`
			FROM `posts`
			LEFT JOIN(
				SELECT
					`comments`.`post_id`,
					COUNT(`comment_id`) AS `total_comments`,
					MAX('comment_date') AS `last_comment`
				FROM `comments`
				GROUP BY `post_id`
			) AS `comments`
			ON `posts`.`post_id` = `comments`.`post_id`
			WHERE `posts`.`post_category` = 'Pictures'
			ORDER BY `posts`.`post_date` DESC";
	
	$posts = mysql_query($sql);
	
	$rows = array();
	while (($row = mysql_fetch_assoc($posts)) !== false) {
		echo mysql_error();
		$rows[] = array (
			'id' 					=> $row['id'],
			'title' 				=> $row['title'],
			'category' 				=> $row['category'],
			'body'					=> $row['body'],
			'total_comments' 		=> ($row['total_comments'] === null) ? 0 : $row['total_comments'],
			'last_comment' 			=> ($row['last_comment'] === null) ? 'never' : $row['last_comment']
			);
	}
	
	return $rows;
}

// Shows only Category Videos
function videos() {
	$sql = "SELECT `posts`.`post_id` AS `id`,
			`post_title` AS `title`, 
			`post_body` AS `body`, 
			`post_category` AS `category`,
			`comments`.`total_comments`
			FROM `posts`
			LEFT JOIN(
				SELECT
					`comments`.`post_id`,
					COUNT(`comment_id`) AS `total_comments`,
					MAX('comment_date') AS `last_comment`
				FROM `comments`
				GROUP BY `post_id`
			) AS `comments`
			ON `posts`.`post_id` = `comments`.`post_id`
			WHERE `posts`.`post_category` = 'Videos'
			ORDER BY `posts`.`post_date` DESC";
	
	$posts = mysql_query($sql);
	
	$rows = array();
	while (($row = mysql_fetch_assoc($posts)) !== false) {
		echo mysql_error();
		$rows[] = array (	
			'id' 					=> $row['id'],
			'title' 				=> $row['title'],
			'category' 				=> $row['category'],
			'body'					=> $row['body'],
			'total_comments' 		=> ($row['total_comments'] === null) ? 0 : $row['total_comments'],
			'last_comment' 			=> ($row['last_comment'] === null) ? 'never' : $row['last_comment']
			);
	}
	
	return $rows;
}

// Shows only Category GIFs
function gifs() {
	$sql = "SELECT `posts`.`post_id` AS `id`,
			`post_title` AS `title`, 
			`post_body` AS `body`, 
			`post_category` AS `category`,
			`posts`.`post_gif` AS `GIF`,
			`comments`.`total_comments`
			FROM `posts`
			LEFT JOIN(
				SELECT
					`comments`.`post_id`,
					COUNT(`comment_id`) AS `total_comments`,
					MAX('comment_date') AS `last_comment`
				FROM `comments`
				GROUP BY `post_id`
			) AS `comments`
			ON `posts`.`post_id` = `comments`.`post_id`
			WHERE `posts`.`post_category` = 'GIFs'
			ORDER BY `posts`.`post_date` DESC";
	
	$posts = mysql_query($sql);
	
	$rows = array();
	while (($row = mysql_fetch_assoc($posts)) !== false) {
		echo mysql_error();
		$rows[] = array (	
			'id' 					=> $row['id'],
			'title' 				=> $row['title'],
			'category' 				=> $row['category'],
			'GIF'					=> $row['GIF'],
			'body'					=> $row['body'],
			'total_comments' 		=> ($row['total_comments'] === null) ? 0 : $row['total_comments'],
			'last_comment' 			=> ($row['last_comment'] === null) ? 'never' : $row['last_comment']
			);
	}
	
	return $rows;
}

?>