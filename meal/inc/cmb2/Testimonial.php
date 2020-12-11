<?php
if(class_exists("CMB2_Bootstrap_270")){
    function cmb2_add_Testimonial() {
        $section_id=null;

        if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
            $section_id=empty($_REQUEST['post_ID'])?$_REQUEST["post"]:$_REQUEST["post_ID"];
        }
        $section_type=get_post_meta($section_id,'select_section_type',true);
        if(!$section_id||$section_type!="Testimonial"){
            return;
        }
        $prefix = '_meal_';

        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'Testimonial_settings',
            'title'        => __( 'Testimonial Settings', 'meal' ),
            'object_types' => array( 'section' ),
            'context'      => 'normal',
            'priority'     => 'default',

        ) );

        $group=$cmb->add_field( array(
            'name' => __( 'Testimonial', 'meal' ),
            'id' => $prefix . 'testimonial',
            'type' => 'group',
            'options'=>array(
                'add_button'    => __( 'New Testimonial', 'meal' ),
                'remove_button' => __( 'Remove', 'meal' ),
            )

        ) );
        $cmb->add_group_field($group, array(
            'name' => __( 'BIO', 'meal' ),
            'id' => $prefix . 'bio',
            'type' => 'textarea',

            )
        );
        $cmb->add_group_field($group, array(
            'name' => __( 'image', 'meal' ),
            'id' => $prefix . 'image',
            'type' => 'file',
            "text"=>array(
                "add_upload_file_text"=>__(" Add image","meal"),
            ),

        ) );
        $cmb->add_group_field( $group,array(
            'name' => __( 'Name', 'meal' ),
            'id' => $prefix . 'name',
            'type' => 'text',

        ) );
        $cmb->add_group_field( $group,array(
            'name' => __( 'Position', 'meal' ),
            'id' => $prefix . 'position',
            'type' => 'text',

        ) );


    }
    add_action( 'cmb2_init', 'cmb2_add_Testimonial' );
}