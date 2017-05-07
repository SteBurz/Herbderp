<?php
include('core/init.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>GIFs - HerbDerp - Waste your free time!</title>
<link rel="canonical" href="http://herbderp.com/" />
<link rel="shortcut icon" href="http://www.herbderp.com/source/fav.gif" />
<meta http-equiv="language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="HerpDerp, Herp, Derp, Funny, video, pictures, meme, herpyderp, ermahgerd, herpderp.com, free, time, memes, youtube, crazy, good, Herb, herbderp.com, herbderp, pics, forever alone, alone, forever, comment, watch" />
<meta name="description" content="HerbDerp.com is a website to waste your free time! Come try it and get addicted." />
<meta name="robots" content="noodp" />
<meta property="og:title" content="Waste your free time!" />
<meta property="og:site_name" content="HerbDerp" />
<meta property="og:url" content="http://herbderp.com/" />
<meta property="og:description" content="HerbDerp is quick internet fun!" />
<meta property="og:type" content="blog" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="author" content="Steffen Burzlaff">
<meta http-equiv="expires" content="Sat, 01 Dec 2015 00:00:00 GMT">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="STYLESHEET" type="text/CSS" href="http://www.herbderp.com/source/style.css">
</head>

<body>

	<div class="header"><br/><br/><br/></div>

	<div class="page">
		<header class="header2">       
			<ul>
				<li>ermahgerd</li>
				<li class="logo"><a href="http://www.Herbderp.com" title="HerbDerp.com" alt="HerbDerp.com - Waste your free time!">Herbderp.com</a></li>
				<li style="padding-right:3.33%;"><a href="http://www.Herbderp.com/pictures/" title="Pictures" alt="Pictures - Herbderp.com">Pictures</a></li>
				<li style="padding-right:3.33%;"><a href="http://www.Herbderp.com/videos/" title="Videos" alt="Videos - Herbderp.com">Videos</a></li>
				<li><a href="http://www.Herbderp.com/gifs/" title="GIFs" alt="GIFs - Herbderp.com">GIFs</a></li>
			</ul>
		</header>   
		<table class="wrapper" border="0">
        	<tr>
            <td>
			<!-- Beginning Posts -->
			<div class="posts">
    			<?php
			
					$posts = gifs();
					foreach ($posts as $post) {
				?>
                <p style="color:#969696" >
          		<h1><a target="_blank" href="post.php?pid=<?php echo $post['id']?>"><?php echo $post['title']; ?></a></h1>
            	
            
 					<a target="_blank" href="post.php?pid=<?php echo $post['id']?>"> 							
									<img class="gif" src="<?php echo $post ['GIF'] ?>" onMouseOver="this.src='<?php echo $post ['body'] ?>';" onMouseOut="this.src='<?php echo $post ['GIF'] ?>';" title="<?php echo $post ['title'] ?>" >
									</a>
					<?php echo $post['total_comments']; ?> comments | Category: <?php echo $post['category']; ?></p>
            		<div class="sharebuttons">
                 		<a class="twitter" href="http://twitter.com/share?text=Check%20this%20out%20http://www.herbderp.com/post.php?pid=<?php echo $post['id']?>" target=     		"_blank"><img src="http://www.herbderp.com/source/twittershare.png" onmouseout="this.src='http://www.herbderp.com/source/twittershare.png'" onmouseover="this.src='http://www.herbderp.com/source/twittersharehover.png'" alt="Share on Twitter"/>
                                </a>            
                 				<a href="#" onclick="fbshare();" target="_blank"><img src="http://www.herbderp.com/source/facebookshare.png" onmouseout="this.src='http://www.herbderp.com/source/facebookshare.png'" onmouseover="this.src='http://www.herbderp.com/source/facebooksharehover.png'" alt="share on facebook" />
                                </a>
                 				<a href="#" onclick="popUp=window.open('https://plus.google.com/share?url=http://www.herbderp.com/post.php?pid=<?php echo $post['id']?>', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false" onmouseout="this.src='http://www.herbderp.com/source/googleshare.png'" onmouseover="this.src='http://www.herbderp.com/source/googlesharehover.png'" title="+1">
                 				<img src="http://www.herbderp.com/source/googleshare.png" alt="Google+ +1 Share Button">
                        		</a>
                 				<a href="post.php?pid=<?php echo $post['id']?>" title="comment" alt="write a comment">
                 					<img src="http://www.herbderp.com/source/comment.png" onmouseout="this.src='http://www.herbderp.com/source/comment.png'" onmouseover="this.src='http://www.herbderp.com/source/commenthover.png'" alt="Comment Button">
                                </a>
					</div>
            		<br />
        			<hr />

					<?php
						}
					?>
 				</div>
                </td>
				<!-- End of Posts -->
                <td>
				<div class="ad_quad">
        			<p>&nbsp;</p>
    				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- HerbDerp.com Landing -->
					<ins class="adsbygoogle"
     				style="display:inline-block;width:300px;height:250px"
     				data-ad-client="ca-pub-0052856466744282"
     				data-ad-slot="2385312124"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
    			</div>
                
                <div class="random" style="max-width:300px">
                	
                    <?php
			
						$posts = random_post();
						foreach ($posts as $preview) {
						
					?>
							<p style="color:#969696" >
								<h4 style="margin-bottom:0px;"><a href="post.php?pid=<?php echo $preview['id']?>"><?php echo $preview['title']; ?></a></h4>
            	
            		<?php if($preview['category'] == 'Pictures') { ?>
	
						<html>
							<div style="width:300px;height:70px;overflow:hidden;">
								<a href="post.php?pid=<?php echo $preview['id']?>"> 							
									<img src="<?php echo $preview ['body'] ?>" title="<?php echo $preview ['title'] ?>" /> 								
								</a>
							</div>
						</html>
	
					<?php	} elseif($preview['category'] == 'Videos') { ?>

						<html>
							<div style="width:300px;height:70px;overflow:hidden;">
								<a href="post.php?pid=<?php echo $preview['id']?>"> 							
									<iframe src="<?php echo $preview ['body'] ?>" frameborder="0" allowfullscreen title="<?php echo $preview ['title'] ?>"></iframe> 	
								</a>
							</div>
						</html>

					<?php	} else { ?>

						<html>
							<div style="width:300px;height:70px;overflow:hidden;">
								<a target="_blank" href="post.php?pid=<?php echo $preview['id']?>"> 							
									<img width="570" src="<?php echo $preview ['GIF'] ?>" title="<?php echo $preview ['title'] ?>" >
									</a>
							</div>
						</html>
                        </p>
					<?php
						}
					}

					?>
                
                </div>
                </td>
                </tr>
		</table>
        <footer role="contentinfo" class="footer">
    		<ul>
				<li style="padding-right:1.67%;"><a title="Contact" href="http://www.herbderp.com/contact/" target="_self" alt="Contact us!" >Contact</a></li>
            	<li style="padding-right:1.67%;"><a title="Terms and Conditions" href="http://www.herbderp.com/terms/" target="_self" alt="Terms and Conditions" >Terms</a></li>
            	<li style="padding-right:20%;"><a title="Privacy Policy" href="http://www.herbderp.com/privacy/" target="_self" alt="Privacy Policy">Privacy</a></li>
				<li><a title="HerbDerp.com - Waste your freetime!" href="http://www.Herbderp.com/" target="_self" alt="Fun Fun Fun">HerbDerp.com</a> © 2015</li>
			</ul>
    	</footer>  
	</div>  
</body>
<script type="text/javascript"> function fbshare(){ var sharer = "https://www.facebook.com/sharer/sharer.php?u="; window.open(sharer + location.href,'sharer', 'width=626,height=436'); } </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1334769-3', 'auto');
  ga('send', 'pageview');

</script>

</html>