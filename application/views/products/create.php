<h2>Create Product</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('products/create') ?>

	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="content">Content</label>
	<input type="textarea" name="content" /><br />

	<label for="category_id">Category</label>
	<select name="category_id">
		<?php foreach ($category as $category_item): ?>
			<option value="<?php echo $category_item['id']; ?>">
			   <?php echo $category_item['name']; ?>
			</option>
		<?php endforeach ?>
	</select>
	<br/>
	<!-- <input type="input" name="category_id" /><br /> -->

	<label for="Price">Price</label>
	<input type="input" name="price" /><br />

	<label for="pictureUrl">Picture URL</label>
	<input type="input" name="pictureUrl" /><br />

	<label for="stocks">Stocks</label>
	<input type="input" name="stocks" /><br />

	<label for="weight">Weight</label>
	<input type="input" name="weight" /><br />

	<input style="visibility:hidden" name="user_id" value=<?php echo $user_id?>>
	<br/>

	<input type="submit" name="submit" value="Create Product" />

</form>