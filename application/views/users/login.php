<?php
	if (isset($logout_message)) {
		echo "<div class='message'>";
		echo $logout_message;
		echo "</div>";
	}
?>
<?php
	if (isset($message_display)) {
		echo "<div class='message'>";
		echo $message_display;
		echo "</div>";
	}
?>
<div id="main">
	<div id="login">
		<h2>Login Form</h2>
		<hr/>
		<?php echo form_open('users/auth'); ?>
		<?php
			echo "<div class='error_msg'>";
			if (isset($error_message)) {
				echo $error_message;
			}
			echo validation_errors();
			echo "</div>";
		?>
		<label>Email :</label>
		<input type="text" name="email" id="email" placeholder="email"/><br /><br />
		<label>Password :</label>
		<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
		<input type="submit" value=" Login " name="submit"/><br />
		<a href="/sign-up">To SignUp Click Here</a>
		<?php echo form_close(); ?>
	</div>
</div>