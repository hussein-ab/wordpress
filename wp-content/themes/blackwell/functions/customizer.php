<?php
class blackwell_Customizer {
    public static function blackwell_Register($wp_customize) {
        self::blackwell_Sections($wp_customize);
        self::blackwell_Controls($wp_customize);
    }
    public static function blackwell_Sections($wp_customize) {
        /**
         * General Section
         */
        $wp_customize->add_section('general_setting_section', array(
            'title' => __('General Settings', 'blackwell'),
            'description' => __('Allows you to customize header logo, favicon, background etc settings for blackwell Theme.', 'blackwell'), //Descriptive tooltip
            'panel' => '',
            'priority' => '10',
            'capability' => 'edit_theme_options'
            )
        );
        /**
         * Home Page Top Feature Area
         */
        $wp_customize->add_section('home_top_feature_area', array(
            'title' => __('Top Feature Area', 'blackwell'),
            'description' => __('Allows you to setup Top feature area section for blackwell Theme.', 'blackwell'), //Descriptive tooltip
            'panel' => '',
            'priority' => '11',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_page_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'blackwell'),
            'description' => __('Allows you to setup home page feature area section for blackwell Theme.', 'blackwell'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));
        /**
         * Home Page Feature area setting
         */
        $wp_customize->add_section('home_page_feature_area_heading', array(
            'title' => __('Home Page Heading', 'blackwell'),
            'description' => __('Allows you to setup feature area section heading for blackwell Theme.', 'blackwell'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
             )
        );
        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_section1', array(
            'title' => __('First Feature Area', 'blackwell'),
            'description' => __('Allows you to setup first feature area section for blackwell Theme.', 'blackwell'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_section2', array(
            'title' => __('Second Feature Area', 'blackwell'),
            'description' => __('Allows you to setup second feature area section for blackwell Theme.', 'blackwell'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_section3', array(
            'title' => __('Third Feature Area', 'blackwell'),
            'description' => __('Allows you to setup third feature area section for blackwell Theme.', 'blackwell'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page Feature area setting
         */
        $wp_customize->add_section('home_page_blog_headings', array(
            'title' => __('Home Page Blog Heading', 'blackwell'),
            'description' => __('Allows you to setup Home Page Blog feature area section heading for blackwell Theme.', 'blackwell'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
             )
        );

        $wp_customize->add_section('social_icon_settings', array(
            'title' => __('Social Icons', 'blackwell'),
            'description' => __('Allows you to setup social site link for Blackwell Theme.', 'blackwell'),
            'panel' => '',
            'priority' => '14',
            'capability' => 'edit_theme_options'
                )
        );

   }
    public static function blackwell_Section_Content() {
        $section_content = array(
            'general_setting_section' => array(
                'blackwell_favicon',
                'blackwell_read_more_link'
            ),
            'home_top_feature_area' => array(
                'blackwell_topimage',
                'blackwell_top_imageheading',
                'blackwell_top_imagelink',
                'blackwell_top_image_desc'
            ),
            'home_page_feature_area_heading' => array(
                'blackwell_feature_heading',
                'blackwell_feature_desc'
            ),
            'home_feature_area_section1' => array(
                'blackwell_font_icon1',
                'blackwell_feature_head1',
                'blackwell_feature_link1',
                'blackwell_feature_desc1'
            ),
            'home_feature_area_section2' => array(
                'blackwell_font_icon2',
                'blackwell_feature_head2',
                'blackwell_feature_link2',
                'blackwell_feature_desc2'
            ),
            'home_feature_area_section3' => array(
                'blackwell_font_icon3',
                'blackwell_feature_head3',
                'blackwell_feature_link3',
                'blackwell_feature_desc3'
            ),
            'home_page_blog_headings' => array(
                'blackwell_blog_heading',
                'blackwell_blog_desc'
            ),
            'social_icon_settings' => array(
                'blackwell_facebook',
                'blackwell_twitter',
                'blackwell_yahoo',
                'blackwell_rss',
                'blackwell_digg',
                'blackwell_pinterest',
                'blackwell_linkedin',
                'blackwell_instagram',
                'blackwell_google',
               'blackwell_youtube',
               'blackwell_tumblr',
               'blackwell_flickr'
            )
        );
        return $section_content;
    }
    public static function blackwell_Settings() {
        $blackwell_settings = array(
            'blackwell_favicon' => array(
                'id' => 'blackwell_options[blackwell_favicon]',
                'label' => __('Custom Favicon', 'blackwell'),
                'description' => __('Here you can upload a Favicon for your Website. Specified size is 16px x 16px.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'blackwell_read_more_link' => array(
                'id' => 'blackwell_options[blackwell_read_more_link]',
                'label' => __('Blog Post Read More Text', 'blackwell'),
                'description' => __('Mention the text for blog post read more button', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Read More', 'blackwell')
            ),
                'blackwell_topimage' => array(
                'id' => 'blackwell_options[blackwell_topimage]',
                'label' => __('Home Top Feature Image', 'blackwell'),
                'description' => __('Choose your image for home page feature image. Optimal size is 1600px wide and 943px height.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/top_image.jpg'
            ),
            'blackwell_top_imageheading' => array(
                'id' => 'blackwell_options[blackwell_top_imageheading]',
                'label' => __('Home Top Feature Heading', 'blackwell'),
                'description' => __('Enter your text heading for top image.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Business theme composed of many features.', 'blackwell')
            ),
            'blackwell_top_imagelink' => array(
                'id' => 'blackwell_options[blackwell_top_imagelink]',
                'label' => __('Home Top Feature Link URL', 'blackwell'),
                'description' => __('Enter your link url for top image', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_top_image_desc' => array(
                'id' => 'blackwell_options[blackwell_top_image_desc]',
                'label' => __('Home Top Feature Description', 'blackwell'),
                'description' => __('Enter your text description for first slider.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Premium WordPress Themes with Single Click Installation, Just a Click and your website is ready for use.Premium WordPress Themes.', 'blackwell')
            ),            
             'blackwell_feature_heading' => array(
                'id' => 'blackwell_options[blackwell_feature_heading]',
                'label' => __('Home Page Main Heading', 'blackwell'),
                'description' => __('Mention the punch line for your business here.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Our best features coming with theme.', 'blackwell')
            ),
            'blackwell_feature_desc' => array(
                'id' => 'blackwell_options[blackwell_feature_desc]',
                'label' => __('Home Page Main Description', 'blackwell'),
                'description' => __('Mention the Sub punch line for your business here.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Blackwell Theme is one of the easiest theme to built your website. Easy website management through Options Panel.', 'blackwell')
            ),
            // First Feature Section
            'blackwell_feature_head1' => array(
                'id' => 'blackwell_options[blackwell_feature_head1]',
                'label' => __('First Feature Heading', 'blackwell'),
                'description' => __('Mention the heading for First column that will showcase your business services.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Font Awesome Icons', 'blackwell')
            ),
            'blackwell_font_icon1' => array(
                'id' => 'blackwell_options[blackwell_font_icon1]',
                'label' => __('First Feature Icon', 'blackwell'),
                'description' => __('Enter the  CSS class fa-cloud  of the icons you want to use on your first column feature. Font Awesome gives you scalable vector icons that can instantly be customized. You can find a list of icon classes here :fortawesome.github.io/Font-Awesome/icons e.g fa-book', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'fa-microphone'
            ),
            'blackwell_feature_desc1' => array(
                'id' => 'blackwell_options[blackwell_feature_desc1]',
                'label' => __('First Feature Description', 'blackwell'),
                'description' => __('Write short description for your First heading.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('blackwell is a unique responsive WordPress theme. The theme design is fabulous enough giving your visitors the absolute reason to stay on your site.', 'blackwell')
            ),
            'blackwell_feature_link1' => array(
                'id' => 'blackwell_options[blackwell_feature_link1]',
                'label' => __('First feature Link', 'blackwell'),
                'description' => __('Enter your text for First feature Link.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Second Feature Section
            'blackwell_feature_head2' => array(
                'id' => 'blackwell_options[blackwell_feature_head2]',
                'description' => __('Mention the heading for Second column that will showcase your business services.', 'blackwell'),
                'label' => __('Second Feature Heading', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('your embed videos', 'blackwell')
            ),
            'blackwell_font_icon2' => array(
                'id' => 'blackwell_options[blackwell_font_icon2]',
                'label' => __('Second Feature Icon', 'blackwell'),
                'description' => __('Enter the  CSS class fa-cloud  of the icons you want to use on your second column feature. Font Awesome gives you scalable vector icons that can instantly be customized. You can find a list of icon classes here :fortawesome.github.io/Font-Awesome/icons e.g fa-book', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'fa-rocket'
            ),
            'blackwell_feature_desc2' => array(
                'id' => 'blackwell_options[blackwell_feature_desc2]',
                'label' => __('Second Feature Description', 'blackwell'),
                'description' => __('Write short description for your Second heading.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('There are a lot of ways that you can look at people and a lot of characteristics that you can choose to expect people to have.', 'blackwell')
            ),
            'blackwell_feature_link2' => array(
                'id' => 'blackwell_options[blackwell_feature_link2]',
                'label' => __('Second feature Link', 'blackwell'),
                'description' => __('Enter your text for Second feature Link.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Third Feature Section
            'blackwell_feature_head3' => array(
                'id' => 'blackwell_options[blackwell_feature_head3]',
                'label' => __('Third Feature Heading', 'blackwell'),
                'description' => __('Mention the heading for Third column that will showcase your business services.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Completely responsive', 'blackwell')
            ),
            'blackwell_font_icon3' => array(
                'id' => 'blackwell_options[blackwell_font_icon3]',
                'label' => __('Third Feature Icon', 'blackwell'),
                'description' => __('Enter the  CSS class fa-cloud  of the icons you want to use on your third column feature. Font Awesome gives you scalable vector icons that can instantly be customized. You can find a list of icon classes here :fortawesome.github.io/Font-Awesome/icons e.g fa-book', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => 'fa-signal'
            ),
            'blackwell_feature_desc3' => array(
                'id' => 'blackwell_options[blackwell_feature_desc3]',
                'label' => __('Third Feature Description', 'blackwell'),
                'description' => __('Write short description for your third heading.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('There are a lot of ways that you can look at people and a lot of characteristics that you can choose to expect people to have.', 'blackwell')
            ),
            'blackwell_feature_link3' => array(
                'id' => 'blackwell_options[blackwell_feature_link3]',
                'label' => __('Third feature Link', 'blackwell'),
                'description' => __('Enter your text for third feature Link.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),    
            'blackwell_blog_heading' => array(
                'id' => 'blackwell_options[blackwell_blog_heading]',
                'label' => __('Home Page Blog Feature Heading', 'blackwell'),
                'description' => __('Mention the heading for your blog feature area on home page.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Our Featured Blog', 'blackwell')
            ),
            'blackwell_blog_desc' => array(
                'id' => 'blackwell_options[blackwell_blog_desc]',
                'label' => __('Home Page Blog Feature Description', 'blackwell'),
                'description' => __('Mention the description for your blog feature area on home page.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Proin vel diam id dui pharetra commodo. Praesent commodo enim non molestie varius.<br/> Phasellus elementum odio faucibus diam sollicitudin, in bibendum quam feugiat.', 'blackwell')
            ),
            //social-icons
            'blackwell_facebook' => array(
                'id' => 'blackwell_options[blackwell_facebook]',
                'label' => __('Facebook URL', 'blackwell'),
                'description' => __('Enter your Facebook URL if you have one.', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_twitter' => array(
                'id' => 'blackwell_options[blackwell_twitter]',
                'label' => __('Twitter URL', 'blackwell'),
                'description' => __('Enter your Twitter URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_yahoo' => array(
                'id' => 'blackwell_options[blackwell_yahoo]',
                'label' => __('Yahoo URL', 'blackwell'),
                'description' => __('Enter your Yahoo Feed URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_rss' => array(
                'id' => 'blackwell_options[blackwell_rss]',
                'label' => __('Rss URL', 'blackwell'),
                'description' => __('Enter your Rss URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_digg' => array(
                'id' => 'blackwell_options[blackwell_digg]',
                'label' => __('Digg URL', 'blackwell'),
                'description' => __('Enter your Digg URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_pinterest' => array(
                'id' => 'blackwell_options[blackwell_pinterest]',
                'label' => __('Pinterest URL', 'blackwell'),
                'description' => __('Enter your Pinterest URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_linkedin' => array(
                'id' => 'blackwell_options[blackwell_linkedin]',
                'label' => __('Linkedin URL', 'blackwell'),
                'description' => __('Enter your Linkedin URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_google' => array(
                'id' => 'blackwell_options[blackwell_google]',
                'label' => __('Google URL', 'blackwell'),
                'description' => __('Enter your Google URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_instagram' => array(
                'id' => 'blackwell_options[blackwell_instagram]',
                'label' => __('Instagram URL', 'blackwell'),
                'description' => __('Enter your Instagram URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_youtube' => array(
                'id' => 'blackwell_options[blackwell_youtube]',
                'label' => __('Youtube URL', 'blackwell'),
                'description' => __('Enter your Youtube URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_tumblr' => array(
                'id' => 'blackwell_options[blackwell_tumblr]',
                'label' => __('Tumblr URL', 'blackwell'),
                'description' => __('Enter your Tumblr URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'blackwell_flickr' => array(
                'id' => 'blackwell_options[blackwell_flickr]',
                'label' => __('Flickr URL', 'blackwell'),
                'description' => __('Enter your Flickr URL if you have one', 'blackwell'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            )
        );
        return $blackwell_settings;
    }
    public static function blackwell_Controls($wp_customize) {
        $sections = self::blackwell_Section_Content();
        $settings = self::blackwell_Settings();
        foreach ($sections as $section_id => $section_content) {
            foreach ($section_content as $section_content_id) {
                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blackwell_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Image_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;
                    case 'text':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blackwell_sanitize_text');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;
                    case 'textarea':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blackwell_sanitize_textarea');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'textarea'
                                )
                        ));
                        break;
                    case 'link':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'blackwell_sanitize_url');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));

                        break;
                    default:
                        break;
                }
            }
        }
    }
    public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $default,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array('blackwell_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }
    /**
     * adds sanitization callback funtion : textarea
     * @package blackwell
     */
    public static function blackwell_sanitize_textarea($value) {
         $allowedtags = array(
            'iframe' => array(
                'width' => array(),
                'height' => array(),
                'frameborder' => array(),
                'src' => array(),
                'marginwidth' => array(),
                'marginheight' => array(),
            ),
            wp_kses_allowed_html()
        );
        $array = wp_kses_allowed_html('post');
        $allowedtags = array(
            'iframe' => array(
                'width' => array(),
                'height' => array(),
                'frameborder' => array(),
                'src' => array(),
                'marginwidth' => array(),
                'marginheight' => array(),
            )
        );
        $data = array_merge($allowedtags, $array);
        $value = wp_kses($value, $data);
        return $value;
    }
    /**
     * adds sanitization callback funtion : url
     * @package blackwell
     */
    public static function blackwell_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : text
     * @package blackwell
     */
    public static function blackwell_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package blackwell
     */
    public static function blackwell_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package blackwell
     */
    public static function blackwell_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }

}
// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('blackwell_Customizer', 'blackwell_Register'));
function inkthemes_registers() {
          wp_register_script( 'inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true  );
	wp_register_script( 'inkthemes_customizer_script', get_template_directory_uri() . '/js/inkthemes_customizer.js', array("jquery","inkthemes_jquery_ui"), true  );
	wp_enqueue_script( 'inkthemes_customizer_script' );
	wp_localize_script( 'inkthemes_customizer_script', 'ink_advert', array(
		'pro' => __('View PRO version','blackwell'),
		'url' => esc_url('https://www.inkthemes.com/market/interior-design-wordpress-theme/'),
		'support_text' => __('Need Help!','blackwell'),
		'support_url' => esc_url('https://www.inkthemes.com/contact-us/')
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'inkthemes_registers' );
