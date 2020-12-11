<?php

//require_once get_theme_file_path('/inc/acf-mb.php');
require_once get_theme_file_path('/inc/tgm.php');
require_once get_theme_file_path('/inc/cmb2-mb.php');
//attchments doucumention uses so ache ki ki kora lagbe
if(class_exists("Attachments")){
    require_once "lib/attachments.php";
}
if(site_url()=="http://localhost/wordpress/"){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get("Version"));
}


function alpha_setup_theme(){
    load_theme_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("featured-image");
    add_theme_support("title-tag");
    $alpha_header_text_details=array(
      'width'=>1200,
        'height'=>600,
        'flex-height'=>true,
        'flex-width'=>true

    );
    add_theme_support("custom-header", $alpha_header_text_details);
    $alpha_custom_logo_details=array(
        'width'=>'100',
        'height'=>'100',

    );
    add_theme_support("custom-logo",$alpha_custom_logo_details);
    add_theme_support("custom-background");
    add_theme_support("post-formats",array('image','video','audio','link','quote','galley'));
    add_theme_support( 'html5', array( 'search-form' ) );
    //ai disgain er jonno get_search_form lekhe search dibo. and searchform name php file toiri korbo.
    add_theme_support("html5",array("search-form","comment-list"));
    register_nav_menu("topMenu",__("Top Menu","alpha"));
    register_nav_menu("footerMenu",__("Footer Menu","alpha"));
    add_theme_support("post-formats",array('audio','video','image','link','quote',"gallery",'status'));
    add_image_size("alpha_squery",400,400,true);
    add_image_size("alpha_landscape",400,300,true);
    add_image_size("alpha_portrait",400,500,true);
    add_image_size("alpha_landscape_soft",800,700);
    add_image_size("alpha_center_center",500,300,array("center","center"));
    add_image_size("alpha_right_top",400,500,array("left","top"));
    add_image_size("alpha_center_center",501,401,array("center","center"));

}
add_action("after_setup_theme","alpha_setup_theme");

function alpha_assets(){

    wp_enqueue_style("alpha-bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("featherLight-css",'//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
    wp_enqueue_style("dashicons");
    wp_enqueue_style("tiny_css","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css",null,VERSION);

    wp_enqueue_style("font-awesome-css","//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style("alpha-css",get_stylesheet_uri(),null,VERSION);

    wp_enqueue_script("featherLight-js",'//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js',array("jquery",'0.0.1',true));
    wp_enqueue_script("tiny-js","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js",null,"0.0.1",true);
    wp_enqueue_script("main-js",get_theme_file_uri("/assets/js/main.css"),array("jquery"),time(),true);
}
add_action("wp_enqueue_scripts","alpha_assets");
//admin panel er post format change er jonno assets.
function alpha_admin_assets($hook){
    if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
        $post_id=empty($_REQUEST['post_ID'])?$_REQUEST["post"]:$_REQUEST["post_ID"];
    }
    if("post.php"==$hook){
        $post_format=get_post_format($post_id);
        wp_enqueue_script("alpha-admin-js",get_theme_file_uri("/assets/js/admin.js"),array("jquery"),VERSION,true);
        wp_localize_script("alpha-admin-js","alpha_pf",array("format"=>$post_format));
    }
}
add_action("admin_enqueue_scripts","alpha_admin_assets");
function alpha_sidebar_register(){
    register_sidebar(
        array(
        'name'          => __('single post  right Sidebar','alpha'),
        'id'            => 'sidebar-1',
        'description'=>__("right sidebar"),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar(
        array(
            'name'          => __('footer right sidebar','alpha'),
            'id'            => 'footer-1',
            'description'=>__("Footer  right sidebar"),
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="rounded">',
            'after_title'   => '</h2>',
        ) );
    register_sidebar(
        array(
            'name'          => __(' footer left Sidebar','alpha'),
            'id'            => 'footer-2',
            'description'=>__("Footer left sidebar"),
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="rounded">',
            'after_title'   => '</h2>',
        ) );

}
add_action("widgets_init","alpha_sidebar_register");
function alpha_excerpt_post($excerpt)

{
    if(!post_password_required()){
        return $excerpt;
    }else{
        echo get_the_password_form();
    }

}
add_filter("the_excerpt","alpha_excerpt_post");
function alpha_remove_protected_name(){
    return "%s";
}
add_filter("protected_title_format","alpha_remove_protected_name");
function alpha_Add_nav_menu_css($classes,$item){
$classes[]='list-inline-item';
return $classes;
}

add_filter("nav_menu_css_class","alpha_Add_nav_menu_css",10,2);
//aita use kora hobe child theme function override korar jonno.
if(!function_exists("alpha_about_page_banner_style")){
function alpha_about_page_banner_style(){
   if(is_page()){
       $alpha_feat_image_url=get_the_post_thumbnail_url(null,"large");
    ?>
    <style>
        .page-header {
            background-image: url(<?php echo $alpha_feat_image_url;?>)
        }
    </style>
<?php
}
   if(is_front_page()){
       if(current_theme_supports("custom-header")){
           ?>
           <style>
               .header{
                   background-image: url(<?php echo header_image();?>);
                   margin-bottom: 50px;
                   background-size: cover;
               }
               .header h1.heading a,h3,tagline {
                   color: #<?php echo get_header_textcolor();?>;

               <?php
                      if(!display_header_text()){
                          echo "display: none;";
                      }
             ?>
               }
           </style>
        <?php
       }
   }
}
}
add_action("wp_head","alpha_about_page_banner_style",11);
function alpha_body_class($classes){
    unset($classes[array_search("first-class",$classes)]);
    unset($classes[array_search("3rd-class",$classes)]);
    //add-class
    $classes[]="new_class";
    return $classes;

}
add_filter("body_class","alpha_body_class");
function alpha_post_class($classes){
    unset($classes[array_search('first-class',$classes)]);
    return $classes;

}
add_filter("post_class","alpha_post_class");
//search hilight er kaj korbo

function alpha_highlight_search_results($text){
    if(is_search()){
        $pattern='/('.join('|',explode(' ',get_search_query())).')/i';
        $text=preg_replace($pattern,'<span class="search_highlight">\0</span>',$text);
    }
    return $text;
}
    add_filter("the_content","alpha_highlight_search_results");
    add_filter("the_excerpt","alpha_highlight_search_results");
    add_filter("the_title","alpha_highlight_search_results");

    //ai function ta use hoy wordpress nije nije image crop kore boro hight width er upor vitti kore.
//ao problem ka dur korea er jonno.
//    function alpha_src_set(){
//        return null;
//    }
//
//    add_filter("wp_calculate_image_srcset","alpha_src_set");
    add_filter("wp_calculate_image_srcset","__return_null");
//wp query er maddhome amarao kisu post k dekhabo na er jonno amra hug e giye pre_get_post;
    //tag_not_in array

        function alpha_wp_query_hide_spechific_post($wpq)
        {
            if (is_home()) {
                $wpq->set("post__not_in", array(7));
            }
        }

        add_action("pre_get_posts","alpha_wp_query_hide_spechific_post");
        //aita user k dekhabo na.
       // add_filter('acf/settings/show_admin', '__return_false');
