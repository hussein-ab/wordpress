<?php

function resumetheme_resourses(){
    wp_enqueue_style('style',get_stylesheet_uri());
}

/*
function bloginfo( $show = '' ) {
    echo get_bloginfo( $show, 'display' );
}
*/

function widgetInit(){
    register_sidebar(array(
            'name'=>'Widget Sidbar',
            'id'=>'sidebar1',
    ));
}

function menu(){
    register_nav_menu("our_main_menu", "will be placed at the top");
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}



add_action('widgets_init','widgetInit');
add_action('wp_enqueue_scripts','resumetheme_resourses');

            //////////////////////////
add_action("after_setup_theme","menu");
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
            ///////////////////////////

?>