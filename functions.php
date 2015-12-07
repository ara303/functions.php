<?php

  /**
   * Remove width="" and height="" from images as they're uploaded.
   * Credit: https://gist.github.com/stuntbox/4557917#gistcomment-1257963
   */
  function ea_remove_img_dimensions($html) {
    if (preg_match_all('/<img[^>]+>/ims', $html, $matches)) {
      foreach ($matches as $match) {
        $clean = preg_replace('/(width|height)=["\'\d%\s]+/ims', "", $match);
        $html = str_replace($match, $clean, $html); 
      }
    }
    return $html;
  }
  add_filter('post_thumbnail_html', 'ea_remove_img_dimensions', 30);
  add_filter('the_content', 'ea_remove_img_dimensions', 30);
  add_filter('get_avatar','ea_remove_img_dimensions', 30);



  /**
   * Stop Jetpack from using a JS plugin called 'devicepx' that adds back image
   * width/height attributes via JS.
   */
  function remove_jetpack_devicepx() {
      wp_dequeue_script( 'devicepx' );
  }
  add_action( 'wp_enqueue_scripts', 'remove_jetpack_devicepx', 20 );



  /**
   * Custom CSS for the WP-Admin area for non-administrator users.
   */
  function ea_admin_custom_css() {
    if( !current_user_can( 'activate_plugins' )) {
      echo '<style type="text/css" id="ea-wp-admin-custom-css">
        #wp-admin-bar-wp-logo,
        #menu-posts, #menu-comments,
        #menu-posts-feedback, #menu-tools,
        #menu-settings,
        #toplevel_page_jetpack,
        #collapse-menu,
        #wp-admin-bar-comments,
        #wp-admin-bar-notes,
        #wpfooter,
        #profile-page h3:nth-of-type(1),
        #profile-page .form-table:nth-of-type(-n+2),
        #post-by-email {
          display: none !important;
        }
      </style>';	
    }
  }
  add_action( 'admin_head', 'ea_admin_custom_css' );



  /**
   * Box for the WP-Admin area (useful for prominently displaying help/info).
   */
  function ea_admin_dashboard_add_box() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget( 'custom_help_widget', 'Box Title', 'ea_dashboard_box_1' );
  }
  function ea_dashboard_box_1() {
    echo '<p>Box Text</p><p><a class="button button-primary" href="#0">Button</em></a></p>';
  }
  add_action( 'wp_dashboard_setup', 'ea_admin_dashboard_add_box' );



  /**
   * Set the defaults for user-uploaded images to display at full sizes and use sensible defaults.
   */
  function ea_default_attachment_settings() {
    update_option( 'image_default_align', 'none' );
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'full' );
  }
  add_action( 'after_setup_theme', 'ea_default_attachment_settings' );

?>
