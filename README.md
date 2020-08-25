# Estera
===

Estera is a lightweight, yet highly customizable WordPress theme, that can be used to create beautiful blogs, portfolio websites and ecommerce stores. 

## Installation

### Theme Installation

Clone or download this repository, unzip it and paste it inside the `wp-content => themes`) folder on your server. Activate the theme from `'appearance=>themes'`.

### License activation

You need to activate this theme in order to receive theme support and updates. To do that, navigate to `appearance => theme options` and enter your license key.

### Install Recommended Plugins

Estera is a highly customizable theme and will work on its own. However, if you want to save time, take full advantage of its options and import the demo content to make it look like the [theme preview](https://nasiothemes.com/estera), you will need to install and activate a few plugins that are preconfigured to work with this theme. The recommended plugins are:

- [Woocommerce](https://wordpress.org/plugins/woocommerce/)
- [Mailchimp for WordPress](https://wordpress.org/plugins/mailchimp-for-wp/)
- [YITH WooCommerce Wishlist](https://wordpress.org/plugins/yith-woocommerce-wishlist/)
- [One Click Demo Import](https://wordpress.org/plugins/one-click-demo-import/)

In the WordPress dashboard, you will see a notice to install all the recommended plugins. Go on, install and activate all the plugins. Skip Woocommerce configuration for now, you can do that later. You can use the theme without these plugins, however, you need them in order to import the demo content in the next step. 

### Import Demo Content

Making you website look exactly like the theme preview is really easy! There are just two steps that you need to implement:

#### One Click Demo Import

The easiest way to import the theme demo is with [One Click Demo Import](https://wordpress.org/plugins/one-click-demo-import/) plugin. In the WordPress dashboard, click on `Appearance => Import demo data` and you will see the plugin's main page with `import demo data` button. Before clicking the button, make sure once again that all the required plugins have been activated. After you press the submit button, go make yourself a cup of coffee and wait for the importer to do its magic. It might take awhile. It is recommended to leave the browser upload screen open during the execution time. After a few minutes, you should see a success message that all data has been successfully imported!

Troubleshooting:

1. My menu items does not display correctly.

Go to `appearance => menus`, select the menu you want to appear and put a tick on `Display Location: Primary` at the bottom of the page.

2. Woocommerce cart and checkout menu items does not work. 
   
You might need to set up the Woocommerce pages via `Woocommerce => Settings => Advanced`

3. One Click Import plugin is returning Internal Error 500

Downgrade the plugin to version [2.5.2](https://wordpress.org/plugins/one-click-demo-import/advanced/) 

#### Update Mailchimp For WordPress Plugin

The final thing you need to do is to update the Mailchimp For WordPress Plugin. Head over to `MC4WP => Forms` and click `Save`. Now, if all went well, when you visit the site's homepage, you should see the exported content and the site should look exactly like on the [theme preview page](https://nasiothemes.com/estera)!

## License
* License: [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html)