<?php
require_once get_theme_file_path("/inc/acf/page.php");
require_once get_theme_file_path("/inc/acf/sections-metaboxes.php");
require_once get_theme_file_path("/inc/acf/featured.php");
require_once get_theme_file_path("/inc/acf/recipe-price.php");
require_once get_theme_file_path("/inc/cmb2/Gallery.php");
require_once get_theme_file_path("/inc/cmb2/Chefs.php");
require_once get_theme_file_path("/inc/cmb2/Services.php");
require_once get_theme_file_path("/inc/cmb2/Testimonial.php");


if(site_url()=="http://localhost/khan"){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get("Version"));
}
function meal_setup_theme(){
    load_theme_textdomain("meal",get_template_directory().'/languages');
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("automatic_feed_links");
    add_theme_support("html5",array("search-form","comment-list","comment-form","gallery","caption"));
    add_theme_support("custom-logo");
    add_image_size("meal-square",400,400,true);
    add_image_size("meal-square2",100,100,true);
    register_nav_menu("primary",__("side Menu","meal"));


}
add_action("after_setup_theme","meal_setup_theme");

function meal_assets(){
            wp_enqueue_style("fonts-googleapis","//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700");
             wp_enqueue_style("bootstrap-css",get_theme_file_uri("/assets/css/bootstrap.css"),null,VERSION);
             wp_enqueue_style("animate-css",get_theme_file_uri("/assets/css/animate.css"),null,VERSION);
             wp_enqueue_style("owl-carousel-css",get_theme_file_uri("/assets/css/owl.carousel.min.css"),null,VERSION);
             wp_enqueue_style("magnific-css",get_theme_file_uri("/assets/css/magnific-popup.css"),null,VERSION);
             wp_enqueue_style("aos-css",get_theme_file_uri("/assets/css/aos.css"),null,VERSION);
             wp_enqueue_style("datepicker-css",get_theme_file_uri("/assets/css/bootstrap-datepicker.css"),null,VERSION);
             wp_enqueue_style("timepicker-css",get_theme_file_uri("/assets/css/jquery.timepicker.css"),null,VERSION);
             wp_enqueue_style("fonts-icons-css",get_theme_file_uri("/assets/fonts/ionicons/css/ionicons.min.css"),null,VERSION);
             wp_enqueue_style("fontawesome-css",get_theme_file_uri("/assets/fonts/fontawesome/css/font-awesome.min.css"),null,VERSION);
             wp_enqueue_style("flaticon-css",get_theme_file_uri("/assets/fonts/flaticon/font/flaticon.css"),null,VERSION);
             wp_enqueue_style("portfolio-css",get_theme_file_uri("/assets/css/portfolio.css"),null,VERSION);
             wp_enqueue_style("style-css",get_theme_file_uri("/assets/css/style.css"),null,VERSION);

             wp_enqueue_style("meal-css",get_stylesheet_uri(),null,VERSION);

             wp_enqueue_script("popper-js",get_theme_file_uri("/assets/js/popper.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("bootstrap-js",get_theme_file_uri("/assets/js/bootstrap.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("owl-carousel-js",get_theme_file_uri("/assets/js/owl.carousel.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("waypoints-js",get_theme_file_uri("/assets/js/jquery.waypoints.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("magnific-popup-js",get_theme_file_uri("/assets/js/jquery.magnific-popup.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("bootstrap-datepicker-js",get_theme_file_uri("/assets/js/bootstrap-datepicker.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("timepicker-js",get_theme_file_uri("/assets/js/jquery.timepicker.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("stellar-js",get_theme_file_uri("/assets/js/jquery.stellar.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("easing-js",get_theme_file_uri("/assets/js/jquery.easing.1.3.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("aos-js",get_theme_file_uri("/assets/js/aos.js"),array("jquery"),VERSION,true);
            wp_enqueue_script("maps-js","//maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s",null,VERSION,true);
             wp_enqueue_script("imagesloaded-js",get_theme_file_uri("/assets/js/imagesloaded.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("isotope-js",get_theme_file_uri("/assets/js/isotope.pkgd.min.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("portfolio-js",get_theme_file_uri("/assets/js/portfolio.js"),array("jquery","magnific-popup-js","imagesloaded-js","isotope-js"),time(),true);

             wp_enqueue_script("main-js",get_theme_file_uri("/assets/js/main.js"),array("jquery"),VERSION,true);
             wp_enqueue_script("loadmore-js",get_theme_file_uri("/assets/js/loadmore.js"),array("jquery"),VERSION,true);



             wp_enqueue_script("ajax-js",get_theme_file_uri("/assets/js/ajax.js"),array("jquery"),VERSION,true);
                $ajaxurls=admin_url("admin-ajax.php");
            wp_localize_script("ajax-js","urls",array("adminurls"=>$ajaxurls));
             wp_enqueue_script("contact-js",get_theme_file_uri("/assets/js/contact.js"),array("jquery"),VERSION,true);
            wp_localize_script("contact-js","urls",array("adminurls"=>$ajaxurls));

            wp_localize_script("portfolio-js","protfolio",array("ajaxurls"=>$ajaxurls));



}

add_action("wp_enqueue_scripts","meal_assets");

function meal_admin_assets($hook){
    $section_id=null;

    if(isset($_REQUEST['post'])||isset($_REQUEST['post_ID'])){
        $section_id=empty($_REQUEST['post_ID'])?$_REQUEST["post"]:$_REQUEST["post_ID"];
    }
if("section"==get_post_type($section_id)){
    wp_enqueue_script("admin-js",get_theme_file_uri("/assets/js/admin.js"),array("jquery"),VERSION,true);
}

}


add_action("admin_enqueue_scripts","meal_admin_assets");


function meal_reservation(){
    if(check_ajax_referer("reservation","s")){
        $name=sanitize_text_field($_POST["name"]);
        $email=sanitize_text_field($_POST["email"]);
        $phone=sanitize_text_field($_POST["phone"]);
        $persons=sanitize_text_field($_POST["persons"]);
        $date=sanitize_text_field($_POST["date"]);
        $time=sanitize_text_field($_POST["time"]);

        $info=array(
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'persons'=>$persons,
            'date'=>$date,
            'time'=>$time
        );
//        print_r($info);


        $argument=array(
            'post_type'=>'reservation',
            'post_status'=>'publish',
            'post_author'=>1,
            'post_date'=>date('Y-m-d H:i:s'),
            'meta_input'=>$info,
            'post_title'=>sprintf("%s - Reservation for %s person on %s-%s",$name,$persons,$date." : ".$time,$email)

        );

        $duplicate_reservations=new WP_Query(array(
            "post_type"=>'reservation',
            'post_status'=>'publish',
            "meta_query"=>array(
                "relation"=>"AND",
                'email_check'=>array(
                    'key'=>'email',
                    'value'=>$email,
                ),
                'date_check'=>array(
                    'key'=>'date',
                    'value'=>$date,
                ),
                'time_check'=>array(
                    'key'=>'time',
                    'value'=>$time,
                ),

            )

        ));
        if($duplicate_reservations->found_posts>0){
            echo "Duplicate";
        }else{
            $wp_error='';
           $reservation_id=wp_insert_post($argument,$wp_error);
            $reservation_count=get_transient("res_count")?get_transient("res_count"):0;
            if(!$wp_error){
                $reservation_count++;
                set_transient("res_count",$reservation_count,0);
                $_name=explode(" ",$name);
                $order_data=array(
                  "first_name"=>$_name[0],
                    "last_name"=>isset($_name[1])?$_name[1]:'',
                    "email"=>$email,
                    "phone"=>$phone
                );
                $order=wc_create_order();
                $order->set_address($order_data);
                $order->add_product(wc_get_product(361),1);
                $order->set_customer_note($reservation_id);
                $order->calculate_totals();
                add_post_meta($reservation_id,"oreder_id",$order->get_id());
                echo $order->get_checkout_payment_url();
            }
        }

    }else{
        echo "NOT allowed";
    }
    die();
}

add_action("wp_ajax_reservation","meal_reservation");
add_action("wp_ajax_nopriv_reservation","meal_reservation");
function wc_remove_checkout_fields( $fields ) {
// Billing fields
unset( $fields['billing']['billing_company'] );
unset( $fields['billing']['billing_state'] );
unset( $fields['billing']['billing_address_1'] );
unset( $fields['billing']['billing_address_2'] );
unset( $fields['billing']['billing_city'] );
unset( $fields['billing']['billing_postcode'] );

// Shipping fields
unset( $fields['shipping']['shipping_company'] );
unset( $fields['shipping']['shipping_phone'] );
unset( $fields['shipping']['shipping_state'] );
unset( $fields['shipping']['shipping_first_name'] );
unset( $fields['shipping']['shipping_last_name'] );
unset( $fields['shipping']['shipping_address_1'] );
unset( $fields['shipping']['shipping_address_2'] );
unset( $fields['shipping']['shipping_city'] );
unset( $fields['shipping']['shipping_postcode'] );

// Order fields
unset( $fields['order']['order_comments'] );

return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );
function meal_order_status_processing($order_id){
    $order=wc_get_order($order_id);
    $reservation_id=$order->get_customer_note();
    if($reservation_id){
        $reservation=get_post($reservation_id);
        wp_update_post(array(
            "ID"=>$reservation_id,
            "post_title"=>"[Paid]-" . $reservation->post_title,
        ));
        add_post_meta($reservation_id,"paid",true);
    }

}

add_filter('woocommerce_order_status_processing',"meal_order_status_processing");
function meal_change_menu($menu){
//    echo "<pre>";
//    print_r($menu);
//    echo "</pre>";
//    die();
    $reservation_count=get_transient("res_count")?get_transient("res_count"):0;
   if($reservation_count>0) {
       $menu[5][0] = "Reservation <span class=awaiting-mod>{$reservation_count}</span>";
   }
   return $menu;
}
add_filter("add_menu_classes","meal_change_menu");

function meal_change_reserve_menu($hook){
    $current_edit_page=get_current_screen();

    if("edit.php"===$hook|| "reservation"==$current_edit_page->post_type){

        delete_transient("res_count");
    }

}
add_action("admin_enqueue_scripts","meal_change_reserve_menu");
function meal_contact(){
    if(check_ajax_referer("contact","nonce")){
        $name=isset($_POST["name"])?($_POST["name"]):'';
        $email=isset($_POST["email"])?($_POST["email"]):'';
        $phone=isset($_POST["phone"])?($_POST["phone"]):'';
        $message=isset($_POST["message"])?($_POST["message"]):'';
      $_message=sprintf("%s \nForm: %s\nEmail %s\nphone %s",$message,$name,$email,$phone);
//postfix pakage use korbo valo vabe email send
        //post mark plugin instol korbo and app e giye account khulbo.
        //form oi khane theke email jabe
    $admin_email=get_option("admin_email");
  wp_mail("$admin_email",__("Someone tried to contact You","meal"),$_message,"Form: 'naeemkhan.cse@gmail.com'\r\n");
  die("success");
    }
}
add_action("wp_ajax_contact","meal_contact");
add_action("wp_ajax_nopriv_contact","meal_contact");

function meal_nav_manus_change_menu_url($menus){

    $string_to_replace=home_url("/")."section/";
    if(is_front_page()) {
    foreach ($menus as $menu){
           $new_url = str_replace($string_to_replace, "#", $menu->url);
           if($new_url!=$menu->url){
               $new_url=rtrim("$new_url","/");
           }
           $menu->url=$new_url;
       }

    }
    return $menus;

}

add_filter('wp_nav_menu_objects',"meal_nav_manus_change_menu_url");

function meal_comment_form($fields){
//   echo "<pre>";
//    print_r($fields);
//    echo "</pre>";
    $Comment_fields=$fields['comment'];
    unset($fields["comment"]);
    $fields["comment"]=$Comment_fields;

return $fields;
}
add_filter("comment_form_fields","meal_comment_form");

function meal_pricing_item_add_tikmark($item){
    if(trim($item)=="1"){
        return '<i class="fa fa-check plan-active-color fa-2x">';
    }elseif (trim($item)=='0'){
        return '<i class="fa fa-ellipsis-h plan-inactive-color fa-2x">';
    }
    return $item;
}
add_filter("meal_pricing_item","meal_pricing_item_add_tikmark");
function max_name_page_number(){
    global $wp_query;
    return $wp_query->max_num_pages;

}


function meal_Gallery_load_next_images(){
    print_r($_POST);
if(wp_verify_nonce($_POST['nonce'],"loadmoreaction")){
   die("vie");
}

}
add_action("wp_ajax_loadmoreaction","meal_Gallery_load_next_images");
add_action("wp_ajax_nopriv_loadmoreaction","meal_Gallery_load_next_images");
