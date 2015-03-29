<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Design</title>
	<?php wp_head();?>
</head>
<body>

	<div class="site-top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php $companyOptions = get_option('company-options');?>
					<ul class="list-inline">
						<?php if($companyOptions['mail']) :?>
							<li><i class="fa fa-envelope-o text-info"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:<?php echo $companyOptions['mail'];?>"><?php echo $companyOptions['mail'];?></a></li>
						<?php endif;?>
						<?php if($companyOptions['phone']) :?>
							<li class="text-info"><i class="fa fa-phone text-info"></i>&nbsp;&nbsp;&nbsp;<?php echo $companyOptions['phone'];?></li>
						<?php endif;?>
						<?php if($companyOptions['fax']) :?>
							<li class="text-info"><i class="fa fa-fax text-info"></i>&nbsp;&nbsp;&nbsp;<?php echo $companyOptions['fax'];?></li>
						<?php endif;?>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="list-inline site-top-header-icons pull-right">
						<?php
							$icons = \Gloudemans\Socialmedia\Icon::getAll();
							$socialmediaOptions = get_option('socialmedia-options');
							foreach($icons as $type => $icon) :
								if($socialmediaOptions[$type]) :
						?>
								<li>
									<a href="<?php echo $socialmediaOptions[$type];?>"><i class="fa fa-<?php echo $icon;?>"></i></a>
								</li>
							<?php endif;?>
						<?php endforeach;?>
						<li><a href="{{ get_bloginfo('rss2_url') }}"><i class="fa fa-rss"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php echo get_template_part('header', 'navigation');?>