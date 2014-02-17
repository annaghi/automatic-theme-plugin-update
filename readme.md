## MW Automatic Theme Plugin Updater for Self-Hosted Themes/Plugins

* Support This Developer: http://www.amazon.co.jp/registry/wishlist/39ANKRNSTNW40

* Original Plugin & Theme API by jeremyclark13, Kaspars Dambis
* Modified by Takashi Kitajima ( http://2inc.org )

---

## General Info

For themes and plugins that can't be submitted to official WordPress repository, ie ... commercial themes/plugins/, written for one client.

### Folder structure
* api (Folder to upload to server where updates will be housed)
    * .htaccess (set Options+Indexes to allow checking to work properly)
    * index.php (holds code used to check request for new versions)
    * packages.php (file containing all info about plugins and themes)
    * download.php (validates md5 key of date and package zip file)
    * update (folder to hold all zip file updates for url masking - protected by .htaccess to disallow file listings)

* update (default folder for holding theme and plugin zip files)
    * .htaccess (prevents indexing and viewing of any zip files in directory)

* plugin-update.php (File to include in the plugin to check for updates)

* theme-update.php (File to include in the theme to check for updates)

## Setup

*Example: Include to the parent theme:*

    require_once( 'theme-update.php' );
    $ATPU_Theme = new ATPU_Theme( 'http://example.jp/api/' );

*Example: Include to the child theme:*

    require_once( 'theme-update.php' );
    $ATPU_Theme = new ATPU_Theme( 'http://example.jp/api/', 'child' );

*Example: Include to the plugin:*

    require_once( 'plugin-update.php' );
    $ATPU_Plugin = new ATPU_Plugin( 'http://example.jp/api/', 'your-plugin-slug' );

## Adding new versions

Edit the packages.php under api folder on your server.  Commented thoroughly throughout with sections that need to be changed to reflect themes/plugins that are to be updated.

## Adding additional themes/plugins

Simply create another $package array with the key of the new theme/plugin slug and add all the appropriate info.  When releasing the theme/plugin make sure that functions and variables are prefixed to prevent errors and allow multiple themes/plugins to be updated.

## Securing Download location

Downloads are now always secured by a md5 hash of the package file_name and timestamp of current date.  When downloading file current timestamp and timestamp of previous day are compared to key received from update request, if either match zip file is passed, and file can be downloaded.