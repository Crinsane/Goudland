<div class="social-media-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
					$socialMedia = [
						'facebook' => 'facebook',
						'twitter' => 'twitter',
						'pinterest' => 'pinterest',
						'google' => 'google',
						'tumblr' => 'tumblr',
						'flickr' => 'flickr',
						'instagram' => 'instagram',
						'github' => 'github',
						'bitbucket' => 'bitbucket',
						'vimeo' => 'vimeo-square',
						'youtube' => 'youtube'
					];

					$options = get_option('options_social_media');
				?>
				<ul class="list-inline social-media-list">
					<?php foreach($socialMedia as $type => $icon) :?>
						<li>
							<a href="<?php echo $options[$type];?>"><i class="fa fa-<?php echo $icon;?>"></i></a>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>
</div>