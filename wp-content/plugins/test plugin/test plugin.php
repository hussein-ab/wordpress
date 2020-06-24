<?php


/*

Plugin Name:  plugin
Plugin URI: http://mysite.com/plugin
Description : etc
version:1.0.0

Author: name
Author URI: http://mysite.com
Liscense: GPLv2
Text Domain: test-Plugin


*/

if (!defined('ABSPATH')){
    die;

}

//defined('ABSPATH') or die();

//if(!function_exists('add_action')){
//    die;
//}

class TestPlugin{
    function __construct()
    {
        add_action('init',array($this,'custom_post'));
    }

    function activate(){
       // $this->custom_posts();
        flush_rewrite_rules();
    }
    function deactivate(){
        echo "123";
    }
    function custom_post(){

    }
}
if(class_exists('TestPlugin'))
    $ob=new TestPlugin();
add_shortcode('qwe',function(){
    return "<div style='background: green'>HIII</div>";
});

register_activation_hook(__FILE__,array($ob,'activate'));

register_deactivation_hook(__FILE__,array($ob,'dectivate'));

register_uninstall_hook(__FILE__,array($ob,'uninstall'));