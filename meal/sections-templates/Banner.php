<?php
global $meal_section_id;
$meal_banner_image=get_template_directory_uri().'/assets/images/slider-1.jpg';
if(function_exists("the_field")) {
    $meal_section_meta_image_id = get_post_meta($meal_section_id, "banner_image", true);
    $meal_section_button_text = get_post_meta($meal_section_id, "button_title", true);
    $meal_section_attr = get_post_meta($meal_section_id, "button_target", true);

    if (isset($meal_section_meta_image_id)) {
        $meal_banner_image_details = wp_get_attachment_image_src($meal_section_meta_image_id, "full");
        $meal_banner_image = esc_url($meal_banner_image_details[0]);

    }


    $meal_button_text = __("Reserve A Table", "meal");
    if (isset($meal_section_button_text)) {
        $meal_button_text = esc_html($meal_section_button_text);
    }
}
$meal_post_section=get_post($meal_section_id);
//print_r($meal_post_section);
$meal_post_title=$meal_post_section->post_title;
$meal_post_description=$meal_post_section->post_content;

?>

<div class="cover_1 overlay bg-slant-white bg-light" id="<?php echo esc_attr($meal_post_section->post_name);?>">
    <div class="img_bg" style="background-image: url(<?php if(function_exists("the_field")){
    echo $meal_banner_image; }?>)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up">
                    <h2 class="heading mb-5"><?php echo esc_html($meal_post_title);?></h2>
                   <?php
                  $description=apply_filters("the_content",$meal_post_description);
                  $description=str_replace('<p','<p class="sub-heading mb-5"',$description);
                  echo wp_kses_post($description);

                   ?>
                    <p><a href="<?php echo esc_url($meal_section_attr); ?>" class="smoothscroll btn btn-outline-white px-5 py-3">
                            <?php echo $meal_button_text;?></a></p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- .cover_1 -->