<?php
global $meal_section_id;
$meal_section_type=get_post_meta($meal_section_id,"select_section_type",true);
$meal_section_services=get_post_meta($meal_section_id,"_meal_services",true);

$meal_post=get_post($meal_section_id);
$meal_post_title=$meal_post->post_title;
$meal_post_content=$meal_post->post_content;
?>




<div class="section bg-white services-section" data-aos="fade-up" id="<?php echo esc_attr($meal_post->post_name);?>">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php  echo esc_html($meal_post_title)?></h2>
                <p class="sub-heading mb-5">
                    <?php
                    echo $meal_post_content;
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($meal_section_services as $service):
            ?>
            <div class="col-m mb-5d-6 col-lg-4" data-aos="fade-up">
                <div class="media feature-icon d-block text-center">
                    <?php
                    if(isset($service["_meal_icon"])){
                    ?>
                    <div class="icon">
                        <span class="<?php echo esc_html($service["_meal_icon"])?>"></span>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="media-body">
                        <h3><?php echo esc_html($service["_meal_title"])?></h3>
                        <p>
                            <?php
                            echo esc_html($service["_meal_description"]);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            ?>

        </div>
    </div>
</div> <!-- .section -->