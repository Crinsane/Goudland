<?php namespace Gloudemans\Theme\Widgets;

use WP_Widget;

class Category_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$params = [
			'name' => __('Categories'),
			'classname' => 'category-widget',
			'description' => 'Een lijst met categorieën.'
		];

		parent::__construct('Category_Widget', '', $params);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param  array  $args
	 * @param  array  $instance
	 * @return void
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];

		?>
			<ul>
				<?php wp_list_categories(['show_count' => 1, 'title_li' => '', 'taxonomy' => $instance['taxonomy']]);?>
			</ul>
		<?php

		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param  array  $instance
	 * @return void
	 */
	public function form($instance)
	{
		$title = $this->getTitle($instance);
		$taxonomy = $this->getTaxonomy($instance);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>:</label>
			<input
				type="text"
				class="widefat"
				id="<?php echo $this->get_field_id('title');?>"
				name="<?php echo $this->get_field_name('title');?>"
				value="<?php echo $title;?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('taxonomy');?>"><?php _e('Taxonomy:') ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('taxonomy');?>" name="<?php echo $this->get_field_name('taxonomy');?>">
				<?php foreach(get_taxonomies() as $taxo) :
					$tax = get_taxonomy($taxo);
					if ( !$tax->show_tagcloud || empty($tax->labels->name) )
						continue;
					?>
					<option value="<?php echo esc_attr($taxo) ?>" <?php selected($taxo, $taxonomy) ?>><?php echo $tax->labels->name; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
	<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param  array  $new_instance
	 * @param  array  $old_instance
	 * @return array
	 */
	public function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	/**
	 * Get the title
	 *
	 * @param $instance
	 * @return string|void
	 */
	protected function getTitle($instance)
	{
		if(isset($instance['title']))
			return esc_attr($instance['title']);

		return '';
	}

	/**
	 * Get the taxonomy
	 *
	 * @param $instance
	 * @return string
	 */
	protected function getTaxonomy($instance)
	{
		if( ! empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']))
			return $instance['taxonomy'];

		return 'category';
	}

}