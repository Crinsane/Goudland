<?php
$frontPageOptions = get_option('frontpage-options');
$slug = $frontPageOptions['slideshow-slug'];
$slideshow = new WP_Query([
	'post_type' => ['slide'],
	'tax_query' => [
		[
			'taxonomy' => 'slideshow',
			'field'    => 'slug',
			'terms'    => $slug,
		]
	]
]);
$term = get_term_by('slug', $slug, 'slideshow');
$interval = get_option('slideshow-' . $term->term_id . '-interval');
$animation = get_option('slideshow-' . $term->term_id . '-animation') == 'fade' ? 'carousel-fade' : '';
$count = $slideshow->found_posts;
$first = 1;

if($slideshow->have_posts()) :
?>

<div class="main-slider">
	<div id="header-carousel" class="carousel slide <?php echo $animation;?>" data-ride="carousel" data-interval="<?php echo $interval;?>">
		<ol class="carousel-indicators">
			<?php for($j = 0; $j < $count; $j++) :?>
				<li data-target="#header-carousel" data-slide-to="<?php echo $j;?>" <?php echo $j == 0 ? 'class="active"' : '';?>></li>
			<?php endfor;?>
		</ol>

		<div class="carousel-inner">
			<?php while($slideshow->have_posts()) : $slideshow->the_post();?>
				<div class="item <?php echo $first++ == 1 ? 'active' : '';?>">
					<?php the_post_thumbnail('front-page-slideshow', ['alt' => get_the_title()]);?>
				</div>
			<?php endwhile;?>
<!--			<div class="item active">-->
<!--				<img src="http://lorempixel.com/1440/500/city/1" alt="Lorem ipsum dolor">-->
<!--				<div class="carousel-caption">-->
<!--					<h1>Lorem ipsum dolor</h1>-->
<!--					<h3>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>-->
<!--					<div class="row">-->
<!--						<div class="col-sm-5 col-sm-offset-1">-->
<!--							<button class="btn btn-info btn-block">Primary Button</button>-->
<!--						</div>-->
<!--						<div class="col-sm-5">-->
<!--							<button class="btn btn-default btn-block">Default Button</button>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="item">-->
<!--				<img src="http://lorempixel.com/1440/500/city/3" alt="Lorem ipsum dolor">-->
<!--				<div class="carousel-caption">-->
<!--					<h1>Lorem ipsum dolor</h1>-->
<!--					<h3>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="item">-->
<!--				<img src="http://lorempixel.com/1440/500/city/5" alt="Lorem ipsum dolor">-->
<!--				<div class="carousel-caption">-->
<!--					<h1>Lorem ipsum dolor</h1>-->
<!--					<h3>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>-->
<!--				</div>-->
<!--			</div>-->
		</div>

		<a class="left carousel-control" href="#header-carousel" role="button" data-slide="prev">
			<i class="fa fa-chevron-left"></i>
		</a>
		<a class="right carousel-control" href="#header-carousel" role="button" data-slide="next">
			<i class="fa fa-chevron-right"></i>
		</a>
	</div>
</div>

<?php endif; wp_reset_postdata();?>