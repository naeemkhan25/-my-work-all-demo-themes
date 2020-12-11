<?php

global $meal_section_id;
$meal_section_type=get_post_meta($meal_section_id,"select_section_type",true);
$meal_section_Chefs=get_post_meta($meal_section_id,"_meal_Chefs",true);

//echo "<pre>";
//print_r($meal_section_Chefs);
//echo "</pre>";

$meal_section_post=get_post($meal_section_id);
$meal_post_title=$meal_section_post->post_title;

?>




<div class="section bg-white" data-aos="fade-up"  id="<?php echo esc_attr($meal_section_post->post_name);?>">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 section-heading text-center">
                <h2 class="heading mb-5"><?php echo  esc_html($meal_post_title); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($meal_section_Chefs as $chef):
             $image=wp_get_attachment_image_src($chef["_meal_image_id"],"medium");

            ?>
            <div class="col-md-6 pr-md-5 text-center mb-5">
                <div class="ftco-38">
                    <div class="ftco-38-img">
                        <div class="ftco-38-header">
                            <img src="<?php echo esc_url($image[0]); ?>"
                                 alt="Free Website Template for Restaurants by Free-Template.co">
                            <h3 class="ftco-38-heading"><?php  echo esc_html($chef["_meal_name"]);?></h3>
                            <p class="ftco-38-subheading"><?php  echo esc_html($chef["_meal_designation"]);?></p>
                        </div>
                        <div class="ftco-38-body">
                           <p>
                               <?php  echo esc_html($chef["_meal_bio"]);?>
                           </p>
                            <?php

                            ?>
                            <p>
                                <a href="<?php echo esc_attr($chef["_meal_social"][0]); ?>" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="<?php echo esc_attr($chef["_meal_social"][1]); ?>" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="<?php echo esc_attr($chef["_meal_social"][2]); ?>" class="p-2"><span class="fa fa-instagram"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            ?>

            <!-- <div class="col-md-4"></div> -->
        </div>
    </div>
</div> <!-- .section -->