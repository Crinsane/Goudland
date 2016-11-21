<?php if(have_posts()) : while(have_posts()) : the_post();?>

	<?php
		$images = get_post_meta(get_the_ID(), 'images', true);
	?>

	<div class="col-sm-7">
		<div class="row">
			<div class="col-sm-12">
                <h2></h2>
				<div style="height: 320px; width: 464px; background-color: white;">
					<?php if (has_post_thumbnail()) :?>
						<span style="display: inline-block; height: 100%; vertical-align: middle;"></span><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title()?>" class="product-image" style="max-width: 464px; max-height: 320px; vertical-align: middle;">
					<?php endif;?>
				</div>
			</div>
			<?php if (count($images) > 1) :?>
				<div class="col-sm-4" style="margin-top: -30px;">
					<span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
					<img class="product-images-thumbnail" src="<?php echo $images[1];?>" style="max-width: 135px; max-height: 120px;" alt="Lorem ipsum dolor">
				</div>
			<?php endif;?>
			<?php if (count($images) > 2) :?>
				<div class="col-sm-4" style="margin-top: -30px;">
					<span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
					<img class="product-images-thumbnail" src="<?php echo $images[2];?>" style="max-width: 135px; max-height: 120px;" alt="Lorem ipsum dolor">
				</div>
			<?php endif;?>
			<?php if (count($images) > 3) :?>
				<div class="col-sm-4" style="margin-top: -30px;">
					<span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
					<img class="product-images-thumbnail" src="<?php echo $images[3];?>" style="max-width: 135px; max-height: 120px;" alt="Lorem ipsum dolor">
				</div>
			<?php endif;?>
		</div>
	</div>
	<div class="col-sm-5">
		<h3 class="product-title" style="font-size: 24px;"><?php the_title();?></h3>
		<div class="product-description">
			<p><?php the_content();?></p>
		</div>
		<div class="product-meta">
			<ul class="list-unstyled">
				<li>Merk: <?php the_terms(get_the_ID(), 'brand');?></li>
                <li>Bouwjaar: <?php echo get_post_meta(get_the_ID(), 'buildyear', true);?></li>
                <li>
                    <?php $price = get_post_meta(get_the_ID(), 'price', true);?>
                    Prijstype: <?php echo $price;?>
                </li>
                <li>Algemene staat: <?php echo ucfirst(get_post_meta(get_the_ID(), 'condition', true));?></li>
            </ul>
		</div>
	</div>

<?php endwhile; else: ?>

<?php endif;?>