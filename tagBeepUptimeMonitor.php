<?php
/*
 * Plugin Name: tagBeep Uptime Monitor
 * Version: 1.1
 * Plugin URI: http://tagbeep.com/doc/tagbeep-wordpress-uptime-plugin/
 * Description: Get an email when your blog is down! Up and running in 5 seconds.
 * License: GPLv2
 * Author: Radu Oprea
 * Author URI: http://tagbeep.com/doc/tagbeep-wordpress-uptime-plugin/
 */

/**
 * Feel free to contact me at contact@tagbeep.com and thanks for using my plugin!
 */

/**
 * load the admin panel via callback from left admin menu
 */
function tb_load_tagBeepAdmin() {  
    require_once 'tagBeepAdmin.php'; //za admin
}  



/**
 * Add tagBeep's panel to the wp admin panel
 * admin_menu action
 */
function tb_addTagBeepToWpAdmin() {  
    //add in /settings manu
    add_options_page("tagBeep uptime", "tagBeep uptime", 8, "tagBeepUptimeMonitor", "tb_load_tagBeepAdmin"); 
    //add in the /plugins menu
    add_plugins_page("tagBeep uptime", "tagBeep uptime", 8, "tagBeepUptimeMonitorPlugin", "tb_load_tagBeepAdmin"); 
}  
add_action('admin_menu', 'tb_addTagBeepToWpAdmin');



/**
 * On activate event
 * set the option tagBeep_redirect_to_plugin to redirect
 */
function tb_onPluginActivate() {
    add_option('tagBeep_redirect_to_plugin', 'true');
}
register_activation_hook(__FILE__, 'tb_onPluginActivate');



/**
 * First time activation redirect
 * on admin_init check to see if the plugin was activated for the first time
 */
function tb_tagBeep_plugin_redirect() {
    if (get_option('tagBeep_redirect_to_plugin') == 'true') {
        //we have the key tagBeep_redirect_to_plugin, we have to redirect to the plugin page
        update_option('tagBeep_redirect_to_plugin', 'false'); //set the key to false to not redirect each time
        wp_redirect('plugins.php?page=tagBeepUptimeMonitorPlugin');
    }
}
add_action('admin_init', 'tb_tagBeep_plugin_redirect');



?>