<?php
//https://www.wp-hasty.com/tools/wordpress-custom-post-type-generator/
//code generator.kono kisu lekhar proyojon hoy na.
require_once get_theme_file_path('/inc/tgm.php');
require_once get_theme_file_path('/inc/cmb2-attached.php');

require_once get_theme_file_path("lib/csf/codestar-framework.php");
if(class_exists("attachments")) {
    require_once get_theme_file_path('/inc/attachments.php');
}
if(site_url()=="http://localhost/wordpress/"){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get("Version"));
}
function philosophy_setup_theme(){
    load_theme_textdomain("philosophy");
    add_theme_support("featured-image");
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo");
    add_theme_support('html5',array('search-form','Comment-list'));
    add_theme_support("post-formats",array('image','video','audio','quote','gallery','link'));
    add_editor_style("/assets/css/editor-main.css");
    register_nav_menu("topMenu",__("Top Menu","alpha"));
    register_nav_menus(array(
        "footerLeft"=>__("Footer Left","philosophy"),
        "footerMid"=>__("Footer Mid","philosophy"),
        "footerRight"=>__("Footer Right","philosophy")

    ));
    add_image_size("philosophy-home-square",400,400,true);
}
add_action("after_setup_theme","philosophy_setup_theme");

function philosophy_assets_setup(){
        wp_enqueue_style("base-css",get_theme_file_uri("/assets/css/base.css"),null,VERSION);
        wp_enqueue_style("vendor-css",get_theme_file_uri("/assets/css/vendor.css"),null,VERSION);
        wp_enqueue_style("main-css",get_theme_file_uri("/assets/css/main.css"),null,VERSION);
        wp_enqueue_style("font-awesome",get_theme_file_uri("assets/css/font-awesome/css/font-awesome.css"),null,VERSION);
        wp_enqueue_style("fonts-css",get_theme_file_uri("assets/css/fonts.css"),null,VERSION);
        wp_enqueue_style("style-css",get_stylesheet_uri(),null,time());
        wp_enqueue_script("modernizr-js",get_theme_file_uri("/assets/js/modernizr.js"),null,VERSION);
        wp_enqueue_script("pace-js",get_theme_file_uri("/assets/js/pace.min.js"),null,VERSION);
        wp_enqueue_script("plugins-js",get_theme_file_uri("/assets/js/plugins.js"),array("jquery"),"0.0.1",true);
        wp_enqueue_script("main-js",get_theme_file_uri("/assets/js/main.css"),array("jquery"),time(),true);

}

add_action("wp_enqueue_scripts","philosophy_assets_setup");

function philosophy_pagination(){
    global $wp_query;
    $links= paginate_links(array(
        'current'=>max(1,get_query_var("paged")),
        'total'=>$wp_query->max_num_pages,
        'type'=>"list",
        'mid_size'=>3,
    ));
    $links=str_replace("page-numbers",'pgn__num',$links);
    $links=str_replace("<ul class='pgn__num'>",'<ul>',$links);
    $links=str_replace("prev pgn__num",'pgn__prev',$links);
    $links=str_replace("next pgn__num",'pgn__next',$links);
    echo $links;
}

remove_action("term_description","wpautop");

function philosophy_about_us_widgets(){
    register_sidebar(array(
                'name'=>__("About Us","philosophy"),
                'id'=>"about-us",
                'description'   =>__("About US","philosophy"),
                'before_widget' => '<div id="%1$s" class="col-block %2$s">',
                'after_widget'  => "</div>",
                'before_title'  => '<h3 class="quarter-top-margin">',
                'after_title'   => "</h3>",
    ));
    register_sidebar(array(
        'name'=>__("Google Maps","philosophy"),
        'id'=>"google-maps",
        'description'   =>__("Google Maps","philosophy"),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '',
        'after_title'   => '',
    ));
    register_sidebar(array(
        'name'=>__("contact Us","philosophy"),
        'id'=>"contact-us",
        'description'   =>__("Contact US","philosophy"),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => "</h3>",
    ));
    register_sidebar(array(
        'name'=>__("Before footer section","philosophy"),
        'id'=>"before-footer",
        'description'   =>__("Before footer section","philosophy"),
        'before_widget' => '<h3 id="%1$s" class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h3>',
        'after_title'   => "</h3>",
    ));
    register_sidebar(array(
        'name'=>__("footer bottom Right","philosophy"),
        'id'=>"footer-bottom",
        'description'   =>__("footer bottom Right","philosophy"),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '<h4>',
        'after_title'   => "</h4>",
    ));
    register_sidebar(array(
        'name'=>__("footer bottom bottom","philosophy"),
        'id'=>"footer-bottom-bottom",
        'description'   =>__("footer bottom bottom","philosophy"),
        'before_widget' => '<div id="%1$s" class= s-footer__linklist "%2$s">',
        'after_widget'  => "</div>",
        'before_title'  => '',
        'after_title'   => "",
    ));
}

add_action("widgets_init","philosophy_about_us_widgets");



function philosophy_search_form(){
    $action_url=home_url("/");
    $label_text=__("Search for:","philosophy");
    $button_label=__("Search","philosophy");
    $post_type=<<<PT
         <input type="hidden" name="post_type" value="post">
PT;
    if(is_post_type_archive('book')) {
        $post_type = <<<PT
        <input type="hidden" name="post_type" value="book">
PT;
    }

    $newform=<<<FORM
 <form role="search" method="get" class="header__search-form" action="{$action_url}">
                        <label>
                            <span class="hide-content">{$label_text}</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label_text}" autocomplete="off">
                        </label>
                     {$post_type}
                        <input type="submit" class="search-submit" value="{$button_label}">
             </form>
FORM;
return $newform;

}

add_filter("get_search_form","philosophy_search_form");

function philosophy_after_title($text){

    return strtoupper("Learn More"." ".$text." "."Us");

}

add_filter("philosophy_after_title","philosophy_after_title");

//url er link change er jonno.


function philosophy_change_post_url_link($post_link,$id){
    $p=get_post($id);
    if(is_object($id) && 'chapter'==get_post_type($id)){
        $parent_post_id=get_field("parent_book");
        $parent_post=get_post($parent_post_id);
        if($parent_post){
            $post_link=str_replace("%book%",$parent_post->post_name,$post_link);
        }

    }
    if(is_object($p) &&'book'==get_post_type($p)){
        $genre=wp_get_post_terms($p->ID,'genre');
        if(is_array($genre)&& count($genre)>0){
            $slug=$genre[0]->slug;
            $post_link=str_replace("%genre%",$slug,$post_link);
        }else{
            $slug="generic";
            $post_link=str_replace("%genre%",$slug,$post_link);
        }
        

    }
    return $post_link;
}

add_filter("post_type_link","philosophy_change_post_url_link",1,2);

function philosophy_language_heading($tittle){
    if(is_post_type_archive("book")|| is_tax("language")){
        $tittle=__("Language","philosophy");

    }
    return $tittle;

}

add_filter("philosophy_tag_heading","philosophy_language_heading");

function philosophy_language_value($trams){
    // tax mane taxonomy page kina.
    if(is_post_type_archive("book")||is_tax("language")){
        $trams=get_terms(array(
            "taxonomy"=>'language',
            "hide_empty"=>false
            
        ));

    }
    return $trams;
}
add_filter("philosophy_tags_value","philosophy_language_value");
function change_word_Count_heading($heading){
    $heading="total words";
    return $heading;


}

add_filter("WORD_COUNT_Heading","change_word_Count_heading");

function change_word_Count_tags($tags){
    $tags="h6";
    return $tags;

}

add_filter("WORD_COUNT_TAGS","change_word_Count_tags");
function Require_excloud_post_type($postType){
    //$postType[]="page";
  array_push($postType,'page');
  return $postType;

}
add_filter("excloud_post_type","Require_excloud_post_type");
//function change_dimention_height_width($dimention){
//    $dimention="200x200";
//    return $dimention;
//
//}
//
//add_filter("size_height_width","change_dimention_height_width");

function pqrc_countries($countries){
    array_push($countries,"China","khan");
 return $countries;

}

add_filter('pqrc_countries',"pqrc_countries");