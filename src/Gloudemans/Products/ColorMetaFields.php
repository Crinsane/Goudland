<?php namespace Gloudemans\Products;

class ColorMetaFields {

	/**
	 * Color Meta Fields Constructor
	 */
	public function __construct()
	{
		add_action('admin_init', [$this, 'addMetaFields']);
		add_action('edit_term', [$this, 'saveMetaFields']);
		add_action('create_product-color', [$this, 'saveMetaFields']);
		add_action('delete_term', [$this, 'deleteMetaFields']);
		add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
	}

	/**
	 * Add meta fields to the color taxonomy
	 */
	public function addMetaFields()
	{
		add_action('product-color_add_form_fields', [$this, 'addMetaFieldsToAddForm']);
		add_action('product-color_edit_form_fields', [$this, 'addMetaFieldsToEditForm']);
	}

	/**
	 * Save the meta fields
	 *
	 * @param  int  $termId
	 */
	public function saveMetaFields($termId)
	{
		$colorKey = 'color-' . $termId . '-color';
		$colorValue = isset($_POST['color']) ? $_POST['color'] : '#000000';

		update_option($colorKey, $colorValue);
	}

	/**
	 * Delete the meta fields
	 *
	 * @param  int  $termId
	 */
	public function deleteMetaFields($termId)
	{
		$color = 'color-' . $termId . '-color';

		delete_option($color);
	}

	/**
	 * Get the meta fields content
	 *
	 * @param  string  $field
	 * @return mixed|void
	 */
	protected function getMetaFields($field)
	{
		$termId = $_GET['tag_ID'];
		$key = 'color-' . $termId . '-' . $field;

		return get_option($key);
	}

	/**
	 * Add the meta fields to the 'add-form'
	 */
	public function addMetaFieldsToAddForm()
	{
		$color = $this->getMetaFields('color');

		?>
			<div class="form-field">
				<label for="color">Kleur</label>
				<input name="color" class="color-taxonomy-input" id="color" type="text" value="<?php echo $color;?>" data-default-color="#000000">
				<p class="description">Selecteer de bijpassende kleur.</p>
			</div>
		<?php
	}

	/**
	 * Add the meta fields to the 'edit-form'
	 */
	public function addMetaFieldsToEditForm()
	{
		$color = $this->getMetaFields('color');

		?>
			<tr class="form-field">
				<th scope="row">
					<label for="color">Kleur</label>
				</th>
				<td>
					<input name="color" class="color-taxonomy-input" id="color" type="text" value="<?php echo $color;?>" data-default-color="#000000">
					<p class="description">Selecteer de bijpassende kleur.</p>
				</td>
			</tr>
		<?php
	}

	/**
	 * Enqueue a special stylesheet for the slideshow taxonomy page
	 *
	 * @param  string  $hook
	 */
	public function enqueueScripts($hook)
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_script('color-taxonomy', get_template_directory_uri() . '/assets/js/color-taxonomy.js', false, true);
		wp_enqueue_script('color-taxonomy');
//		if($hook == 'edit-tags.php' && $_GET['taxonomy'] == 'slideshow')
//		{
//			wp_register_style('slideshow-taxonomy-style', get_template_directory_uri() . '/assets/css/slideshow-taxonomy-style.css');
//			wp_enqueue_style('slideshow-taxonomy-style');
//		}
	}

}