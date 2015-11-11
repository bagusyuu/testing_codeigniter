<h2><?php echo $product_item['title'] ?></h2>
<div class="main">
	<img src=<?php echo $product_item['pictureUrls']?>><br/>
  <label><?php echo $product_item['content'] ?></label><br/>
  <label><?php echo $product_item['price'] ?></label>
  <?php
		if(isset($this->session->userdata['logged_in'])) {
			if($user_id == $product_item['user_id']){
				echo "<a onClick = 'confirmDelete();' href=".$product_item['id']."/delete>";
				echo "Hapus";
				echo "</a>";
				echo " | ";
				echo "<a href=".$product_item['id']."/update>";
				echo "Ubah";
				echo "</a>";
			}
		}
	?>
</div>

<script type="text/javascript">
function confirmDelete(){
	var agree = confirm("Are you sure you want to delete this file?");
	  if(agree == true){
	    return true
	}
	else{
	return false;
	}
}
</script>