<?php
/**
 * Create metabox content render
 */

 namespace PrimaryCategory;

 /**
  * Metabox Content
  */
  function metabox_content() {

    wp_nonce_field( 'primary_category_save', 'primary_category_save_nonce' );

    $categories = get_the_category();
    $currentPrimary = get_post_meta( get_the_ID(), '_primary_category', true );

    $HTML = '<label for="primary">' 
            . _e( 'Set Primary Category', 'text_domain' ) .
        '</label>
        <select name="primary_category" id="primary">
            <option>Select Primary Category</option>';

    foreach($categories as $category) {
        $category->term_id == $currentPrimary ?  $setActiveCategory = 'selected="selected"' : $setActiveCategory = '';
        $HTML .= '<option value="' . $category->term_id . '"' . $setActiveCategory . '>' . $category->name . '</option>';
    }

    $HTML .= '</select>';

    echo $HTML;
  }