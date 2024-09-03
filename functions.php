<?php

require_once get_template_directory() . '/includes/assets.php';
require_once get_template_directory() . '/includes/custom-post-type.php';
require_once get_template_directory() . '/includes/theme-support.php';


add_action('wp_footer', 'show_template');
function show_template() {
    global $template;
    if(is_user_logged_in()) {
        echo '<div class"template-name" style="position:fixed; left: 30px; bottom: 30px; padding:2px; background: coral; color:#fff; font-size: 13px;">'.basename($template).'</div>';
    }
}

// function load_author( $field ) {

// $authors = new WP_Query( array(
// 'post_type' => 'authors',
// 'posts_per_page' => -1, // Retrieve all players
// ) );
// $options = array();

// if ( $authors->have_posts() ) {
// while ( $authors->have_posts() ) {
// $authors->the_post();
// $options[ get_the_title()] = get_the_title();
//     }
// }
// $field['choices'] = $options;

// wp_reset_postdata(  );
// return $field;
// }
// add_filter( 'acf/load_field/name=author', 'load_author' );