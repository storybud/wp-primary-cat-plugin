<?php
/**
 * Access posts primary category
 */

 namespace PrimaryCategory\Access;

 /**
  * Intiate shortcode
  */
  function init() {
    add_action( 'init', __NAMESPACE__ . '\\create_shortcode');
  }

  /**
   * Create Shortcode
   */
  function create_shortcode() {
    add_shortcode( 'primary_category_shortcode', __NAMESPACE__ .'\\post_primary_category' );
  }

  /**
   * Get post meta primary category
   */
  function post_primary_category() {
    $primary_category = get_post_meta( get_the_ID(), '_primary_category', true);
    return get_the_category_by_ID($primary_category);
  }
