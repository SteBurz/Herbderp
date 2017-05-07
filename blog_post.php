<?php

    include('core/init.inc.php');

    if (isset($_POST['category'], $_POST['title'], $_POST['body'], $_POST['GIF'])){
    	add_post($_POST['category'], $_POST['title'], $_POST['body'], $_POST['GIF']);
    	header('Location: index.php');
    	die();
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <link rel="STYLESHEET" type="text/CSS" href="http://www.herbderp.com/source/style.css">
        <title>Blog</title>
    </head>

    <body>
    	<form action=""	method="post">
            	<p>
            		<label for="category">Category</label>
                	<select type="radio" name="category" id="category"/>
                	    <option>Videos</option>
                	    <option>GIFs</option>
               	        <option>Pictures</option>                
    	  		</p>
                <p>
                	<label for="title">Title</label>
                    <input type="text" name="title" id="title" />
                </p>
            	<p>	<label>Link zur Datei</label>
            		<textarea name="body" rows="1" cols="60"></textarea>
           		</p>
                <p> <label>Link zum Poster (nur bei Gifs)</label>
            		<textarea name="GIF" rows="1" cols="60"></textarea>
           		</p>
            	<p>
            		<input type="submit" value="Add Post"/>
            	</p>
        </form>   
    </body>
</html>