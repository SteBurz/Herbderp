<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Upload</title>
</head>

<body>
	<!--With this Script, Pictures or Gifs, will be upload to the server.-->
	<?php
		$tempname = $_FILES['file']['tmp_name'];
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		if($size > "2000000") 
		{
		    $err[] = "File is to big, please upload a smaller one!<br>Max. is 2MB";
		}
		if(empty($err)) 
		{
		    copy("$tempname","http://www.burzlaffdesign.com/herbderp/useruploads/");
		    echo "The file $name was successfully uploaded!";
		}
		else 
		{
		    foreach($err as $error)
		    	echo "$error<br>";
		}
	?>
	</body>
</html>