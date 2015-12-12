# functions.php
Reusable WordPress functions to be installed in your theme's `functions.php`. In order...

- Remove `width` and `height` attributes from `<img>`s uploaded in the Media Uploader. This does not work retroactively on already uploaded images.
- Remove `devicepx` which is added by Jetpack which adds back `width` and `height` attributes on `<img>`s inline. *Only use this if you're using Jetpack.*
- Add custom CSS for non-admin users to WP Admin, useful for hiding stuff you don't want clients to see.
- Add a box to the WP Admin Dashboard page, useful for displaying any information your clients might need to see. I generally use this to link to "how to WordPress" guides and tech support information.
- Set sensible default options for the Media Uploader when a user embeds attachments. Use the full-size image URL, no alignment, and won't  wrap it in a link.
- Hide the WordPress logo on the WP Admin login page. (I'd like to add more code to minimize the amount of WordPress branding elements on each page at some point.)

### In the future

* I would like to prevent a user-created image caption from having a `height` attribute but couldn't find a function to do it. I currently override it in CSS: `.wp-caption { max-width: auto; height: auto; }`
