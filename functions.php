/* 
 * by Ed Adams: custom CSS for the WP-Admin area for non-administrator users.
 * This should be expanded with some CSS to apply when viewing pages with the WordPress top bar in the future, as some functions hidden here will be visible there.
 */
function excellence_non_admin_custom_css() {
  if( !current_user_can( 'activate_plugins' )) {
    echo '<style type="text/css" id="excellence-editor-custom-css" media="screen">
      #wp-admin-bar-wp-logo, #menu-posts, #menu-comments, #menu-posts-feedback, #menu-tools, #menu-settings, #toplevel_page_jetpack, #collapse-menu, #wp-admin-bar-comments, #wp-admin-bar-notes, #wpfooter, #profile-page h3:nth-of-type(1), #profile-page .form-table:nth-of-type(-n+2), #post-by-email {
        display: none !important;
      }
    </style>';	
  }
}
add_action( 'admin_head', 'excellence_non_admin_custom_css' );



/*
 * by @Ed Adams: custom Dashboard box.
 * Second parameter in wp_add_dashboard_widget is the title, third parameter is the function call which echos the content. HTML safe.
 */
function excellence_add_dashboard_boxes() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget( 'custom_help_widget', 'Excellence Aviation on WordPress', 'excellence_dashboard_help_box' );
}
function excellence_dashboard_help_box() {
  echo '<p>Welcome to Excellence Aviation\'s new webite running on WordPress!</p><p><a class="button button-primary" href="https://docs.google.com/document/d/1217khhFY3o2lyIz8AwI1-uIR7OB7VFau9BGeSPSh18U/edit?usp=sharing">Read the <em>How to use WordPress</em> guide</a></p>';
}
add_action( 'wp_dashboard_setup', 'excellence_add_dashboard_boxes' );



/*
 * by Ed Adams: set the defaults for user-uploaded images to display at full sizes and use sensible defaults.
 * Sensible defaults when uploading media, as I don't want editors to have to always define that images shouldn't display as thumbnails.
 */
function default_attachment_display_settings() {
  update_option( 'image_default_align', 'none' );
  update_option( 'image_default_link_type', 'none' );
  update_option( 'image_default_size', 'full' );
}
add_action( 'after_setup_theme', 'default_attachment_display_settings' );
