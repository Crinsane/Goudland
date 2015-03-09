<?php header("Content-type: text/css; charset: utf-8");?>
<?php
	$options = get_option('theme-options');
	$themeColor = $options['theme-color'];
var_dump($themeColor);
	$color = new Mexitek\PHPColors\Color($themeColor);
?>

blockquote:before,
.widget.tag-cloud ul > li a:hover,
.widget.social-widget .social-icons .social-icon a:hover,
.blog-post .blog-post-date {
	background: #<?php echo $color->getHex();?>;
}

.widget.category-widget ul a:hover,
.widget.category-widget ul li:before,
.contact-details .social-media-list a:hover,
.search-result-heading,
.blog-post .blog-post-header .blog-title a:hover,
.blog-single-page .blog-tags a:hover {
	color: #<?php echo $color->getHex();?>;
}

.widget.testimonial-widget .carousel-indicators .active {
	background-color: #<?php echo $color->getHex();?>;
}

.navbar-nav > li > .dropdown-menu,
.dropdown-submenu > .dropdown-menu {
	border-top: 2px solid #<?php echo $color->getHex();?>;
}

.read-more-list li:before {
	color: #<?php echo $color->getHex();?>;
	border: 2px solid #<?php echo $color->getHex();?>;
}

.blog-share .list-inline li a:hover {
	border: 1px solid #<?php echo $color->getHex();?>;
	background: #<?php echo $color->getHex();?>;
}

.btn-info {
	background-color: #<?php echo $color->getHex();?>;
	border-color: #<?php echo $color->darken(10);?>;
}

.btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open > .dropdown-toggle.btn-info {
	background-color: #<?php echo $color->darken(10);?>;
	border-color: #<?php echo $color->darken(12);?>;
}

a {
	color: #<?php echo $color->getHex();?>;
}

.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
	color: #<?php echo $color->getHex();?>;
}

.bg-info {
	background-color: #<?php echo $color->getHex();?>;
}

.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
	background-color: #<?php echo $color->getHex();?>;
}

.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
	background-color: #<?php echo $color->getHex();?>;
}

.text-info {
	color: #<?php echo $color->getHex();?>;
}

a:hover, a:focus {
	color: #<?php echo $color->darken(15);?>;
}

<?php $rgb = list($r, $g, $b) = sscanf($color->getHex(), "%02x%02x%02x");?>

.footer-widget.recent-posts-widget .media a.pull-left:after {
	background: none repeat scroll 0 0 rgba(<?php echo $r;?>, <?php echo $g;?>, <?php echo $b;?>, 0.5);
}

.btn-primary {
	background-color: #<?php echo $color->darken(10);?>;
	border-color: #<?php echo $color->darken(12);?>;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
	background-color: #<?php echo $color->darken(20);?>;
	border-color: #<?php echo $color->darken(14);?>;
}

.widget.price-filter-widget .slider .slider-track .slider-selection {
	background-color: #<?php echo $color->getHex();?>;
}

.product-details .product-price,
.products-container .product .product-price {
	color: #<?php echo $color->getHex();?> !important;
}

.product-list-item .panel-footer:hover a .fa {
	color: #<?php echo $color->getHex();?>;
}

.product-list-item .product-list-content .product-list-header .product-badge {
	background-color: #<?php echo $color->getHex();?>;
}

.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
	background-color: #<?php echo $color->darken(1);?>;
	border-color: #<?php echo $color->getHex();?>;
}

.product.grid .panel-footer:hover .fa {
	color: #<?php echo $color->getHex();?>;
}

.product-information .nav-tabs > .active > a,
.product-information .nav-tabs > .active > a:hover,
.product-information .nav-tabs > .active > a:focus {
	box-shadow: 0 -4px 0 0 #<?php echo $color->getHex();?>;
}

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
	color: #<?php echo $color->getHex();?>;
}

.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
	color: #<?php echo $color->getHex();?>;
}

.navbar-nav .dropdown-submenu > .dropdown-menu {
	border-top: 2px solid #<?php echo $color->getHex();?>;
}