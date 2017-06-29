<?php

/**
* Plugin Name: JetpackTweaks - OpenGraph Fix
* Description: Fixes OpenGraph tags that are added by JetPack, which for some reason,
*              are not qualified with absolute URLs.
* Author: Josh Einstein
* Version: 1.0
*/

add_filter( 'jetpack_disable_twitter_cards', '__return_true' );
add_filter( 'jetpack_open_graph_tags', function( $tags ) {

    global $post;
    if (is_singular() && $post) {
        $twitterHandle = get_the_author_meta('twitter', $post->post_author);
        $tags['twitter:creator'] = $twitterHandle;
        $tags['twitter:site'] = $twitterHandle;
    }

    //$tags['twitter:card'] = 'summary_large_image';
    $tags['twitter:title'] = $tags['og:title'];
    $tags['twitter:description'] = $tags['og:description'];
    if ( strpos($tags['og:image'], '/') === 0 ) {
      $tags['og:image'] = get_site_url( null, $tags['og:image'], 'https' );
	  $tags['twitter:image'] = $tags['og:image'];
    } 
    return $tags;
});

add_filter('user_contactmethods', function($profile_fields) {
    $profile_fields['twitter'] = 'Twitter Username';
    $profile_fields['facebook'] = 'Facebook URL';
    return $profile_fields;
});

?>