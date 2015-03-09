<?php

class Slideshow_Meta_Fields {

	/**
	 * Slideshow Meta Fields Constructor
	 */
	public function __construct()
	{
		add_action('admin_init', [$this, 'addMetaFields']);
		add_action('edit_term', [$this, 'saveMetaFields']);
		add_action('create_slideshow', [$this, 'saveMetaFields']);
		add_action('delete_term', [$this, 'deleteMetaFields']);
		add_action('admin_enqueue_scripts', [$this, 'enqueueStyles']);
	}

	/**
	 * Add meta fields to the slideshow taxonomy
	 */
	public function addMetaFields()
	{
		add_action('slideshow_add_form_fields', [$this, 'addMetaFieldsToAddForm']);
		add_action('slideshow_edit_form_fields', [$this, 'addMetaFieldsToEditForm']);
	}

	/**
	 * Save the meta fields
	 *
	 * @param  int  $termId
	 */
	public function saveMetaFields($termId)
	{
		$intervalKey = 'slideshow-' . $termId . '-interval';
		$intervalValue = isset($_POST['interval']) ? $_POST['interval'] : 10000;

		update_option($intervalKey, $intervalValue);

		$animationKey = 'slideshow-' . $termId . '-animation';
		$animationValue = isset($_POST['animation']) ? $_POST['animation'] : 'slide';

		update_option($animationKey, $animationValue);
	}

	/**
	 * Delete the meta fields
	 *
	 * @param  int  $termId
	 */
	public function deleteMetaFields($termId)
	{
		$interval = 'slideshow-' . $termId . '-interval';
		$animation = 'slideshow-' . $termId . '-animation';

		delete_option($interval);
		delete_option($animation);
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
		$key = 'slideshow-' . $termId . '-' . $field;

		return get_option($key);
	}

	/**
	 * Add the meta fields to the 'add-form'
	 */
	public function addMetaFieldsToAddForm()
	{
		$interval = $this->getMetaFields('interval');
		$animation = $this->getMetaFields('animation');

		?>
			<div class="form-field">
				<label for="interval">Tijd tussen slides</label>
				<input name="interval" id="interval" type="text" value="<?php echo $interval;?>" size="40">
				<p class="description">De tijd tussen slides in milliseconden (1000ms = 1s).</p>
			</div>
			<div class="form-field">
				<label for="animation">Animatie</label>
				<select name="animation" id="animation">
					<option <?php selected($animation, 'slide'); ?> value="slide">Slide</option>
					<option <?php selected($animation, 'fade'); ?> value="fade">Fade</option>
				</select>
				<p class="description">Selecteer de animatie die gebruikt wordt door de slideshow.</p>
			</div>
		<?php
	}

	/**
	 * Add the meta fields to the 'edit-form'
	 */
	public function addMetaFieldsToEditForm()
	{
		$interval = $this->getMetaFields('interval');
		$animation = $this->getMetaFields('animation');

		?>
			<tr class="form-field">
				<th scope="row">
					<label for="interval">Tijd tussen slides</label>
				</th>
				<td>
					<input name="interval" id="interval" type="text" value="<?php echo $interval;?>" size="40">
					<p class="description">De tijd tussen slides in milliseconden (1000ms = 1s).</p>
				</td>
			</tr>
			<tr class="form-field">
				<th scope="row">
					<label for="animation">Animatie</label>
				</th>
				<td>
					<select name="animation" id="animation">
						<option <?php selected($animation, 'slide'); ?> value="slide">Slide</option>
						<option <?php selected($animation, 'fade'); ?> value="fade">Fade</option>
					</select>
					<p class="description">Selecteer de animatie die gebruikt wordt door de slideshow.</p>
				</td>
			</tr>
		<?php
	}

	/**
	 * Enqueue a special stylesheet for the slideshow taxonomy page
	 *
	 * @param  string  $hook
	 */
	public function enqueueStyles($hook)
	{
		if($hook == 'edit-tags.php' && $_GET['taxonomy'] == 'slideshow')
		{
			wp_register_style('slideshow-taxonomy-style', get_template_directory_uri() . '/assets/css/slideshow-taxonomy-style.css');
			wp_enqueue_style('slideshow-taxonomy-style');
		}
	}

}