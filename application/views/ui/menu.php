<div class="gameMenu">
	<div class="defaultAlign">
		<a href="<?php echo site_url('game/dashboard');?>" class="gameMenuItem command <?php if(!empty($igSelected) && $igSelected == 'dashboard') echo 'selected';?>">C</a>
		<a href="<?php echo site_url('game/scanner');?>" class="gameMenuItem scanner <?php if(!empty($igSelected) && $igSelected == 'scanner') echo 'selected';?>">S</a>
		<a href="<?php echo site_url('game/market');?>" class="gameMenuItem market <?php if(!empty($igSelected) && $igSelected == 'market') echo 'selected';?>">M</a>
		<a href="<?php echo site_url('game/hangar');?>" class="gameMenuItem hangar <?php if(!empty($igSelected) && $igSelected == 'hangar') echo 'selected';?>">H</a>
		<a href="<?php echo site_url('game/factory');?>" class="gameMenuItem factory <?php if(!empty($igSelected) && $igSelected == 'factory') echo 'selected';?>">F</a>
		<a href="<?php echo site_url('game/laboratory');?>" class="gameMenuItem laboratory <?php if(!empty($igSelected) && $igSelected == 'laboratory') echo 'selected';?>">L</a>
		<a href="<?php echo site_url('game/training');?>" class="gameMenuItem training <?php if(!empty($igSelected) && $igSelected == 'training') echo 'selected';?>">T</a>
	</div>
</div>