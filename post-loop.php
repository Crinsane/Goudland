<?php if(have_posts()) : while(have_posts()) : the_post();?>

	<div class="row blog-post">
		<div class="col-md-12 blog-post-slider-image">
			<?php if(get_post_format() == 'image') :?>
				<?php get_template_part('post', 'featured-image');?>
			<?php elseif(get_post_format() == 'gallery') :?>
				<?php get_template_part('post', 'featured-slider');?>
			<?php elseif(get_post_format() == 'video') :?>
				<?php get_template_part('post', 'featured-video');?>
			<?php endif;?>
		</div>
		<div class="col-sm-2">
			<div class="blog-post-date">
				<span><?php the_time('j');?></span>
				<?php the_time('M Y');?>
			</div>
			<!--<div class="blog-post-type">
				<?php if(get_post_format() == 'image') :?>
					<i class="fa fa-file-image-o"></i>
				<?php elseif(get_post_format() == 'gallery') :?>
					<i class="fa fa-picture-o"></i>
				<?php elseif(get_post_format() == 'video') :?>
					<i class="fa fa-video-camera"></i>
				<?php elseif(get_post_format() == 'audio') :?>
					<i class="fa fa-volume-up"></i>
				<?php else :?>
					<i class="fa fa-file-text-o"></i>
				<?php endif;?>
			</div>-->
		</div>
		<div class="col-sm-10 blog-post-content">
			<div class="blog-post-header">
				<h3 class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<div class="col-sm-12 blog-meta">
					<div class="row">
						<div class="col-sm-3"><i class="fa fa-pencil-square-o fa-flip-horizontal"></i> asfasdfsadDoor <?php the_author();?></div>
						<div class="col-sm-3"><i class="fa fa-comment-o"></i> <a href="<?php comments_link();?>"><?php comments_number('0 reacties', '1 reactie', '% reacties');?></a></div>
						<div class="col-sm-6"><i class="fa fa-tag fa-flip-horizontal"></i> <?php the_category(', ');?></div>
					</div>
				</div>
			</div>
			<div class="blog-preview">
				<?php the_excerpt();?>
			</div>
		</div>
	</div>

<?php endwhile; else: ?>

<?php endif;?>