<img class="header" src="<?php echo site_url('resources/img/banners/planet.png');?>"></img>
<div class="content">
	<h1>Login</h1>
	<p>
		Hello Sir. I'm sorry to ask you for your credentials, but we can't be too cautious. We already had attempts spy on us, so won't make any exception, even for you.
	</p>
	<div class="errorList">
		<?php echo validation_errors(); ?>
	</div>
	<?php echo form_open('user/action/login'); ?>
		<input type="text" name="email" placeholder="email" value="<?php echo set_value('email');?>"/>
		<input type="password" name="password" placeholder="password" value="<?php echo set_value('password');?>"/>
		<div id="centerCheckbox" class="center">
			<input type="checkbox" name="remember" id="rememberBox" class="css-checkbox" /><label for="rememberBox" name="remember" class="css-label">Do not ask me to log in each time</label>
		</div>
		<input type="submit" value="Login"/>
	</form>
	<div class="notice textCenter">
		You lost your password ? <a href="<?php echo site_url('user/action/recover');?>">Proceed to recovery</a>
	</div>
</div>