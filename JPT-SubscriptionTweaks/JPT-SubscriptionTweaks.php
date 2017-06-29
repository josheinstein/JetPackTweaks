<?php

/**
* Plugin Name: Subscription Tweaks
* Description: Turns on per-post subscription settings.
* Author: Josh Einstein
* Version: 1.0
*/

add_filter( 'jetpack_allow_per_post_subscriptions', '__return_true' );

?>