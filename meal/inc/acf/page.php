<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f5f0d94abe31',
        'title' => 'Sections',
        'fields' => array(
            array(
                'key' => 'field_5f5f0d9c1246b',
                'label' => 'Select Sections',
                'name' => 'select_sections',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'section',
                ),
                'taxonomy' => '',
                'filters' => '',
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'id',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-template/landing-page.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;