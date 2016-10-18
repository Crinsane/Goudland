<?php get_header();?>

<?php get_template_part('page-template', 'header');?>

    <div class="site-page shop-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-3">
				    <?php get_sidebar('page');?>
    			</div>
    			<div class="col-sm-9">
    				<div class="row">
<!--    					<div class="col-md-12">-->
<!--						    --><?php //get_template_part('product', 'overview-header');?>
<!--    					</div>-->
<!---->
<!--    					<div class="col-md-12">-->
<!--	    					<hr class="products-navigation-divider">-->
<!--    					</div>-->

    					<div class="col-md-12">
						    <div class="row products-container">
						        <?php get_template_part('machine', 'loop');?>
						    </div>
    					</div>

    					<div class="col-md-12">
						    <?php get_template_part('machine', 'pagination');?>
    					</div>
    				</div>
    			</div>
			</div>
		</div>
	</div>

<?php get_footer();?>