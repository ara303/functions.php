# functions.php
WordPress functions that are useful to me.

## Currently 
In chronological order...

1. Prevent `img`s from having inline `width` and `height` attributes.
2. Custom CSS for non-admin users in the WordPress control panel, useful for hiding stuff editors *won't* need.
3. Custom Dashboard box for all users in the WordPress control panel, useful for displaying system-specific stuff editors *will* need.
4. Set sensible default options when user embed attachments (images, etc.) via WordPress editor, so it defaults to the full-size image URL, doesn't align it, and doesn't try to wrap it in a link.

## In the future

* I would like to prevent a user-created image caption from having a `height` attribute. I currently override this in CSS: `.wp-caption { max-width: auto; height: auto; }`
