<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f5f141fbde8c',
        'title' => 'Select section',
        'fields' => array(
            array(
                'key' => 'field_5f5f1434774f7',
                'label' => 'Banner image',
                'name' => 'banner_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f5f88a85ae26',
                            'operator' => '==',
                            'value' => 'Banner',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5f5f1534774fa',
                'label' => 'Button Title',
                'name' => 'button_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f5f88a85ae26',
                            'operator' => '==',
                            'value' => 'Banner',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f5f15aa774fb',
                'label' => 'Button Target',
                'name' => 'button_target',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f5f88a85ae26',
                            'operator' => '==',
                            'value' => 'Banner',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f5f88a85ae26',
                'label' => 'Select section type',
                'name' => 'select_section_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Banner' => 'Banner',
                    'Featured Recipes' => 'Featured Recipes',
                    'Gallery' => 'Gallery',
                    'Chef' => 'Chef',
                    'Menu' => 'Menu',
                    'Services' => 'Services',
                    'Reservation' => 'Reservation',
                    'Testimonial' => 'Testimonial',
                    'Contact' => 'Contact',
                ),
                'default_value' => 'Banner',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5f603603f78cc',
                'label' => 'Select Recipes',
                'name' => 'select_recipes',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f5f88a85ae26',
                            'operator' => '==',
                            'value' => 'Featured Recipes',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'recipes',
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
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'section',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;