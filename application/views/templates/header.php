<html>
	<head>
		<title><?php echo $title ?> - CodeIgniter 2 Tutorial</title>
		<?php echo link_tag('application/assets/css/bootstrap.css')?>
		<?php echo link_tag('application/assets/css/bootstrap-theme.css')?>
		<?php echo link_tag('application/assets/css/main.css')?>

	</head>
	<body>
		<div id="main-head-container">
			<a href="/CodeIgniter/index.php/Home" style='float:left;'>
				<img id="image" src="https://photos-1.dropbox.com/t/2/AAAdpoJ0b8BD2Vt8foAg26O9oLoxye7Q5Ag7WYcKlFRuRA/12/206853337/jpeg/32x32/1/_/1/2/12202377_10205511557054464_19354646_n.jpg/EK_NkJwBGCEgAigC/MaLIbtfR0wsg7tkEybBQcZ5ku2DTITJYxu2IHW48wtw?size=1024x768&size_mode=2" alt="logo" height="100" width="100"/>
			</a>
			<div style="float:right; margin:50px;">
				
				<?php
					if(isset($this->session->userdata['logged_in'])) {
						echo "<div style='float:left;'><a href='".base_url()."index.php/products/create'>Buat Product</a></div>";
						echo "<div style='float:left;'>|<a href='".base_url()."index.php/logout'>Keluar</a></div>";
						// echo "<div style='float:left;'><a href='/CodeIgniter/index.php/products/create'>Buat Product</a></div>";
						// echo "<div style='float:left;'>|<a href='/CodeIgniter/index.php/logout'>Keluar</a></div>";
					} else {
						echo "<div style='float:left;'><a href='".base_url()."index.php/sign-up'>Daftar</a></div>";
						echo "<div style='float:left;'>|<a href='".base_url()."index.php/login'>Masuk</a></div>";
						// echo "<div style='float:left;'><a href='/CodeIgniter/index.php/sign-up'>Daftar</a></div>";
						// echo "<div style='float:left;'>|<a href='/CodeIgniter/index.php/login'>masuk</a></div>";
					}
				?>
			</div>
			<div style="clear:both"></div>
		</div>

