<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
add_filter( 'attachments_default_instance', '__return_false' );
function alpha_attachments($attachments){
    $fields         = array(
        array(
            'name'      => 'title',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Title', 'alpha' ),    // label to display
            'default'   => 'title',                         // default value upon selection
        )

    );
    $args = array(

        'label'         => 'Featured Slider',

        'post_type'     => array( 'post'),

        'filetype'      => array('image'),  // no filetype limit

        'note'          => 'Add slider image',

        'button_text'   => __( 'Attach Files', 'alpha' ),

        'fields'        => $fields,

    );
    $attachments->register( 'slider', $args ); // unique instance name
}
add_action( 'attachments_register', 'alpha_attachments' );
function alpha_attachments_testimonial($attachments){
    $fields         = array(
        array(
            'name'      => 'name',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Name', 'alpha' ),    // label to display
            'default'   => 'name',                         // default value upon selection
        ),
        array(
            'name'      => 'company',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'company', 'alpha' ),    // label to display
            'default'   => 'company',                         // default value upon selection
        ),
        array(
            'name'      => 'position',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Position', 'alpha' ),    // label to display
            'default'   => 'position',                         // default value upon selection
        ),
        array(
            'name'      => 'testimonial',                         // unique field name
            'type'      => 'textarea',                          // registered field type
            'label'     => __( 'testimonial', 'alpha' ),    // label to display
            'default'   => 'testimonial',                         // default value upon selection
        )

    );
    $args = array(

        'label'         => 'Testimonials',

        'post_type'     => array( 'page'),

        'filetype'      => array('image'),  // no filetype limit

        'note'          => 'Add testimonial image',

        'button_text'   => __( 'Attach Files', 'alpha' ),

        'fields'        => $fields,

    );
    $attachments->register( 'testimonials', $args ); // unique instance name
}
add_action( 'attachments_register', 'alpha_attachments_testimonial' );
function alpha_team_attachments($attachments){
    $fields         = array(
        array(
            'name'      => 'name',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Name', 'alpha' ),    // label to display
            'default'   => 'name',                         // default value upon selection
        ),
        array(
            'name'      => 'email',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'E-mail', 'alpha' ),    // label to display
            'default'   => 'email',                         // default value upon selection
        ),
        array(
            'name'      => 'company',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'company', 'alpha' ),    // label to display
            'default'   => 'company',                         // default value upon selection
        ),
        array(
            'name'      => 'position',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Position', 'alpha' ),    // label to display
            'default'   => 'position',                         // default value upon selection
        ),
        array(
            'name'      => 'bio',                         // unique field name
            'type'      => 'textarea',                          // registered field type
            'label'     => __( 'bio', 'alpha' ),    // label to display
            'default'   => 'bio',                         // default value upon selection
        )

    );
    $args = array(

        'label'         => 'Team member',

        'post_type'     => array( 'page'),

        'filetype'      => array('image'),  // no filetype limit

        'note'          => 'Add Team Member',

        'button_text'   => __( 'Attach Files', 'alpha' ),

        'fields'        => $fields,

    );
    $attachments->register( 'team', $args ); // unique instance name
}
add_action( 'attachments_register', 'alpha_team_attachments');