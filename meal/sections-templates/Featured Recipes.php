
<?php
global $meal_section_id;
if(function_exists("the_field")){
    $Featured_Recipes_id=get_post_meta($meal_section_id,"select_recipes",true);
    $featured_recipes=new WP_Query(array(
        "post_type"=>"recipes",
        "post__in"=>$Featured_Recipes_id,
        "orderby"=>"post__in"
    ));
    $featured_data=array();
//    echo "<pre>";
//    print_r($featured_recipes);
//    echo "</pre>";
    while($featured_recipes->have_posts()){
        $featured_recipes->the_post();
        $categories=get_the_category();
        //$featured_image_details=wp_get_attachment_image_src(get_the_ID(),"meal-query");
       // $featured_image=esc_url($featured_image_details[0]);
        $featured_data[]=array(
            'title'=>get_the_title(),
            "description"=>get_the_content(),
            "category"=>$categories[0]->name,
            "permalink"=>get_the_permalink(),
            "image"=>get_the_post_thumbnail_url(get_the_ID(),"meal_square")

        );

    }
    wp_reset_query();

}
$post_section_Id=get_post($meal_section_id);
$post_section_heading=$post_section_Id->post_title;
$post_section_featured_description=$post_section_Id->post_content;
if($featured_recipes->post_count>1){
?>

<div class="section" data-aos="fade-up" id="<?php echo  esc_attr($post_section_Id->post_name);?>">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($post_section_heading) ?></h2>
                <p class="sub-heading mb-5">
                    <?php
                    echo $post_section_featured_description;
                    ?>
                </p>
            </div>
        </div>
        <div class="row">

            <div class="ftco-46">
                <div class="ftco-46-row d-flex flex-column flex-lg-row">
                    <div class="ftco-46-image" style="background-image: url(<?php echo$featured_data[0]['image'];?>);"></div>
                    <div class="ftco-46-text ftco-46-arrow-left">
                        <h4 class="ftco-46-subheading"><?php echo $featured_data[0]['category'];?></h4>
                        <h3 class="ftco-46-heading"><?php echo $featured_data[0]['title'];?></h3>
                        <p class="mb-5"><?php echo $featured_data[0]['description'];?></p>
                        <p><a href="<?php echo esc_url( $featured_data[0]['permalink']); ?>" class="btn-link"><?php  _e("Learn More","meal");?><span
                                    class="ion-android-arrow-forward"></span></a></p>
                    </div>
                    <div class="ftco-46-image" style="background-image: url(<?php echo$featured_data[1]['image'];?>);"></div>
                </div>

                <div class="ftco-46-row d-flex flex-column flex-lg-row">
                    <div class="ftco-46-text ftco-46-arrow-right">
                        <h4 class="ftco-46-subheading"><?php echo $featured_data[1]['category'];?></h4>
                        <h3 class="ftco-46-heading"><?php echo $featured_data[1]['title'];?></h3>
                        <p class="mb-5">
                            <?php echo $featured_data[1]['description'];?>
                           </p>
                        <p><a href="<?php echo esc_url($featured_data[1]['permalink']); ?>" class="btn-link"><?php  _e("Learn More","meal");?><span
                                    class="ion-android-arrow-forward"></span></a></p>
                    </div>
                    <div class="ftco-46-image" style="background-image: url(<?php echo$featured_data[2]['image'];?>)"></div>
                    <div class="ftco-46-text ftco-46-arrow-up">
                        <h4 class="ftco-46-subheading"><?php echo $featured_data[2]['category'];?></h4>
                        <h3 class="ftco-46-heading"><?php echo $featured_data[2]['title'];?></h3>
                        <p class="mb-5">
                            <?php echo $featured_data[2]['description'];?> </p>
                        <p><a href="<?php echo esc_url($featured_data[2]['permalink']); ?>" class="btn-link"><?php  _e("Learn More","meal");?> <span
                                    class="ion-android-arrow-forward"></span></a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- .section -->
<?php
}