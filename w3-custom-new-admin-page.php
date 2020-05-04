<?php
/*
Plugin Name: W3 custom New admin page
Description: Add a custom New admin page
Plugin URI: https://github.com/w3programmers/w3-custom-new-admin-page
Version: 1.0.0
Author: Masud Alam
Author URI: http://w3programmers.com
Text Domain: w3-custom-new-admin-page
*/

function w3_new_admin_menu(){
    
    add_menu_page(
        __( 'New Custom Page', 'w3-textdomain' ),
        __( 'New Custom Page', 'w3-textdomain' ),
        'manage_options',
        'new-admin-page',
        'w3_new_admin_form',
        'dashicons-schedule',
        3
    );
    register_setting( 'w3_users', 'name', 'w3_callback_function_name_sanitize' );
}

add_action( 'admin_menu', 'w3_new_admin_menu' );

function w3_new_admin_form() {
?>
<h1>
<?php esc_html_e( 'Welcome to w3 custom admin page.', 'w3-plugin-textdomain' ); ?>
</h1>
<form action="options.php" method="post">
        <?php settings_fields( 'w3_users' ); ?>
        <table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo get_option('name'); ?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><?php echo submit_button(); ?></td>
			</tr>
		</table>
    </form>
<?php
}
