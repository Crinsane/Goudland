<?php namespace Gloudemans\Products;

class ProductMetaBoxes {

	/**
	 * Add meta boxes
	 */
	public function __construct()
	{
		add_action('add_meta_boxes', [$this, 'addSpecificationsMetaBox']);
		add_action('add_meta_boxes', [$this, 'addProductMetaBoxes']);
		add_action('save_post', [$this, 'saveMeta']);
	}

	/**
	 * Add the specifications meta box
	 */
	public function addSpecificationsMetaBox()
	{
		add_meta_box('product-specifications', 'Specificaties', [$this, 'renderSpecificationsMetaBox'], 'product', 'advanced', 'high');
	}

	/**
	 * Add the product meta boxes
	 */
	public function addProductMetaBoxes()
	{
		add_meta_box('product-price', 'Prijs', [$this, 'renderProductMetaBoxes'], 'product', 'advanced', 'high');
	}

	/**
	 * Render the specifications meta box
	 *
	 * @param $post
	 */
	public function renderSpecificationsMetaBox($post)
	{
		$specifications = get_post_meta($post->ID, 'product-specifications', true);

		?>
			<table class="form-table">
				<tbody>
					<tr>
						<td>
							<?php wp_editor($specifications, 'product_specifications', [
								'textarea_rows' => 14
							]);?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
	}


	/**
	 * Render the product meta boxes
	 *
	 * @param $post
	 */
	public function renderProductMetaBoxes($post)
	{
		$price = get_post_meta($post->ID, 'product-price', true);
		$price = str_replace('.', ',', $price);

		$sale = get_post_meta($post->ID, 'product-sale', true);

		$slideshow = get_post_meta($post->ID, 'product-slideshow', true);

		?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="product-price">Prijs</label></th>
						<td><input type="text" name="product-price" id="product-price" value="<?php echo $price;?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="product-sale">Aanbieding</label></th>
						<td>
							<label>
								<input type="checkbox" name="product-sale" id="product-sale" <?php checked('1', $sale);?> value="1">
								Is dit product in de aanbieding?
							</label>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="product-slideshow">Slideshow slug</label></th>
						<td>
							<input type="text" name="product-slideshow" id="product-slideshow" value="<?php echo $slideshow;?>" class="regular-text">
							<p class="description">De slideshow slug van je slideshows vind je op <a href="<?php echo site_url();?>/wp-admin/edit-tags.php?taxonomy=slideshow&post_type=slide">deze pagina.</a></p>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
	}

	/**
	 * Save the post meta
	 *
	 * @param $post_id
	 */
	public function saveMeta($post_id)
	{
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

		if(isset($_POST['product-price']))
		{
			$price = $_POST['product-price'];

			$price = str_replace(',', '.', $price);

			update_post_meta($post_id, 'product-price', $price);
		}

		if(isset($_POST['product-sale']))
		{
			update_post_meta($post_id, 'product-sale', 1);
		}
		else
		{
			update_post_meta($post_id, 'product-sale', 0);
		}

		if(isset($_POST['product-slideshow']))
		{
			$productSlider = $_POST['product-slideshow'];

			update_post_meta($post_id, 'product-slideshow', $productSlider);
		}

		if(isset($_POST['product_specifications']))
		{
			$productSpecifications = $_POST['product_specifications'];

			update_post_meta($post_id, 'product-specifications', $productSpecifications);
		}
	}

}