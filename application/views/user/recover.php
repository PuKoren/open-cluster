<div class="container defaultAlign">
<img class="header" src="<?php echo site_url('resources/img/banners/planet.png');?>"></img>
<div class="content">
	<h1>Recover</h1>
	<p>
		Hello Sir. Please enter the mail address where we can send you your new credentials for the next operations.
	</p>
	<div class="errorList">
		<?php echo $message; ?>
	</div>
	<?php echo form_open('user/recover'); ?>
		<input type="text" name="email" placeholder="email" value="<?php echo set_value('email');?>"/>
		<input type="submit" value="Recover"/>
	</form>
</div>
</div>