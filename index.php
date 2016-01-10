<?php
/**
 * @package attach-pic
 * @version 1.0
 */
/*
Plugin Name: attach-pic
Description: a plugin which enable you to attach a little picture to your specific post when you post.
Author: WhiteIvory
Version: 1.0
*/
/*add_action( 'media_buttons_context', 'at_add_button');
  function at_add_button( $context )
    {
        $screen = get_current_screen();

        if( $screen->base == 'post' ) {
            $title = 'Attach';

            $context .= '<a href="#" id="eic-button" class="button" data-editor="content" title="' . $title . '">' . $title . '</a>';
        }

        return $context;
    }
*/
function myplugin_add_custom_box() {
    $screens = array( 'post', 'my_cpt' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'myplugin_box_id',            // Unique ID
            'Custom Meta Box Title',      // Box title
            'myplugin_inner_custom_box',  // Content callback
             $screen                      // post type
        );
    }
}
    add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );
function myplugin_inner_custom_box( $post ) {
?>
   <label for="myplugin_field"> Description for this field </label>
    <select name="myplugin_field" id="myplugin_field" class="postbox">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">33</option>
    </select>
<?php
}
add_action( 'save_post', 'myplugin_save_postdata' );
function myplugin_save_postdata( $post_id ) {
    if ( array_key_exists('myplugin_field', $_POST ) ) {
        update_post_meta( $post_id,
           '_my_meta_value_key',
            $_POST['myplugin_field']
        );
    }
}

?>
