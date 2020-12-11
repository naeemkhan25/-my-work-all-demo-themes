<?php
function cust_customize_register($wp_customize){
    $wp_customize->add_section('cust_services',array(
        'title' => __( 'Services',"customize"),
        'priority' => '30',
        'active_callback'=>function(){
        return is_page_template("page-templates/landing.php");
    }
    ));
    $wp_customize->add_setting('cust_services_heading',array(
        'default' => 'Mission statement',
        "transport"=>'postMessage',
        //java the code patay
    ));
    $wp_customize->add_control('cust_services_control',array(
        'label' => __( 'mission Heading',"customize" ),
        'section' => 'cust_services',
        'settings'=>'cust_services_heading',
        'type'=>'text'

    ));
    $wp_customize->add_setting('cust_services_description',array(
        "transport"=>'refresh',
    ));
    $wp_customize->add_control('cust_services_control2',array(
        'label' => __( 'mission Heading description',"customize" ),
        'section' => 'cust_services',
        'settings'=>'cust_services_description',
        'type'=>'textarea'
    ));
    $wp_customize->add_setting('cust_services_description_check',array(
        "default"=>1,
        "transport"=>'refresh',
    ));
    $wp_customize->add_control('cust_services_control_for_description_control',array(
        'label' => __( 'mission Heading description checkbox',"customize" ),
        'section' => 'cust_services',
        'settings'=>'cust_services_description_check',
        'type'=>'checkbox'

    ));
    $wp_customize->add_setting('cust_services_icon_color',array(
        "default"=>'#dd2d6a',
        "transport"=>'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"cust_icon_color",array(
        'label' => __( 'Select Your icone Color',"customize" ),
        'section' => 'cust_services',
        'settings'=>'cust_services_icon_color',
    )));
    $wp_customize->add_setting('cust_services_row',array(
        "default"=>'4',
        "transport"=>'refresh',
    ));
    $wp_customize->add_control('cust_service_row_control',array(
            'label' => __( 'select per page services row',"customize" ),
            'section' => 'cust_services',
            'settings'=>'cust_services_row',
            'type'=>'select',
            'choices'=>array(
                "4"=>__("per row 3","customize"),
                '6'=>__("per row 2",'customize'),
            )
        )
    );
    /*
     * about section
     */
    $wp_customize->add_section('cust_about_page_section',array(
        'title' => __( 'About page',"customize"),
        'priority' => '50',
        'active_callback'=>function(){
            return is_page_template("page-templates/about.php");
        }
    ));
    $wp_customize->add_setting('cust_about_page_heading',array(
        'default' => 'about page',
        "transport"=>'postMessage',


    ));
    $wp_customize->add_control('cust_about_page_heading',array(
        'label' => __( 'about page heading',"customize" ),
        'section' => 'cust_about_page_section',
        'type'=>'text',
    ));
    $wp_customize->selective_refresh->add_partial("about_select",array(
        'selector'=>'#aboutHeading',
        'settings'=>'cust_about_page_heading',
        'render_callback'=>function(){
            return get_theme_mod("cust_about_page_heading");
        }
    ));
    $wp_customize->add_setting('cust_about_page_heading_description',array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque esse nobis recusandae ullam
        unde.',
        "transport"=>'postMessage',


    ));
    $wp_customize->add_control('cust_about_page_heading_description',array(
        'label' => __( 'about page description',"customize" ),
        'section' => 'cust_about_page_section',
        'type'=>'textarea',
    ));
    $wp_customize->selective_refresh->add_partial("about_select2",array(
        'selector'=>'#subheading-about',
        'settings'=>'cust_about_page_heading_description',
        'render_callback'=>function(){
            return get_theme_mod("cust_about_page_heading_description");
        }
    ));
    $wp_customize->add_section('cust_image_upload',array(
        'title' => __( ' image upload',"customize"),
        'priority' => '50',

    ));
    $wp_customize->add_setting('cust_image_upload_settings',array(
        "transport"=>'refresh',

    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'image',
            array(
                'label'      => __( 'Upload a image', 'theme_name' ),
                'section'    => 'cust_image_upload',
                'settings'   => 'cust_image_upload_settings',

            )
        )
    );


    /*
     * other sections
     */
    $wp_customize->add_section('cust_other_services',array(
        'title' => __( 'Other Services',"customize"),
        'priority' => '40'
    ));
    $wp_customize->add_setting('cust_other_services_heading',array(
        'default'=>'choices4',
        "transport"=>'refresh'
    ));
    $wp_customize->add_control('cust_other_services_control',array(
        'label' => __( 'chaices your services',"customize" ),
        'section' => 'cust_other_services',
        'settings'=>'cust_other_services_heading',
        'type'=>'radio',
        "choices"=>array(
            "choices1"=>__("Choices One","customizer"),
            "choices2"=>__("Choices two","customizer"),
            "choices3"=>__("Choices Three","customizer"),
            "choices4"=>__("Choices Four","customizer"),
        )

    ));

    $wp_customize->add_setting('cust_other_drop_services_heading',array(
        'default'=>'choices4',
        "transport"=>'refresh'
    ));
    $wp_customize->add_control('cust_other_drop_services_control',array(
        'label' => __( 'choices Your drop services',"customize" ),
        'section' => 'cust_other_services',
        'settings'=>'cust_other_drop_services_heading',
        'type'=>'select',
        "choices"=>array(
            "choices1"=>__("Choices One","customizer"),
            "choices2"=>__("Choices two","customizer"),
            "choices3"=>__("Choices Three","customizer"),
            "choices4"=>__("Choices Four","customizer"),
        )

    ));
    $wp_customize->add_setting('cust_other_drop_pages',array(
        "transport"=>'refresh'
    ));
    $wp_customize->add_control('cust_other_drop_pages_control',array(
        'label' => __( 'choices your pages',"customize" ),
        'section' => 'cust_other_services',
        'settings'=>'cust_other_drop_pages',
        'type'=>'dropdown-pages',
        'allow_addition'=>true
    ));


}
add_action("customize_register","cust_customize_register");