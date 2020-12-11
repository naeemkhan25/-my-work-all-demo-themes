

<?php
global $meal_section_id;
$meal_post_section=get_post($meal_section_id);
$meal_post_title=$meal_post_section->post_title;
$meal_post_description=$meal_post_section->post_content;
?>
<div class="section bg-light" id="<?php echo esc_attr($meal_post_section->post_name);?>" data-aos="fade-up">
    <div class="container">
        <div class="row section-heading justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="heading mb-3"><?php echo esc_html($meal_post_title);?></h2>
                <p class="sub-heading mb-5">
                    <?php
                    echo $meal_post_description;
                    ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="nav site-tab-nav" id="pills-tab" role="tablist">
                    <?php
                    $meal_count1=0;
                    $meal_feat_category=get_terms(
                        array(
                            "taxonomy"=>"category",
                            "meta_key"=>"featured",
                            "meta_value"=>1,

                        )
                    );

                    if($meal_feat_category):
                  foreach ($meal_feat_category as $category):
                      $meal_count1++;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($meal_count1==1){echo 'active';}?>" id="pills-breakfast-tab" data-toggle="pill"
                           href="#pills-<?php echo esc_attr($category->name);?>" role="tab" aria-controls="pills-<?php echo esc_attr($category->name);?>"
                           aria-selected="<?php if($meal_count1==1){echo 'true';}?>"><?php  echo esc_attr($category->name)?></a>
                    </li>
                    <?php

                    endforeach;
                    endif;
                    ?>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <?php


                         $meal_count2=0;
                    foreach ($meal_feat_category as $category):
                        $meal_count2++;
                    ?>
                        <div class="tab-pane fade<?php if($meal_count2==1){ echo "show active";}?>" id="pills-<?php echo esc_attr($category->name);?>" role="tabpanel"
                         aria-labelledby="pills-<?php echo esc_attr($category->name);?>-tab">

                            <?php
                            $meal_recipes=new WP_Query(
                                    array(
                                            "post_type"=>"recipes",
                                           // "posts_per_page"=>-1,
                                        "tax_query"=>array(
                                                array(
                                                "taxonomy"=>"category",
                                                "field"=>"slug",
                                                "terms"=>$category->name
                                                )
                                        )
                                    )
                            );



                            while($meal_recipes->have_posts()){
                                $meal_recipes->the_post();

                            ?>
                        <div class="d-block d-md-flex menu-food-item">

                            <div class="text order-1 mb-3">
                                <?php
                                the_post_thumbnail("meal-square2");
                                ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                                <?php
                                the_excerpt();
                                ?>
                            </div>
                            <div class="price order-2">
                                <strong><?php   $meal_price_meta=get_post_meta(get_the_ID(),"price",true);
                                echo $meal_price_meta;
                                ?></strong>
                            </div>
                        </div> <!-- .menu-food-item -->

                         <?php
                            }
                            wp_reset_query();
                            ?>

                    </div>
                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
       
        </div>
    </div>
</div> <!-- .section -->