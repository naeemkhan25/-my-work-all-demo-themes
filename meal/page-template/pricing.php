<?php
/*
 * Template Name:Pricing Table
 */
get_header();

$section_id=260;
get_template_part("/sections-templates/Banner");
the_post();

$meal_pricing_meta_plane_one=get_post_meta(get_the_ID(),"plane_one",true);
$meal_pricing_meta_plane_two=get_post_meta(get_the_ID(),"plane_two",true);
$meal_pricing_meta_plane_one_url=get_post_meta(get_the_ID(),"plane_one_action_url",true);
$meal_pricing_meta_plane_two_url=get_post_meta(get_the_ID(),"plane_two_action_url",true);

$meal_pricing_meta_plane_items=get_post_meta(get_the_ID(),"items",true);
$meal_pricing_meta_plane_One_items=get_post_meta(get_the_ID(),"plane_one_items",true);
$meal_pricing_meta_plane_two_items=get_post_meta(get_the_ID(),"plane_two_items",true);
$meal_pricing_meta_plane_item=explode("\n",$meal_pricing_meta_plane_items);
$meal_pricing_meta_plane_one_item=explode("\n",$meal_pricing_meta_plane_One_items);
$meal_pricing_meta_plane_two_item=explode("\n",$meal_pricing_meta_plane_two_items);

?>
<div class="main-wrap" id="section-home">
    <div <?php post_class( 'single-post' ) ?>>
        <div class="container">
            <div class="row post-body">
                <div class="col-md-12">
                    <h1><?php the_title(); ?></h1>
                    <?php
                    the_content();
                    ?>
                </div>

                <div class="col-md-12">
                    <!-- section start-->
                    <section class="section-gap">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table table-bordered price-plan">
                                            <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col"><?php echo esc_html($meal_pricing_meta_plane_one)?></th>
                                                <th scope="col"><?php echo esc_html($meal_pricing_meta_plane_two)?></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $counter=0;

                                            foreach ($meal_pricing_meta_plane_item as $item):
                                                $meal_pricing_plane_one_data=apply_filters("meal_pricing_item",$meal_pricing_meta_plane_one_item[$counter]);
                                                $meal_pricing_plane_two_data=apply_filters("meal_pricing_item",$meal_pricing_meta_plane_two_item[$counter]);
                                            ?>
                                                <tr>
                                                    <td><strong><?php echo esc_html($item);?></strong></td>
                                                    <td><?php echo wp_kses_post($meal_pricing_plane_one_data);?></td>
                                                    <td><?php echo wp_kses_post($meal_pricing_plane_two_data);?></td>
                                                </tr>

                                            <?php
                                                $counter++;

                                            endforeach;
                                            ?>
                                            <tr>
                                                <td>
                                                    <strong></strong>
                                                </td>
                                                <td>
                                                    <a href="<?php echo esc_url($meal_pricing_meta_plane_one_url);?>"
                                                       class="btn btn-danger">
                                                        <?php _e( 'Action', 'meal' ); ?>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="<?php echo esc_url($meal_pricing_meta_plane_two_url); ?>"
                                                       class="btn btn-danger">
                                                        <?php _e( 'Get This Plan', 'meal' ); ?>
                                                    </a>
                                                </td>

                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
