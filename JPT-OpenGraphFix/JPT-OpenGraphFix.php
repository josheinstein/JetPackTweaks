<?php

/**
* Plugin Name: OpenGraph Fix
* Description: Fixes OpenGraph tags that are added by JetPack, which for some reason,
*              are not qualified with absolute URLs.
* Author: Josh Einstein
* Version: 1.0
*/

add_filter( 'jetpack_disable_twitter_cards', '__return_true' );
add_filter( 'jetpack_open_graph_tags', function( $tags ) {
    $tags['twitter:creator'] = '@GibsonRadio';
    $tags['twitter:site'] = '@GibsonRadio';
    //$tags['twitter:card'] = 'summary_large_image';
    $tags['twitter:title'] = $tags['og:title'];
    $tags['twitter:description'] = $tags['og:description'];
    if ( strpos($tags['og:image'], '/') === 0 ) {
      $tags['og:image'] = 'https://johngibson.com' . $tags['og:image'];
	  $tags['twitter:image'] = $tags['og:image'];
    } 
    return $tags;
});

?>