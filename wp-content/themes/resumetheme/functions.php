<?php

function resumetheme_resourses(){
    wp_enqueue_style('style',get_stylesheet_uri());
}

/*
function bloginfo( $show = '' ) {
    echo get_bloginfo( $show, 'display' );
}
*/


add_action('wp_enqueue_scripts','resumetheme_resourses')

?>