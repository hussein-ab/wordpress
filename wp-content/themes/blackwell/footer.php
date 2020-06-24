<div class="clear"></div>
<div class="container_24">
    <div class="grid_24">
        <div class="footer">
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="bottom_footer_content">
    <div class="container_24">
        <div class="grid_12">
            <div class="copyrightinfo">
                <p class="copyright">
                    <a href="http://wordpress.org/" rel="generator">
                        <?php _e('Powered by WordPress', 'blackwell');?>
                    </a>
                    <span class="sep">&nbsp;|&nbsp;</span>
                    <?php
            $inkthemes_site_url='https://www.inkthemes.com/market/interior-design-wordpress-theme/';
            printf(__('%1$s by %2$s.', 'blackwell'), 'BlackWell', '<a rel="nofollow" href="'.esc_url($inkthemes_site_url).'" rel="designer">InkThemes</a>');
            ?>
                </p>
            </div>
        </div>

        <div class="grid_12 omega">
        <ul class="social_logos">
        <?php if (blackwell_get_option('blackwell_facebook') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_facebook')); ?>" title="Facebook">
                <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_twitter') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_twitter')); ?>" title="Twitter">
                <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_yahoo') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_yahoo')); ?>" title="Yahoo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/yahoo.png" alt="Yahoo" />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_rss') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_rss')); ?>" title="Rss Feed">
                <img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="Digg Icon" />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_digg') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_digg')); ?>" title="Digg">
                <img src="<?php echo get_template_directory_uri(); ?>/images/digg.png" alt="Digg icon" />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_pinterest') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_pinterest')); ?>" title="Pinterest">
                <img src="<?php echo get_template_directory_uri(); ?>/images/pinterest.png" alt="Pinterest icon"
                />
            </a>
        </li>
        <?php } ?> 
        <?php if (blackwell_get_option('blackwell_linkedin') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_linkedin')); ?>" title="Pinterest">
                <img src="<?php echo get_template_directory_uri(); ?>/images/in.png" alt="Linkedin icon"
                />
            </a>
        </li>
        <?php } ?> 
        <?php if (blackwell_get_option('blackwell_instagram') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_instagram')); ?>" title="Instagram">
                <img src="<?php echo get_template_directory_uri(); ?>/images/instagram.png" alt="Instagram icon"
                />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_google') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_google')); ?>" title="Google">
                <img src="<?php echo get_template_directory_uri(); ?>/images/g+.png" alt="Google icon"
                />
            </a>
        </li>
        <?php } ?> 
        <?php if (blackwell_get_option('blackwell_youtube') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_youtube')); ?>" title="Youtube">
                <img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="Youtube icon"
                />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_tumblr') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_tumblr')); ?>" title="Tumblr">
                <img src="<?php echo get_template_directory_uri(); ?>/images/tumblr.png" alt="Tumblr icon"
                />
            </a>
        </li>
        <?php } ?>
        <?php if (blackwell_get_option('blackwell_flickr') != '') { ?>
        <li>
            <a href="<?php echo esc_url(blackwell_get_option('blackwell_flickr')); ?>" title="Flickr">
                <img src="<?php echo get_template_directory_uri(); ?>/images/flickr.png" alt="Flickr icon"
                />
            </a>
        </li>
        <?php } ?>
    </ul>


                </div>


    </div>
    <div class="clear"></div>
</div>



</div>
</div>
<?php wp_footer(); ?>
</body>

</html>