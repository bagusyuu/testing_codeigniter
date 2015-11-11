<h2>Update Product</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('products/update') ?>

	<label for="title">Title</label>
	<input type="input" name="title" value=<?php echo $product_item['title']?>><br />

	<label for="content">Content</label>
	<input type="textarea" name="content" value=<?php echo $product_item['content']?>><br />

	<label for="category_id">Category</label>
	<select name="category_id">
		<?php foreach ($category as $category_item): ?>
			<?php if($category_item['id'] == $product_item['category_id']): ?>
				<option selected="selected" value="<?php echo $category_item['id']; ?>">
				   <?php echo $category_item['name']; ?>
				</option>
			<?php else: ?>
				<option value="<?php echo $category_item['id']; ?>">
				   <?php echo $category_item['name']; ?>
				</option>
			<?php endif; ?>
		<?php endforeach ?>
	</select>
	<br/>
	<!-- <input type="input" name="category_id" /><br /> -->

	<label for="Price">Price</label>
	<input type="input" name="price" value=<?php echo $product_item['price']?>><br />

	<label for="pictureUrl">Picture URL</label>
	<input type="input" name="pictureUrl" value=<?php echo $product_item['pictureUrl']?>><br />

	<label for="stocks">Stocks</label>
	<input type="input" name="stocks" value=<?php echo $product_item['stocks']?>><br />

	<label for="weight">Weight</label>
	<input type="input" name="weight" value=<?php echo $product_item['weight']?>><br />

	<input style="visibility:hidden" name="user_id" value=<?php echo $user_id?>>
	<input style="visibility:hidden" name="did" value=<?php echo $this->uri->segment(2)?>>
	<br/>

	<input type="submit" name="submit" value="Update Product" />

</form>