<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Redex</title>
		<meta charset="UTF-8" />
        <meta name="description" content="Sliding Background Image Menu with jQuery" />
        <meta name="keywords" content="jquery, background image, image, menu, navigation, panels" />
		<meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css' />

    </head>
    <body>
		<div class="container">
			<div class="header">
				<h1>Exercising<span>redefining progress</span></h1>
			</div>
			<div class="content">
				<div id="sbi_container" class="sbi_container">
					
					<div class="sbi_panel" data-bg="images/insanitylogo.jpg">
						<a href="#" class="sbi_label">Get Started</a>
						<div class="sbi_content">
							<ul>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Create Account</a></li>
							</ul>
						</div>
					</div>
					<div class="sbi_panel" data-bg="images/filler.jpg">
						<a href="#" class="sbi_label">About Us</a>
						<div class="sbi_content">
							<ul>
								<li><a href="#">Saad</a></li>
								<li><a href="#">Vishal</a></li>
								<li><a href="#">Our Vision</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="topbar">		
				<span class="right_ab">			
					<a href="http://tympanus.net/codrops/2011/07/03/sliding-background-image-menu/"><strong>Credit to Codrops for homepage</strong></a>
				</span>
			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.bgImageMenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sbi_container').bgImageMenu({
					defaultBg	: 'images/default.jpg',
					border		: 5,
					type		: {
						mode		: 'fade',
						speed		: 250,
						easing		: 'jswing'
					}
				});
			});
		</script>
    </body>
</html>