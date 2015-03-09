<?php if(have_posts()) : while(have_posts()) : the_post();?>

	<div class="col-sm-7">
		<div class="row">
			<div class="col-sm-12">
				<?php the_post_thumbnail('product-single', ['alt' => get_the_title(), 'class' => 'product-image']);?>
			</div>
<!--			<div class="col-sm-4">-->
<!--				<img class="product-images-thumbnail" src="http://lorempixel.com/135/120/city/2" alt="Lorem ipsum dolor">-->
<!--			</div>-->
<!--			<div class="col-sm-4">-->
<!--				<img class="product-images-thumbnail" src="http://lorempixel.com/135/120/city/3" alt="Lorem ipsum dolor">-->
<!--			</div>-->
<!--			<div class="col-sm-4">-->
<!--				<img class="product-images-thumbnail" src="http://lorempixel.com/135/120/city/4" alt="Lorem ipsum dolor">-->
<!--			</div>-->
		</div>
	</div>
	<div class="col-sm-5">
		<h4 class="product-title"><?php the_title();?> <small><?php the_terms(get_the_ID(), 'product-category');?></small></h4>
		<h3 class="product-price">&euro; <?php echo number_format(get_post_meta(get_the_ID(), 'product-price', true), 2, ',', '.');?></h3>
		<div class="product-description">
			<p><?php the_excerpt();?></p>
		</div>
<!--		<div class="product-qty form-group">-->
<!--			<div class="input-group">-->
<!--				<span class="input-group-btn">-->
<!--					<button class="btn btn-default" data-action="subtract" type="button"><i class="fa fa-minus"></i></button>-->
<!--				</span>-->
<!--				<input type="text" class="form-control qty" value="1">-->
<!--				<span class="input-group-btn">-->
<!--					<button class="btn btn-default" data-action="add" type="button"><i class="fa fa-plus"></i></button>-->
<!--				</span>-->
<!--			</div>-->
<!--		</div>-->
<!--		<div class="product-buttons">-->
<!--			<a href="#" class="btn btn-info"><i class="fa fa-shopping-cart"></i> Toevoegen</a>-->
<!--			<a href="#" class="btn btn-default"><i class="fa fa-heart"></i> Wensenlijst</a>-->
<!--		</div>-->
		<div class="product-meta">
			<ul class="list-unstyled">
				<li>Product categorie: <?php the_terms(get_the_ID(), 'product-category');?></li>
				<li>Product tags: <?php the_terms(get_the_ID(), 'product-tags');?>
			</ul>
		</div>
	</div>
	<div class="col-md-12 product-information">
		<?php
			$specifications = get_post_meta(get_the_ID(), 'product-specifications', true);
			$slideshowSlug = get_post_meta(get_the_ID(), 'product-slideshow', true);
		?>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#information" role="tab" data-toggle="tab">Meer informatie</a></li>
			<?php if( ! empty($specifications)) :?>
				<li><a href="#specifications" role="tab" data-toggle="tab">Specificaties</a></li>
			<?php endif;?>
			<?php if( ! empty($slideshowSlug)) :?>
				<li><a href="#images" role="tab" data-toggle="tab">Afbeeldingen</a></li>
			<?php endif;?>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="information">
				<?php the_content();?>
			</div>
			<?php if( ! empty($specifications)) :?>
				<div class="tab-pane" id="specifications">
					<p><?php echo $specifications;?></p>
				</div>
			<?php endif;?>
			<?php if( ! empty($slideshowSlug)) :?>
				<div class="tab-pane" id="images">
					<div class="row">
						<div class="col-sm-12 product-slider">
							<?php get_template_part('product', 'featured-slider');?>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>

<?php endwhile; else: ?>

<?php endif;?>