<?php

class Post_Meta_Boxes {

	/**
	 * Add meta boxes
	 */
	public function __construct()
	{
		add_action('add_meta_boxes', [$this, 'addVideoMetaBox']);
		add_action('add_meta_boxes', [$this, 'addSlideshowMetaBox']);
		add_action('save_post', [$this, 'saveMeta']);
	}

	/**
	 * Add the video meta boxes
	 */
	public function addVideoMetaBox()
	{
		add_meta_box('featured-video', 'Uitgelichte video', [$this, 'renderVideoMetaBox'], 'post', 'advanced', 'high');
	}

	/**
	 * Add the slideshow meta box
	 */
	public function addSlideshowMetaBox()
	{
		add_meta_box('featured-slideshow', 'Uitgelichte slideshow', [$this, 'renderSlideshowMetaBox'], 'post', 'advanced', 'high');
	}

	/**
	 * Render the video meta boxes
	 *
	 * @param $post
	 */
	public function renderVideoMetaBox($post)
	{
		$videoType = get_post_meta($post->ID, 'featured_video_type', true);
		$videoId = get_post_meta($post->ID, 'featured_video', true);

		$youtubeValue = $videoType == 'youtube' ? $videoId : '';
		$vimeoValue = $videoType == 'vimeo' ? $videoId : '';
		?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="featured_video_youtube">Youtube video ID</label></th>
						<td><input type="text" name="featured_video[youtube]" id="featured_video_youtube" value="<?php echo $youtubeValue;?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="featured_video_vimeo">Vimeo video ID</label></th>
						<td>
							<input type="text" name="featured_video[vimeo]" id="featured_video_vimeo" value="<?php echo $vimeoValue;?>" class="regular-text">
							<p class="description">Voer &eacute;&eacute;n van de twee velden in.</p>
						</td>
					</tr>
				</tbody>
			</table>
		<?php
	}

	/**
	 * Render the slideshow meta box
	 *
	 * @param $post
	 */
	public function renderSlideshowMetaBox($post)
	{
		$slideshow = get_post_meta($post->ID, 'featured_slider', true);

		?>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="featured_slider">Slideshow slug</label></th>
						<td>
							<input type="text" name="featured_slider" id="featured_slider" value="<?php echo $slideshow;?>" class="regular-text">
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

		if(isset($_POST['featured_video']))
		{
			$featuredVideo = $_POST['featured_video'];
			list($featuredVideoType, $featuredVideoId) = $this->getVideoIdAndType($featuredVideo);

			update_post_meta($post_id, 'featured_video_type', $featuredVideoType);
			update_post_meta($post_id, 'featured_video', $featuredVideoId);
		}

		if(isset($_POST['featured_slider']))
		{
			$featuredSlider = $_POST['featured_slider'];

			update_post_meta($post_id, 'featured_slider', $featuredSlider);
		}
	}

	/**
	 * Get the video id and type
	 *
	 * @param $featuredVideo
	 * @return array
	 */
	protected function getVideoIdAndType( $featuredVideo )
	{
		if( ! empty($featuredVideo['youtube']))
		{
			$featuredVideoType = 'youtube';
			$featuredVideoId = $featuredVideo['youtube'];
		}
		elseif( ! empty($featuredVideo['vimeo']))
		{
			$featuredVideoType = 'vimeo';
			$featuredVideoId = $featuredVideo['vimeo'];
		}
		else
		{
			$featuredVideoType = '';
			$featuredVideoId = '';
		}

		return [$featuredVideoType, $featuredVideoId];
	}

}