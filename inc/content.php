<?php
/**
 * Create metabox content render
 */

 namespace PrimaryCategory;

 /**
  * Metabox Content
  */
  function metabox_content() {
    $categories = get_the_category();

    $HTML = '<label for="primary">' 
            . _e( 'Set Primary Category', 'text_domain' ) .
        '</label>
        <select name="category" id="primary">
            <option>Select Primary Category</option>';

    foreach($categories as $category) {
        $HTML .= '<option value="' . $category->term_id . '">' . $category->name . '</option>';
    }

    $HTML .= '</select>';

    echo $HTML;
  }