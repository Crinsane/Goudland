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
				<div class="col-md-12">
					<ul class="list-inline">
						<li><i class="fa fa-envelope-o text-info"></i>&nbsp;&nbsp;&nbsp;johndoe@example.com</li>
						<li><i class="fa fa-phone text-info"></i>&nbsp;&nbsp;&nbsp;+31 6 12345678</li>
						<li><i class="fa fa-fax text-info"></i>&nbsp;&nbsp;&nbsp;+31 5 12345678</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php echo get_template_part('header', 'navigation');?>