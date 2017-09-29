<?php

/**
* Plugin Name: JetpackTweaks - Membership Tweaks
* Description: Disables password change notifications for admins. 
* Author: Josh Einstein
* Version: 1.0
*/

/**
 * Disable Admin Notification of User Password Change
 *
 * @see pluggable.php
 */
if ( ! function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification( $user ) {
        return;
    }
}

function jpt_remove_jetpack_from_subscribers() {
    if( class_exists( 'Jetpack' ) && !current_user_can( 'manage_options' ) ) {
        remove_menu_page( 'jetpack' );
    }
}

add_action( 'admin_init', 'jpt_remove_jetpack_from_subscribers' );

?>