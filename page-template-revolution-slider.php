<?php
    $frontPageOptions = get_option('frontpage-options');
    $slug = $frontPageOptions['slideshow-slug'];

    putRevSlider($slug);
?>