# functions.php
WordPress functions that are useful to me.

# Currently 
In chronological order...

* Custom CSS for non-admin users in the WordPress control panel, useful for hiding stuff editors *won't* need.
* Custom Dashboard box for all users in the WordPress control panel, useful for displaying system-specific stuff editors *will* need.
* Set sensible default options when user embed attachments (images, etc.) via WordPress editor, so it defaults to the full-size image URL, doesn't align it, and doesn't try to wrap it in a link.

# In the future

* I would like to explore prevent a user-created image with caption from having a fixed `height`. I currently override this in CSS: `.wp-caption { max-width: auto; height: auto; }`
