<?php
/*
Template Name: Team pagina
*/
?>

<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

	<div class="site-page contact-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="panel panel-default">
						<div>
							<?php get_sidebar('page');?>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-sm-12">
							<?php if(have_posts()) : while(have_posts()) : the_post();?>
								<?php the_content();?>
							<?php endwhile; else :?>

							<?php endif;?>
						</div>
						<?php
							$term = get_term_by('slug', 'management', 'department');
						?>
						<div class="col-sm-10">
							<div class="page-header">
								<h4><strong><?php echo $term->name;?></strong></h4>
								<p style="width: 500px;"><?php echo $term->description;?></p>
							</div>

							<?php
								$employees = new WP_Query([
									'post_type' => ['employee'],
									'tax_query' => [[
										'taxonomy' => 'department',
										'field'    => 'slug',
										'terms'    => 'management',
									]],
									'orderby' => 'menu_order',
									'order'   => 'ASC',
								]);
								if($employees->have_posts()) : while($employees->have_posts()) : $employees->the_post();
							?>
									<address>
										<strong><?php the_title();?></strong><br>
										<?php
											$function = get_post_meta(get_the_ID(), 'function', true);
											if($function) :
										?>
											<small><?php echo $function;?></small><br>
										<?php endif;?>
										<?php
										$phone = get_post_meta(get_the_ID(), 'phone', true);
										if($phone) :
											?>
											<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-phone"></i></div> <?php echo $phone;?><br>
										<?php endif;?>
										<?php
										$mobile = get_post_meta(get_the_ID(), 'mobile', true);
										if($mobile) :
											?>
											<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-mobile-phone"></i></div> <?php echo $mobile;?><br>
										<?php endif;?>
										<?php
										$email = get_post_meta(get_the_ID(), 'email', true);
										if($email) :
											?>
											<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-envelope-o"></i></div> <?php echo $email;?><br>
										<?php endif;?>
									</address>
							<?php endwhile; endif; wp_reset_postdata();?>
						</div>

						<?php
						$term = get_term_by('slug', 'sales', 'department');
						?>
						<div class="col-sm-10">
							<div class="page-header">
								<h4><strong><?php echo $term->name;?></strong></h4>
								<p style="width: 500px;"><?php echo $term->description;?></p>
							</div>

							<?php
							$employees = new WP_Query([
								'post_type' => ['employee'],
								'tax_query' => [[
									'taxonomy' => 'department',
									'field'    => 'slug',
									'terms'    => 'sales',
								]],
								'orderby' => 'menu_order',
								'order'   => 'ASC',
							]);
							if($employees->have_posts()) : while($employees->have_posts()) : $employees->the_post();
								?>
								<address>
									<strong><?php the_title();?></strong><br>
									<?php
									$function = get_post_meta(get_the_ID(), 'function', true);
									if($function) :
										?>
										<small><?php echo $function;?></small><br>
									<?php endif;?>
									<?php
									$phone = get_post_meta(get_the_ID(), 'phone', true);
									if($phone) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-phone"></i></div> <?php echo $phone;?><br>
									<?php endif;?>
									<?php
									$mobile = get_post_meta(get_the_ID(), 'mobile', true);
									if($mobile) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-mobile-phone"></i></div> <?php echo $mobile;?><br>
									<?php endif;?>
									<?php
									$email = get_post_meta(get_the_ID(), 'email', true);
									if($email) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-envelope-o"></i></div> <?php echo $email;?><br>
									<?php endif;?>
								</address>
							<?php endwhile; endif; wp_reset_postdata();?>
						</div>

						<?php
						$term = get_term_by('slug', 'warehouse', 'department');
						?>
						<div class="col-sm-10">
							<div class="page-header">
								<h4><strong><?php echo $term->name;?></strong></h4>
								<p style="width: 500px;"><?php echo $term->description;?></p>
							</div>

							<?php
							$employees = new WP_Query([
								'post_type' => ['employee'],
								'tax_query' => [[
									'taxonomy' => 'department',
									'field'    => 'slug',
									'terms'    => 'warehouse',
								]],
								'orderby' => 'menu_order',
								'order'   => 'ASC',
							]);
							if($employees->have_posts()) : while($employees->have_posts()) : $employees->the_post();
								?>
								<address>
									<strong><?php the_title();?></strong><br>
									<?php
									$function = get_post_meta(get_the_ID(), 'function', true);
									if($function) :
										?>
										<small><?php echo $function;?></small><br>
									<?php endif;?>
									<?php
									$phone = get_post_meta(get_the_ID(), 'phone', true);
									if($phone) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-phone"></i></div> <?php echo $phone;?><br>
									<?php endif;?>
									<?php
									$mobile = get_post_meta(get_the_ID(), 'mobile', true);
									if($mobile) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-mobile-phone"></i></div> <?php echo $mobile;?><br>
									<?php endif;?>
									<?php
									$email = get_post_meta(get_the_ID(), 'email', true);
									if($email) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-envelope-o"></i></div> <?php echo $email;?><br>
									<?php endif;?>
								</address>
							<?php endwhile; endif; wp_reset_postdata();?>
						</div>

						<?php
						$term = get_term_by('slug', 'workshop', 'department');
						?>
						<div class="col-sm-10">
							<div class="page-header">
								<h4><strong><?php echo $term->name;?></strong></h4>
								<p style="width: 500px;"><?php echo $term->description;?></p>
							</div>

							<?php
							$employees = new WP_Query([
								'post_type' => ['employee'],
								'tax_query' => [[
									'taxonomy' => 'department',
									'field'    => 'slug',
									'terms'    => 'workshop',
								]],
								'orderby' => 'menu_order',
								'order'   => 'ASC',
							]);
							if($employees->have_posts()) : while($employees->have_posts()) : $employees->the_post();
								?>
								<address>
									<strong><?php the_title();?></strong><br>
									<?php
									$function = get_post_meta(get_the_ID(), 'function', true);
									if($function) :
										?>
										<small><?php echo $function;?></small><br>
									<?php endif;?>
									<?php
									$phone = get_post_meta(get_the_ID(), 'phone', true);
									if($phone) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-phone"></i></div> <?php echo $phone;?><br>
									<?php endif;?>
									<?php
									$mobile = get_post_meta(get_the_ID(), 'mobile', true);
									if($mobile) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-mobile-phone"></i></div> <?php echo $mobile;?><br>
									<?php endif;?>
									<?php
									$email = get_post_meta(get_the_ID(), 'email', true);
									if($email) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-envelope-o"></i></div> <?php echo $email;?><br>
									<?php endif;?>
								</address>
							<?php endwhile; endif; wp_reset_postdata();?>
						</div>

						<?php
						$term = get_term_by('slug', 'administration', 'department');
						?>
						<div class="col-sm-10">
							<div class="page-header">
								<h4><strong><?php echo $term->name;?></strong></h4>
								<p style="width: 500px;"><?php echo $term->description;?></p>
							</div>

							<?php
							$employees = new WP_Query([
								'post_type' => ['employee'],
								'tax_query' => [[
									'taxonomy' => 'department',
									'field'    => 'slug',
									'terms'    => 'administration',
								]],
								'orderby' => 'menu_order',
								'order'   => 'ASC',
							]);
							if($employees->have_posts()) : while($employees->have_posts()) : $employees->the_post();
								?>
								<address>
									<strong><?php the_title();?></strong><br>
									<?php
									$function = get_post_meta(get_the_ID(), 'function', true);
									if($function) :
										?>
										<small><?php echo $function;?></small><br>
									<?php endif;?>
									<?php
									$phone = get_post_meta(get_the_ID(), 'phone', true);
									if($phone) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-phone"></i></div> <?php echo $phone;?><br>
									<?php endif;?>
									<?php
									$mobile = get_post_meta(get_the_ID(), 'mobile', true);
									if($mobile) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-mobile-phone"></i></div> <?php echo $mobile;?><br>
									<?php endif;?>
									<?php
									$email = get_post_meta(get_the_ID(), 'email', true);
									if($email) :
										?>
										<div style="width: 20px; text-align: center; display: inline-block;"><i class="fa fa-envelope-o"></i></div> <?php echo $email;?><br>
									<?php endif;?>
								</address>
							<?php endwhile; endif; wp_reset_postdata();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>