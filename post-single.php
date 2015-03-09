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
		<div class="col-sm-12 blog-post-content">
			<div class="blog-post-header">
				<h3 class="blog-title"><?php the_title();?></h3>
				<div class="col-sm-12 blog-meta">
					<div class="row">
						<div class="col-sm-2 blog-author"><i class="fa fa-pencil-square-o fa-flip-horizontal"></i> Door <?php the_author();?></div>
						<div class="col-sm-3 blog-date"><i class="fa fa-calendar"></i> <?php the_time('j F Y');?></div>
						<div class="col-sm-2 blog-comment-count"><i class="fa fa-comment-o"></i> <a href="<?php comments_link();?>"><?php comments_number('0 reacties', '1 reactie', '% reacties');?></a></div>
						<div class="col-sm-5 blog-categories"><i class="fa fa-tag fa-flip-horizontal"></i> <?php the_category(', ');?></div>
					</div>
				</div>
			</div>
			<div class="blog-content">
				<?php the_content();?>
			</div>
			<div class="blog-tags">
				<?php the_tags('<p class="text-info"><i class="fa fa-tags fa-flip-horizontal"></i> <span class="blog-tags-heading">Tags:</span> <span class="blog-tags-list">', ', ', '</span></p>');?>
			</div>
			<div class="blog-share">
				<h4>Deel bericht:</h4>
				<ul class="list-inline">
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
			<div class="blog-comments">
				<div class="blog-comments-header">
					<h3 class="pull-left"><?php comments_number('0 Reacties', '1 Reactie', '% Reacties');?></h3>
					<a href="<?php comments_link();?>" class="pull-right"><i class="fa fa-pencil-square"></i> Plaats nu een reactie</a>
				</div>
				<div class="blog-comment-form">
					<h3 class="blog-comment-form-header">Laat een reactie achter</h3>
					<a name="comments"></a>
					<form class="row">
						<div class="col-md-5">
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="name" class="form-control comment-name" placeholder="Uw Naam">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="email" name="email" class="form-control comment-email" placeholder="Uw Email">
									<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="subject" class="form-control comment-subject" placeholder="Onderwerp">
									<span class="input-group-addon"><i class="fa fa-comments-o"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">
								<textarea name="message" class="form-control comment-message"></textarea>
							</div>
							<button type="submit" class="btn btn-info pull-right comment-submit">Plaats Reactie</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; else: ?>

<?php endif;?>