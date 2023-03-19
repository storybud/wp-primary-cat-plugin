<?php
/**
 * Initiate Metabox
 */

 namespace PrimaryCategory;

 /**
  * Add hooks
  */
 function init() {
    add_action( 'add_meta_boxes', __NAMESPACE__ . '\\add_primary_select' );
 }

 /**
  * Create the metabox
  */
  function add_primary_select() {
    add_meta_box(
        'primary-category',
        'Primary Category',
        __NAMESPACE__ . '\\metabox_content',
        'post',
        'advanced',
        'default'
    );
  }

