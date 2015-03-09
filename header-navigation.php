<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url();?>">
				<img src="<?php echo get_theme_mod('site_logo');?>" alt="<?php bloginfo('name');?>">
			</a>
		</div>
		<div class="collapse navbar-collapse">
			<?php
				wp_nav_menu([
					'menu'            => 'primary-menu',
					'container'       => '',
					'echo'            => true,
					'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>',
					'walker'          => new Custom_Walker_Nav_Menu()
				]);
			?>
		</div>
	</div>
</div>