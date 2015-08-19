
/*
 * @Ed Adams for Excellence: remove width="" and height="" from uploaded images.
 * Credit: http://wordpress.stackexchange.com/a/29886
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

/* 
 * by Ed Adams: custom CSS for the WP-Admin area for non-administrator users.
 * This should be expanded with some CSS to apply when viewing pages with the WordPress top bar in the future, as some functions hidden here will be visible there.
 */
function ea_css_for_admin() {
  if( !current_user_can( 'activate_plugins' )) {
    echo '<style type="text/css" id="excellence-editor-custom-css" media="screen">
      #wp-admin-bar-wp-logo, #menu-posts, #menu-comments, #menu-posts-feedback, #menu-tools, #menu-settings, #toplevel_page_jetpack, #collapse-menu, #wp-admin-bar-comments, #wp-admin-bar-notes, #wpfooter, #profile-page h3:nth-of-type(1), #profile-page .form-table:nth-of-type(-n+2), #post-by-email {
        display: none !important;
      }
    </style>';	
  }
}
add_action( 'admin_head', 'ea_css_for_admin' );



/*
 * by Ed Adams: custom Dashboard box.
 * Second parameter in wp_add_dashboard_widget is the title, third parameter is the function call which echos the content. HTML safe.
 */
function ea_add_dashboard_boxes() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget( 'custom_help_widget', 'You are on WordPress!', 'ea_dashboard_box_1' );
}
function ea_dashboard_box_1() {
  echo '<p>Welcome to the new WordPress site!</p><p><a class="button button-primary" href="#0">A useful button</em></a></p>';
}
add_action( 'wp_dashboard_setup', 'ea_add_dashboard_boxes' );



/*
 * by Ed Adams: set the defaults for user-uploaded images to display at full sizes and use sensible defaults.
 * Sensible defaults when uploading media, as I don't want editors to have to always define that images shouldn't display as thumbnails.
 */
function ea_default_attachment_settings() {
  update_option( 'image_default_align', 'none' );
  update_option( 'image_default_link_type', 'none' );
  update_option( 'image_default_size', 'full' );
}
add_action( 'after_setup_theme', 'ea_default_attachment_settings' );
