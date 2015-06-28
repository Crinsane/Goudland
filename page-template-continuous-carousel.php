<?php
    $frontPageOptions = get_option('frontpage-options');
    $shortcode = $frontPageOptions['carousel-shortcode'];
?>
<div class="continuous-carousel">
    <?php echo do_shortcode($shortcode);?>
</div>