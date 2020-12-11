<?php
if(class_exists("CMB2_Bootstrap_270")){
    function cmb2_add_Gallery() {
        $section_id=null;

        if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
            $section_id=empty($_REQUEST['post_ID'])?$_REQUEST["post"]:$_REQUEST["post_ID"];
        }
        $section_type=get_post_meta($section_id,'select_section_type',true);
        if(!$section_id||$section_type!="Gallery"){
            return;
        }
        $prefix = '_meal_';

        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'Gallery_settings',
            'title'        => __( 'Gallery Settings', 'meal' ),
            'object_types' => array( 'section' ),
            'context'      => 'normal',
            'priority'     => 'default',

        ) );
        $cmb->add_field(array(
            'name' => __( 'Number Of images', 'meal' ),
            'id' => $prefix . 'nimages',
            'type' => 'text',
            "default"=>6

        ));

        $group=$cmb->add_field( array(
            'name' => __( 'Portfolio', 'meal' ),
            'id' => $prefix . 'Portfolio',
            'type' => 'group',
            'options'=>array(
                'add_button'    => __( 'New image', 'meal' ),
                'remove_button' => __( 'Remove', 'meal' ),
            )

        ) );
        $cmb->add_group_field($group, array(
            'name' => __( 'Title', 'meal' ),
            'id' => $prefix . 'title',
            'type' => 'text',

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
            'name' => __( 'categories', 'meal' ),
            'id' => $prefix . 'categories',
            'type' => 'text',

        ) );


    }
    add_action( 'cmb2_init', 'cmb2_add_Gallery' );
}