<div class="container defaultAlign">
<img class="header" src="<?php echo site_url('resources/img/banners/registration.jpg');?>"></img>
<div class="content">
	<h1>Register</h1>
	<p>
		Welcome, commander. Please fill the form below so we can proceed to your new assignments.<br/>
		Please be aware that in absolutely no case, your personal information written here will be revealed to public. Your assignement is classified top secret and I am the only one with an access to your case.
	</p>
	<div class="errorList">
		<?php echo $message; ?>
	</div>
	<?php echo form_open('user/register'); ?>
		<input type="text" name="username" placeholder="username" value="<?php echo set_value('username');?>"/>
		<input type="text" name="email" placeholder="email" value="<?php echo set_value('email');?>"/>
		<input type="password" name="password" placeholder="password" value="<?php echo set_value('password');?>"/>
		<input type="submit" value="Register"/>
	</form>
	<div class="notice textCenter">
		You already have an account ? <a href="<?php echo site_url('user/login');?>">Proceed to log in</a>
	</div>
</div>
</div>