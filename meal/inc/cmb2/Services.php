<?php
if(class_exists("CMB2_Bootstrap_270")){
    function cmb2_add_Services() {
        $section_id=null;

        if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
            $section_id=empty($_REQUEST['post_ID'])?$_REQUEST["post"]:$_REQUEST["post_ID"];
        }
        $section_type=get_post_meta($section_id,'select_section_type',true);
        if(!$section_id||$section_type!="Services"){
            return;
        }
        $prefix = '_meal_';

        $cmb = new_cmb2_box( array(
            'id'           => $prefix . 'Services_settings',
            'title'        => __( 'Services Settings', 'meal' ),
            'object_types' => array( 'section' ),
            'context'      => 'normal',
            'priority'     => 'default',

        ) );

        $group=$cmb->add_field( array(
            'name' => __( 'Services', 'meal' ),
            'id' => $prefix . 'services',
            'type' => 'group',
            'options'=>array(
                'add_button'    => __( 'New Services', 'meal' ),
                'remove_button' => __( 'Remove', 'meal' ),
            )

        ) );
        $cmb->add_group_field($group, array(
                'name' => __( 'Icon', 'meal' ),
                'id' => $prefix . 'icon',
                'type' => 'select',
                'options' => array(
                    'flaticon-soup' => __( 'Soup', 'meal' ),
                    'flaticon-vegetables' => __( 'Vegetables', 'meal' ),
                    'flaticon-pancake' => __( 'Pancake', 'meal' ),
                    'flaticon-tray' => __( 'Tray', 'meal' ),
                    'flaticon-salad' => __( 'Salad', 'meal' ),
                    'flaticon-chicken' => __( 'Chicken', 'meal')
                ),

            )
        );
        $cmb->add_group_field( $group,array(
            'name' => __( 'Title', 'meal' ),
            'id' => $prefix . 'title',
            'type' => 'text',

        ) );

        $cmb->add_group_field( $group,array(
            'name' => __( 'Description', 'meal' ),
            'id' => $prefix . 'description',
            'type' => 'textarea',

        ) );



    }
    add_action( 'cmb2_init', 'cmb2_add_Services' );
}