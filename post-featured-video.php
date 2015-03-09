<?php
	$videoType = get_post_meta(get_the_ID(), 'featured_video_type', true);
	$videoId = get_post_meta(get_the_ID(), 'featured_video', true);

	if($videoType == 'vimeo') :
?>
	<iframe src="https://player.vimeo.com/video/<?php echo $videoId;?>?title=0&amp;byline=0&amp;portrait=0&amp;color=<?php echo str_replace('#', '', get_theme_mod('theme_color'));?>" width="798" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
<?php elseif($videoType == 'youtube') :?>
	<iframe width="798" height="449" src="https://www.youtube.com/embed/<?php echo $videoId;?>?rel=0" frameborder="0" allowfullscreen></iframe>
<?php endif;?>