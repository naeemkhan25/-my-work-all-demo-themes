<?php
add_action( 'cmb2_init', 'cmb2_add_imageInfo_metabox' );
function cmb2_add_imageInfo_metabox() {

    $prefix = '_alpha_';

    $cmb = new_cmb2_box( array(
        'id'           => $prefix . 'image_information',
        'title'        => __( 'image information', 'alpha' ),
        'object_types' => array( 'page', 'post' ),
        'context'      => 'normal',
        'priority'     => 'default',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Camera model', 'alpha' ),
        'id' => $prefix . 'camera_model',
        'type' => 'text',
        'default' => 'nikkon',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Location', 'alpha' ),
        'id' => $prefix . 'location',
        'type' => 'text',
    ) );

    $cmb->add_field( array(
        'name' => __( 'date', 'alpha' ),
        'id' => $prefix . 'date',
        'type' => 'text_date',
    ) );

    $cmb->add_field( array(
        'name' => __( 'licensed?', 'alpha' ),
        'id' => $prefix . 'licensed_',
        'type' => 'checkbox',
    ) );

    $cmb->add_field( array(
        'name' => __( 'licensed information', 'alpha' ),
        'id' => $prefix . 'licensed_information',
        'type' => 'textarea',
        'attributes' => array(
            'data-conditional-id' =>  $prefix . 'licensed_',
            // Works too: 'data-conditional-value' => 'on'.
        )
    ) );
    $cmb->add_field( array(
        'name' => __( 'image info', 'alpha' ),
        'id' => $prefix . 'image_info',
        'type' => 'file',
    ) );
    $cmb->add_field( array(
        'name' => __( 'Resume', 'alpha' ),
        'id' => $prefix . 'resume',
        'type' => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
            // 'type' => array(
            // 	'image/gif',
            // 	'image/jpeg',
            // 	'image/png',
            // ),
        ),
    ) );

}

function cmb2_add_pricingTable() {

    $prefix = '_alpha_';

    $cmb = new_cmb2_box( array(
        'id'           => $prefix . 'pricing_table',
        'title'        => __( 'pricing table', 'alpha' ),
        'object_types' => array( 'page' ),
        'context'      => 'normal',
        'priority'     => 'default',
    ) );

   $group=$cmb->add_field( array(
        'name' => __( 'pricing table', 'alpha' ),
        'id' => $prefix . 'pricing_table',
        'type' => 'group',
    ) );
        $cmb->add_group_field($group, array(
        'name' => __( 'Caption', 'alpha' ),
        'id' => $prefix . 'caption',
        'type' => 'text'
    ) );
    $cmb->add_group_field( $group,array(
        'name' => __( 'pricing option', 'alpha' ),
        'id' => $prefix . 'pricing_option',
        'type' => 'text',
        'repeatable'=>true
    ) );
    $cmb->add_group_field($group, array(
        'name' => __( 'price', 'alpha' ),
        'id' => $prefix . 'price',
        'type' => 'text'
    ) );

}
add_action( 'cmb2_init', 'cmb2_add_pricingTable' );
/*
 * Services
 */

function cmb2_add_services() {

    $prefix = '_alpha_';

    $cmb = new_cmb2_box( array(
        'id'           => $prefix . 'services',
        'title'        => __( 'services', 'alpha' ),
        'object_types' => array( 'page' ),
        'context'      => 'normal',
        'priority'     => 'default',
    ) );

    $group=$cmb->add_field( array(
        'name' => __( 'services', 'alpha' ),
        'id' => $prefix . 'services',
        'type' => 'group',
    ) );

    $cmb->add_group_field( $group,array(
        'name' => __( 'icon', 'alpha' ),
        'id' => $prefix . 'icon',
        'type' => 'text',
    ) );

    $cmb->add_group_field( $group,array(
        'name' => __( 'tittle', 'alpha' ),
        'id' => $prefix . 'tittle',
        'type' => 'text',
    ) );

    $cmb->add_group_field($group, array(
        'name' => __( 'content', 'alpha' ),
        'id' => $prefix . 'content',
        'type' => 'textarea',
    ) );

}
add_action( 'cmb2_init', 'cmb2_add_services' );