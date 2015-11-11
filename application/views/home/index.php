<div style="width:1000px; margin:0 auto;">
	<?php foreach ($product as $product_item): ?>

	    <a href="products/<?php echo $product_item['id'] ?>" style='float:left; margin:10px;'>
	    	<h2><?php echo $product_item['title'] ?></h2>
		    <div class="main">
		    	<img src=<?php echo $product_item['pictureUrl']?> height="300" width="300"><br/>
		      <?php echo $product_item['content'] ?>
		      <?php echo $product_item['price'] ?>
		    </div>
	    </a>

	<?php endforeach ?>
</div>
<div style="clear:both"></div>