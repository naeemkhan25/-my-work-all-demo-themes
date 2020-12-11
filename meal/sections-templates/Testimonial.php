<?php
global $meal_section_id;
$meal_testimonial_meta=get_post_meta($meal_section_id,"_meal_testimonial",true);

$meal_section_post=get_post($meal_section_id);
$meal_section_title=$meal_section_post->post_title;
?>
<div class="section bg-white" data-aos="fade-up">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($meal_section_title);?></h2>
            </div>
        </div>
        <div class="row justify-content-center text-center" data-aos="fade-up">
            <div class="col-md-8">
                <div class="owl-carousel home-slider-loop-false">

                    <?php
                    foreach ($meal_testimonial_meta as $meta):
//                        echo "<pre>";
//                        print_r($meta);
//                        echo "</pre>";
                    ?>
                    <div class="item">
                        <blockquote class="testimonial">
                            <p><?php echo esc_html($meta['_meal_bio']);?></p>
                            <div class="author">
                                <?php
                                $meal_image_id=$meta['_meal_image_id'];
                                $meal_image_src=wp_get_attachment_image_src($meal_image_id,"meal-square2");
                                ?>
                                <img src="<?php echo esc_url($meal_image_src[0]); ?>" alt="Image placeholder" class="mb-3">
                                <h4><?php echo esc_html($meta['_meal_name']);?></h4>
                                <p><?php echo esc_html($meta['_meal_position']);?></p>
                            </div>
                        </blockquote>
                    </div>
                    <?php
                    endforeach;
                    ?>



                </div>
            </div>
        </div>
    </div>
</div> <!-- .section -->