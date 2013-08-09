<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?> - This is a game</title>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/reset-min.css');?>"></link>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/default.css');?>"></link>
	<script type="text/javascript" src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url('js/jquery.fittext.js');?>"></script>
</head>
<body>
	<div class="menu">
		<div class="menuItems defaultAlign">
			<ul>
				<li><a href="<?php echo site_url();?>">This is a Game</a></li>
				<li><a class="<?php echo ($selected == 'home')?'selected':''; ?>" href="<?php echo site_url();?>">Home</a></li>
				<?php if(empty($logged)):?>
					<li><a class="<?php echo ($selected == 'more')?'selected':''; ?>" href="<?php echo site_url('pages/more');?>">Learn More</a></li>
				<?php else:?>
					<li><a class="<?php echo ($selected == 'game')?'selected':''; ?>" href="<?php echo site_url('play');?>">Commander</a></li>
				<?php endif;?>
				<li><a class="<?php echo ($selected == 'tutorial')?'selected':''; ?>" href="<?php echo site_url('pages/tutorial');?>">How to play</a></li>
				<li><a class="<?php echo ($selected == 'leaderboard')?'selected':''; ?>" href="<?php echo site_url('pages/leaderboard');?>">Leader board</a></li>
				<li><a class="<?php echo ($selected == 'forums')?'selected':''; ?>" href="<?php echo site_url('pages/forums');?>">Forums</a></li>
				<li><a class="<?php echo ($selected == 'about')?'selected':''; ?>" href="<?php echo site_url('pages/about');?>">About</a></li>
				<?php if(empty($logged)):?>
					<li><a class="connect" href="<?php echo site_url('user/login');?>">Log In</a></li>
				<?php else:?>
					<li><a class="connect" href="<?php echo site_url('user/logout');?>">Log Out</a></li>
				<?php endif;?>
			</ul>
		</div>
	</div>
	<div class="title defaultAlign">
		<span id="date" class="left">MON AUG 07 2113</span><span id="time" class="right">11:46</span>
	</div>
	<div class="container defaultAlign">