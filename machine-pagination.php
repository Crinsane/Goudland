<?php
$machineLoop = \Gloudemans\Machines\MachinesLoop::getQuery();

$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

$big = 999999999; // need an unlikely integer

$pagination = paginate_links([
	'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	'format' => '?paged=%#%',
	'current' => max(1, $paged),
	'total' => $machineLoop->max_num_pages,
	'type' => 'array',
	'prev_text' => '<i class="fa fa-chevron-left"></i>',
	'next_text' => '<i class="fa fa-chevron-right"></i>',
]);
?>

<ul class="pagination pull-right">
	<?php if($pagination) :?>
		<?php foreach($pagination as $page) :?>
			<li <?php echo strstr($page, 'current') ? 'class="active"' : '';?>><?php echo $page;?></li>
		<?php endforeach;?>
	<?php endif;?>
</ul>