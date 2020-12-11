

<?php
global $meal_section_id;
$meal_section_type=get_post_meta($meal_section_id,"select_section_type",true);

    $meal_portfolio_meta=get_post_meta($meal_section_id,"_meal_Portfolio",true);
    $meal_portfolio_meta_nimage=get_post_meta($meal_section_id,"_meal_nimages",true);
//    echo "<pre>";
//    print_r($meal_portfolio_meta);
//    echo "</pre>";

    $meal_categories=array();
    foreach ($meal_portfolio_meta as $meta ){
//        $meal_category=$meta["_meal_categories"];
//        if(!in_array($meal_category,$meal_categories)){
//               array_push($meal_categories,$meal_category);
//
//           }

        $meal_categories_items=$meta["_meal_categories"];
        $meal_gallery_item_explode_category=explode(",",$meal_categories_items);
        foreach ($meal_gallery_item_explode_category as $meal_gallery_item_category){
            $meal_gallery_item_category=trim($meal_gallery_item_category);
            if(!in_array($meal_gallery_item_category,$meal_categories)){
                array_push($meal_categories,$meal_gallery_item_category);

            }
        }


//    echo "<pre>";
//    print_r($meal_categories);
//    print_r($meal_image);
//
//    echo "</pre>";



}
$meal_post_section=get_post($meal_section_id);
$meal_post_title=$meal_post_section->post_title;
$meal_post_description=$meal_post_section->post_content;
?>
<div class="section pb-3 bg-white" id="<?php echo esc_attr($meal_post_section->post_name);?>" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-lg-8 section-heading">
                <h2 class="heading mb-5"><?php echo esc_html($meal_post_title); ?></h2>
                <p>
                    <?php echo $meal_post_description; ?>
                </p>
            </div>
        </div>
    </div>
</div> <!-- .section -->


<div class="section bg-white pt-2 pb-2 text-center" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <ul class="portfolio-filter text-center">
                        <li class="active"><a href="#" data-filter="*"><?php  _e("All","meal");?></a></li>

                        <?php

                        foreach ($meal_categories as $category):

                        ?>
                        <li><a href="#" data-filter=".<?php echo esc_html($category);?>"><?php echo esc_html($category);?></a></li>
                        <?php
                        endforeach;
                        ?>

                    </ul>
                </div>

                <div class="portfolio-grid portfolio-gallery grid-4 gutter" data-images="<?php echo esc_attr($meal_portfolio_meta_nimage);?>"
                data-sid="<?php echo esc_attr($meal_section_id); ?>"
                data-ni="<?php echo esc_attr($meal_portfolio_meta_nimage);?>"
                >
                    <?php
                    wp_nonce_field("loadmorep","loadmorep");
                    ?>

                    <?php

                        $meal_count=0;
                    foreach ($meal_portfolio_meta as $meal_gallery_items_to):
                        if($meal_count>=$meal_portfolio_meta_nimage){
                            break;
                        }
                        $meal_gallery_images=$meal_gallery_items_to['_meal_image_id'];
                        $meal_item_categories=$meal_gallery_items_to['_meal_categories'];
                        $meal_item_category_trim=str_replace(","," ",$meal_item_categories);
                        $meal_category=explode(",",$meal_item_categories);
                    $meal_image_thumbnails_medium=wp_get_attachment_image_src($meal_gallery_images,"medium");
                    $meal_image_thumbnails_large=wp_get_attachment_image_src($meal_gallery_images,"large");

                    ?>
                        <div class="portfolio-item <?php echo esc_attr($meal_item_category_trim); ?>">
                            <a href="<?php echo esc_attr($meal_image_thumbnails_large[0]); ?>" class="portfolio-image popup-gallery" title="Bread">
                                <img src="<?php echo esc_url($meal_image_thumbnails_medium[0]); ?>" alt="<?php echo esc_url($meal_image_thumbnails_medium[0]); ?>"/>
                                <div class="portfolio-hover-title">
                                    <div class="portfolio-content">
                                        <h4><?php echo esc_html($meal_gallery_items_to['_meal_title']); ?></h4>
                                        <div class="portfolio-category">
                                            <?php
                                            foreach ($meal_category as $category):
                                            ?>
                                            <span><?php  echo esc_html($category); ?></span>
                                            <?php
                                            endforeach;
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        $meal_count++;
                    endforeach;

                    ?>


                </div>

                       <button id="loadmoreimageb" class="btn btn-danger"><?php _e("Load More","meal"); ?></button>


            </div>
        </div>
    </div>
</div> <!-- .section -->