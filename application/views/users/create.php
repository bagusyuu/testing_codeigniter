<div id="main">
	<div id="login">
		<h2>Registration Form</h2>
		<hr/>
		<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			echo form_open('users/create');
			echo "<div class='error_msg'>";
			if (isset($message_display)) {
				echo $message_display;
			}
			echo "</div>";
			echo"<br/>";
			echo form_label('Email : ');
			echo"<br/>";
			$data = array(
			'type' => 'email',
			'name' => 'email'
			);
			echo form_input($data);
			echo"<br/>";
			echo"<br/>";
			echo form_label('Password : ');
			echo"<br/>";
			echo form_password('password');
			echo"<br/>";
			echo"<br/>";
			echo form_submit('submit', 'Sign Up');
			echo form_close();
		?>
		<a href="login">For Login Click Here</a>
	</div>
</div>