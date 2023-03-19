<?php
/**
 * Update metabox
 */

 namespace PrimaryCategory\Save;

/**
 * Initiate save post hook
 */
function init () {
    add_action( 'save_post', __NAMESPACE__ . '\\save_primary_category', 10, 2 );
}

/**
 * Save meta
 */
function save_primary_category($post_id, $post) {

    // Do not save the data if autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

    // define your own post type here
	if( 'post' !== $post->post_type ) {
		return $post_id;
	}

    update_post_meta( $post_id, '_primary_category', sanitize_text_field( $_POST[ 'primary_category' ] ) );

}