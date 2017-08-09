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

?>