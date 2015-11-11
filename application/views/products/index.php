<?php foreach ($product as $product_item): ?>

    <a href="products/<?php echo $product_item['id'] ?>">
    	<h2><?php echo $product_item['title'] ?></h2>
	    <div class="main">
	    	<img src=<?php echo $product_item['pictureUrl']?>>
	      <?php echo $product_item['content'] ?>
	      <?php echo $product_item['price'] ?>
	    </div>
    </a>

<?php endforeach ?>