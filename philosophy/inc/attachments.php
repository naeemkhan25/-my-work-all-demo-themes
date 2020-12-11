<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' );
function philosophy_attachments($attachments){
    $post_id=null;
    if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
        $post_id=empty($_REQUEST['post_ID'])?$_REQUEST["post"]:$_REQUEST["post_ID"];
    }
        if(! $post_id || get_post_format($post_id)!="gallery"){
            return 0;
        }

    $fields         = array(
        array(
            'name'      => 'title',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Title', 'philosophy' ),    // label to display
            'default'   => 'title',                         // default value upon selection
        )
    );
    $args = array(

        'label'         => 'Gallery',

        'post_type'     => array( 'post'),

        'filetype'      => array('image'),  // no filetype limit

        'note'          => 'Add Gallery image',

        'button_text'   => __( 'Attach Files', 'philosophy' ),

        'fields'        => $fields,

    );
    $attachments->register( 'Gallery', $args ); // unique instance name
}
add_action( 'attachments_register', 'philosophy_attachments' );
