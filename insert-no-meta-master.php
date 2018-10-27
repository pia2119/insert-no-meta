<?php
/*

Plugin Name:Insert No Meta
Description:This plugin will insert number into the meta property="og:number" in header


*/

?>

<?php
add_action('wp_head','displaymetaheader');

function displaymetaheader(){
?>


<meta property="og:number" content="<?php echo esc_attr(get_option('get-no-value'));  ?>" />


<?php

}

//plugin settings page
add_action('admin_menu','my_meta_plugin_settings');

function my_meta_plugin_settings(){
add_menu_page('No Meta Plugin','Number Meta','administrator','insert-no-meta','insert_no_plugin_settings_page','
dashicons-welcome-write-blog','90');
}

add_action('admin_init','no_meta_plugin_function');
function no_meta_plugin_function(){
register_setting('no-meta-data-group','active-meta-data');
register_setting('no-meta-data-group','get-no-value');
}

function insert_no_plugin_settings_page(){
echo "<h1>Settings page</h1>";
?>
<div class="wrap">
<form action="options.php" method="post">
<?php settings_fields('no-meta-data-group');?>

<?php do_settings_sections('no-meta-data-group'); ?>
<label>Please Enter Your Number</label>
<input type="text" name="get-no-value" value="<?php echo esc_attr(get_option('get-no-value'));  ?>">
<?php submit_button(); ?>
</form>
</div>

<?php
}
?>


