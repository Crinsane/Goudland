<h3 class="search-result-heading"><?php global $wp_query; echo $wp_query->found_posts;?> resultaten gevonden voor zoekterm "<span class="search-term"><?php the_search_query();?></span>"</h3>

<div class="search-results">
	<?php if(have_posts()) : while(have_posts()) : the_post();?>
		<div class="search-result">
			<div class="search-result-header">
				<h3><?php the_title();?></h3>
				<h5>Door <?php the_author();?> <span>|</span> <?php the_time('j F Y');?></h5>
			</div>
			<div class="search-result-preview">
				<?php the_excerpt();?>
			</div>
		</div>
	<?php endwhile; else :?>
		<h4>Helaas zijn er geen zoekresultaten. Probeer een andere zoekterm.</h4>
	<?php endif;?>
</div>