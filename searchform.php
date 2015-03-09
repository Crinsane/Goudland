<?php if(is_404()) :?>
	<div class="row">
		<div class="col-sm-11">
<?php endif;?>
	<form method="get" action="<?php echo esc_url(home_url('/'));?>" class="search-form">
		<div class="input-group">
			<input type="hidden" value="post" name="post_type" id="post_type">
			<input type="text" name="s" placeholder="Zoeken" class="form-control" value="<?php echo get_search_query();?>">
			<span class="input-group-btn">
				<button type="submit" class="btn <?php echo is_404() ? 'btn-info' : 'btn-default';?>">
					<i class="fa fa-search <?php echo is_404() ? 'fa-2x' : '';?>"></i>
				</button>
			</span>
		</div>
	</form>
<?php if(is_404()) :?>
		</div>
	</div>
<?php endif;?>