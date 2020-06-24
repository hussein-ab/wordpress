<?php

/*
 Plugin Name: Widget Plugin
Plugin URI:
Author Name: any name
Author URI: https://mysite.com
Version: 1.7.2
 *
 */



class Widget extends WP_Widget {

    function simplewidget(){

    }

    function widget($args,$instance){
        var_dump($instance);// user interface
        extract($args, EXTR_SKIP);                 //EXTR_SKIP Keep exicting values
        $title =($instance['title'])? $instance['title']: "Simple title";
        $message =($instance['body'])? $instance['body']: "simple message";
        ?>

        <?php echo $before_widget; ?>
        <?php echo $before_title . $title. $after_title ?>
        <?php echo $body ?>



        <?php

    }

    function form(){

    }

}