<?php
if(site_url()=="http://localhost/wordpress/"){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get("Version"));
}
function launcher_setup(){
  load_theme_textdomain("launcher");
  add_theme_support("post-thumbnails");
  add_theme_support("title-tag");

}
add_action("after_setup_theme","launcher_setup");
function launcher_assets(){
   if(is_page()){
       $alpha_detect_page=basename(get_page_template());
       if($alpha_detect_page=='launcher.php'){
           wp_enqueue_style("animate-css",get_theme_file_uri("/assets/css/animate.css"));
           wp_enqueue_style("icomoon-css",get_theme_file_uri("/assets/css/icomoon.css"));
           wp_enqueue_style("bootstrap-css",get_theme_file_uri("/assets/css/bootstrap.css"));
           wp_enqueue_style("style-css",get_theme_file_uri("/assets/css/main.css"));
           wp_enqueue_style("launcher-css",get_stylesheet_uri(),null,VERSION);
           wp_enqueue_script("easing-js",get_theme_file_uri("assets/js/jquery.easing.1.3.js"),array("jquery"),"0.0.1",true);
           wp_enqueue_script("bootstrap-js",get_theme_file_uri("assets/js/bootstrap.min.js"),array("jquery"),"0.0.1",true);
           wp_enqueue_script("waypoints-js",get_theme_file_uri("assets/js/jquery.waypoints.min.js"),array("jquery"),"0.0.1",true);
           wp_enqueue_script("simplyCountdown-js",get_theme_file_uri("assets/js/simplyCountdown.js"),array("jquery"),"0.0.1",true);
           wp_enqueue_script("main-js",get_theme_file_uri("assets/js/main.css"),array("jquery"),time(),true);
           $launcher_year=get_post_meta(get_the_ID(),"year",true);
           $launcher_month=get_post_meta(get_the_ID(),"month",true);
           $launcher_day=get_post_meta(get_the_ID(),"day",true);
           wp_localize_script("main-js","dateData",array(
               'year'=> $launcher_year,
               'month'=> $launcher_month,
               'day'=>$launcher_day
           ));

       }else{
           wp_enqueue_style("launcher-css",get_stylesheet_uri(),null,VERSION);
           wp_enqueue_style("bootstrap-css",get_theme_file_uri("/assets/css/bootstrap.css"));
       }
   }

}


add_action("wp_enqueue_scripts","launcher_assets");
function alpha_sidebar_register(){
    register_sidebar(
        array(
            'name'          => __( 'footer right',"launcher" ),
            'id'            => 'footer-right',
            'description'   => __( 'footer Right',"launcher"),
            'before_widget' => '<div id="%1$s" class=" text-right widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'footer left',"launcher" ),
            'id'            => 'footer-left',
            'description'   => __( 'footer Left',"launcher"),
            'before_widget' => '<div id="%1$s" class="text-left widget list-inline-item %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action("widgets_init","alpha_sidebar_register");
function launcher_background_image_set(){
    if(is_page()){
        $post_thumbnails_image=get_the_post_thumbnail_url(null,"large");
        ?>
        <style>
            .home-site{
                background-image: url(<?php echo $post_thumbnails_image;?>);
            }

        </style>
        <?php
    }
}

add_action("wp_head","launcher_background_image_set");
