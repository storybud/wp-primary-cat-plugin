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

    if ( ! isset( $_POST[ 'primary_category_save_nonce' ] ) || ! wp_verify_nonce( $_POST[ 'primary_category_save_nonce' ], 'primary_category_save' ) ) {
		return $post_id;
	}

    // Do not save the data if autosave
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

    // define your own post type here
	if ( 'post' !== $post->post_type ) {
		return $post_id;
	}

    // Update post meta
    if ( ! isset( $POST[ 'primary_category' ] ) ) {
        update_post_meta( $post_id, '_primary_category', $_POST[ 'primary_category' ] );
    }

    return $post_id;

}