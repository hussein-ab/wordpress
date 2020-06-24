<?php
if (!function_exists('blackwell_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails. */	 
	function blackwell_setup() {
    add_theme_support( "custom-header");
    add_theme_support( "custom-background");
    /**
     * Post thumbnail support
     */
    
    add_theme_support('post-thumbnails', array('post', 'gallery_post'));
	add_image_size('post_thumbnail', 815, 410, true);
    /**
     * Automatic feed links support
     */
    add_theme_support('automatic-feed-links');	
	 /**
     * Page Title support
     */
	 add_theme_support( 'title-tag' );
	 /**
	 * Intialize language files 
	 */
	load_theme_textdomain('blackwell', get_template_directory() . '/languages');
    /**
     * Custom editor style initialize
     */
    add_editor_style();
	register_nav_menus(array(
		'home-menu' => HOME_MENU,
		'frontpage-menu' => FRONT_MENU
	));
}
add_action('after_setup_theme', 'blackwell_setup');
endif;
/**
 * Registering plugin notification class
 */
add_action('tgmpa_register', 'blackwell_plugins_notify');
$functions_path = get_template_directory() . '/functions/';
require_once($functions_path . 'plugin-activation.php');
require_once($functions_path . 'plugin-notify.php');
require_once ($functions_path . 'customizer.php');   
require_once ($functions_path . 'themes-page.php');

/**
 * Include preview demo
 */
require_once get_template_directory() . '/includes/features/feature-about-page.php';
/**
* Styles Enqueue
*/
function blackwell_add_stylesheet() {
	wp_enqueue_style('blackwell-style', get_stylesheet_uri());
    wp_enqueue_style('animate_css3', get_template_directory_uri() . "/css/animate.css", '', '', 'all');
	wp_enqueue_style('960_24_col_responsive', get_template_directory_uri() . "/css/960_24_col_responsive.css", '', '', 'all');
	wp_enqueue_style('font_awesome', get_template_directory_uri() . "/css/font-awesome.min.css", '', '', 'all');
}
add_action('wp_enqueue_scripts', 'blackwell_add_stylesheet');
/**
* jQuery Enqueue
*/
function blackwell_wp_enqueue_scripts() {
	wp_enqueue_script('blackwell-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'));
    wp_enqueue_script('blackwell-bigslide', get_template_directory_uri() . '/js/bigslide.js', array('jquery'));
	wp_enqueue_script('blackwell-singlePageNav', get_template_directory_uri() . '/js/jquery.singlePageNav.js', array('jquery'));
    wp_enqueue_script('blackwell-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
	wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900');
    if (is_singular() and get_site_option('thread_comments')) {
     wp_print_scripts('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'blackwell_wp_enqueue_scripts');

/*
* Redirect to about us page.
*/
if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php")
    wp_redirect('themes.php?page=blackwell-welcome');


/**
* Custom Jqueries Enqueue
*/
function blackwell_get_option($name) {
    $options = get_option('blackwell_options');
    if (isset($options[$name]))
        return $options[$name];
}
function blackwell_update_option($name, $value) {
    $options = get_option('blackwell_options');
    $options[$name] = $value;
    return update_option('blackwell_options', $options);
}
function blackwell_delete_option($name) {
    $options = get_option('blackwell_options');
    unset($options[$name]);
    return update_option('blackwell_options', $options);
}
// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function blackwell_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
}
add_filter('wp_page_menu', 'blackwell_add_menuclass');
//main nav
function blackwell_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'container_id' => 'menu', 'menu_class' => 'sf-menu', 'fallback_cb' => 'blackwell_nav_fallback'));
    else
        blackwell_nav_fallback();
}
function blackwell_nav_fallback() {
    ?>
	<div id="menu">
    <ul class="sf-menu">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>
	</div>
    <?php
}
function blackwell_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . esc_url(home_url('/')) . '">' . HOME_TEXT . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . esc_url(home_url('/')) . '">' . HOME_TEXT . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}
add_filter('wp_list_pages', 'blackwell_nav_menu_items');
//Frontpage nav
function blackwell_frontpage_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'container_id' => 'menu', 'menu_class' => 'sf-menu', 'fallback_cb' => 'blackwell_frontpage_nav_fallback'));
    else
        blackwell_frontpage_nav_fallback();
}
function blackwell_frontpage_nav_fallback() {
    ?>
	<div id="menu">
    <ul class="sf-menu">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>
	</div>
    <?php
}
/**
 * Function to call first uploaded image in functions file
 */
function blackwell_main_image() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
        print "<a href='$permalink'><img src='$first_img' class='postimg wp-post-image' alt='$the_title' /></a>";
    }
}
/**
 * Prints HTML with meta information for the current post 
 * (category, tags and permalink).
 * Attachment Page Design
 *
 */
function blackwell_posted_in() {
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function blackwell_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3><span class="line"></span>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '<div class="sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3><span class="line"></span>',
        'after_title' => '</h3>',
    ));
}
/** Register sidebars by running blackwell_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'blackwell_widgets_init');
/**
 *
 * Pagination
 *
 */
function blackwell_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}
/**
 *
 * Add Favicon
 *
 */
function blackwell_childtheme_favicon() {
    if (blackwell_get_option('blackwell_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . blackwell_get_option('blackwell_favicon') . '"/>' . "\n";
    } 
}
add_action('wp_head', 'blackwell_childtheme_favicon');
add_action('init', 'blackwell_migrate_option');
function blackwell_migrate_option() {
    if (get_option('blackwell_options') && !get_option('blackwell_option_migrate')) {
        $theme_option = array('blackwell_favicon', 'blackwell_topimage');
        $wp_upload_dir = wp_upload_dir();
        require ( ABSPATH . 'wp-admin/includes/image.php' );
        foreach ($theme_option as $option) {
            $option_value = blackwell_get_option($option);
            if ($option_value && $option_value != '') {
                $filetype = wp_check_filetype(basename($option_value), null);
                $image_name = preg_replace('/\.[^.]+$/', '', basename($option_value));
                $new_image_url = $wp_upload_dir['path'] . '/' . $image_name . '.' . $filetype['ext'];
                blackwell_import_file($new_image_url);
            }
        }
        update_option('blackwell_option_migrate', true);
    }
}
function blackwell_import_file($file, $post_id = 0, $import_date = 'file') {
    set_time_limit(120);
    // Initially, Base it on the -current- time.
    $time = current_time('mysql', 1);
//     Next, If it's post to base the upload off:
    $time = gmdate('Y-m-d H:i:s', @filemtime($file));
//     A writable uploads dir will pass this test. Again, there's no point overriding this one.
    if (!( ( $uploads = wp_upload_dir($time) ) && false === $uploads['error'] )) {
        return new WP_Error('upload_error', $uploads['error']);
    }
    $wp_filetype = wp_check_filetype($file, null);
    extract($wp_filetype);
    if ((!$type || !$ext ) && !current_user_can('unfiltered_upload')) {
        return new WP_Error('wrong_file_type', __('Sorry, this file type is not permitted for security reasons.', 'blackwell')); //A WP-core string..
    }
    $file_name = str_replace('\\', '/', $file);
    if (preg_match('|^' . preg_quote(str_replace('\\', '/', $uploads['basedir'])) . '(.*)$|i', $file_name, $mat)) {
        $filename = basename($file);
        $new_file = $file;
        $url = $uploads['baseurl'] . $mat[1];
        $attachment = get_posts(array('post_type' => 'attachment', 'meta_key' => '_wp_attached_file', 'meta_value' => ltrim($mat[1], '/')));
        if (!empty($attachment)) {
            return new WP_Error('file_exists', __('Sorry, That file already exists in the WordPress media library.', 'blackwell'));
        }
        //Ok, Its in the uploads folder, But NOT in WordPress's media library.
        if ('file' == $import_date) {
            $time = @filemtime($file);
            if (preg_match("|(\d+)/(\d+)|", $mat[1], $datemat)) { //So lets set the date of the import to the date folder its in, IF its in a date folder.
                $hour = $min = $sec = 0;
                $day = 1;
                $year = $datemat[1];
                $month = $datemat[2];
                // If the files datetime is set, and it's in the same region of upload directory, set the minute details to that too, else, override it.
                if ($time && date('Y-m', $time) == "$year-$month") {
                    list($hour, $min, $sec, $day) = explode(';', date('H;i;s;j', $time));
                }
                $time = mktime($hour, $min, $sec, $month, $day, $year);
            }
            $time = gmdate('Y-m-d H:i:s', $time);
            // A new time has been found! Get the new uploads folder:
            // A writable uploads dir will pass this test. Again, there's no point overriding this one.
            if (!( ( $uploads = wp_upload_dir($time) ) && false === $uploads['error'] ))
                return new WP_Error('upload_error', $uploads['error']);
            $url = $uploads['baseurl'] . $mat[1];
        }
    } else {
        $filename = wp_unique_filename($uploads['path'], basename($file));
        // copy the file to the uploads dir
        $new_file = $uploads['path'] . '/' . $filename;
        if (false === @copy($file, $new_file))
            return new WP_Error('upload_error', sprintf(__('The selected file could not be copied to %s.', 'blackwell'), $uploads['path']));
        // Set correct file permissions
        $stat = stat(dirname($new_file));
        $perms = $stat['mode'] & 0000666;
        @ chmod($new_file, $perms);
        // Compute the URL
        $url = $uploads['url'] . '/' . $filename;
        if ('file' == $import_date)
            $time = gmdate('Y-m-d H:i:s', @filemtime($file));
    }
    //Apply upload filters
    $return = apply_filters('wp_handle_upload', array('file' => $new_file, 'url' => $url, 'type' => $type));
    $new_file = $return['file'];
    $url = $return['url'];
    $type = $return['type'];
    $title = preg_replace('!\.[^.]+$!', '', basename($file));
    $content = '';

    if ($time) {
        $post_date_gmt = $time;
        $post_date = $time;
    } else {
        $post_date = current_time('mysql');
        $post_date_gmt = current_time('mysql', 1);
    }

    // Construct the attachment array
    $attachment = array(
        'post_mime_type' => $type,
        'guid' => $url,
        'post_parent' => $post_id,
        'post_title' => $title,
        'post_name' => $title,
        'post_content' => $content,
        'post_date' => $post_date,
        'post_date_gmt' => $post_date_gmt
    );
    $attachment = apply_filters('afs-import_details', $attachment, $file, $post_id, $import_date);
    //Win32 fix:
    $new_file = str_replace(strtolower(str_replace('\\', '/', $uploads['basedir'])), $uploads['basedir'], $new_file);
    // Save the data
    $id = wp_insert_attachment($attachment, $new_file, $post_id);
    if (!is_wp_error($id)) {
        $data = wp_generate_attachment_metadata($id, $new_file);
        wp_update_attachment_metadata($id, $data);
    }
    //update_post_meta( $id, '_wp_attached_file', $uploads['subdir'] . '/' . $filename );

    return $id;
}
require_once ($functions_path . 'define_template.php');

function blackwell_tracking_admin_notice() {
    global $current_user;
    $user_id = $current_user->ID;
    /* Check that the user hasn't already clicked to ignore the message */
    if (!get_user_meta($user_id, 'wp_email_tracking_ignore_notice')) {
        ?>
        <div class="updated um-admin-notice"><p><?php _e('Allow Blackwell theme to send you setup guide? Opt-in to our newsletter and we will immediately e-mail you a setup guide along with 20% discount which you can use to purchase any theme.', 'blackwell'); ?></p><p><a href="<?php echo get_template_directory_uri() . '/functions/smtp.php?wp_email_tracking=email_smtp_allow_tracking'; ?>" class="button button-primary"><?php _e('Allow Sending', 'blackwell'); ?></a>&nbsp;<a href="<?php echo get_template_directory_uri() . '/functions/smtp.php?wp_email_tracking=email_smtp_hide_tracking'; ?>" class="button-secondary"><?php _e('Do not allow', 'blackwell'); ?></a></p></div>
        <?php
    }
}

add_action('admin_notices', 'blackwell_tracking_admin_notice');
