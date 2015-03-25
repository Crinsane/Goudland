<?php namespace Gloudemans\Testimonials;

class TestimonialSubtitle {

	public function __construct()
	{
		add_action('edit_form_after_title', [$this, 'addSubtitleField']);
		add_action('save_post', [$this, 'savePost']);
		add_action('admin_enqueue_scripts', [$this, 'enqueueStyles']);
	}

	public function addSubtitleField()
	{
		global $post;

		$subtitle = get_post_meta($post->ID, 'subtitle', true);

		if($post->post_type == 'testimonial') :?>
			<div id="subtitlediv">
				<div id="subtitlewrap">
					<label class="screen-reader-text" id="subtitle-prompt-text" for="subtitle">Subtitel hier invoeren</label>
					<input type="text" name="subtitle" size="30" value="<?php echo $subtitle;?>" id="subtitle" autocomplete="off" placeholder="Subtitel hier invoeren">
				</div>
			</div>
		<?php
		endif;
	}

	public function savePost($post_id)
	{
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

		if(isset($_POST['subtitle']))
		{
			update_post_meta($post_id, 'subtitle', $_POST['subtitle']);
		}
	}

	/**
	 * Enqueue a special stylesheet
	 *
	 * @param  string  $hook
	 */
	public function enqueueStyles($hook)
	{
		if($hook == 'post.php' && get_post_type($_GET['post']) == 'testimonial')
		{
			wp_register_style('testimonial_subtitle_style', get_template_directory_uri() . '/assets/css/testimonial-subtitle-style.css', false, '1.0.0');
			wp_enqueue_style('testimonial_subtitle_style');
		}
	}

}