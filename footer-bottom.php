<div class="site-bottom-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-left">
				Copyright &copy; <?php echo date('Y');?> - Webdevelopment <a href="http://robgloudemans.nl">RobGloudemans Webdevelopment</a>
			</div>
			<div class="col-md-6 text-right">
				<?php
					wp_nav_menu([
						'menu'            => 'footer-menu',
						'container'       => '',
						'echo'            => true,
						'items_wrap'      => '<ul id="%1$s" class="list-inline bottom-footer-nav %2$s">%3$s</ul>'
					]);
				?>
			</div>
		</div>
	</div>
</div>