<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("template-parts/common/hero"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="posts">
                <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="post" <?php post_class(); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="post-title">
                                        <?php the_title(); ?></h2>

                                    <p>
                                        <strong><?php the_author() ?></strong><br/>
                                        <?php echo get_the_date(); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>

                                        <?php
                                        if (has_post_thumbnail()) {
                                            $thumbnail_uri = get_the_post_thumbnail_url(null, "medium_large");
                                            //echo '<a href="'.$thumbnail_uri.'" data-featherlight="image">';
                                            //good waye
                                            //printf('<a href="%s" data-featherlight="image">',$thumbnail_uri);
                                            echo '<a  class="popup"  href="#" data-featherlight="image">';
                                            the_post_thumbnail("medium_large", array("class=>'img-fluid'"));
                                            echo '</a>';
                                        }
                                        ?>

                                        <?php
                                        the_content();
                                        //amora acf er  use na kore o data anthe pari .

                                        if (get_post_format() == 'image' && function_exists("the_field")):
                                        $alpha_meta = get_post_meta(get_the_ID(), "camera_model", true);

                                        ?>
                                    <div class="meta_info">
                                        <strong>Camera model:</strong>
                                        <?php echo $alpha_meta; ?>
                                        <br/>
                                        <strong>Location:</strong>
                                        <?php
                                        echo get_field("location");
                                        ?>
                                        <br/>
                                        <?php echo get_field("date"); ?>
                                        <br/>
                                        <?php
                                        if (get_field('licensed')):

                                            echo apply_filters("the_content", get_field("licensed_info"));
                                        endif;
                                        ?>
                                        <br/>
                                        <?php
                                        $alpha_image_id = get_field("image");
                                        $alpha_image_details = wp_get_attachment_image_src($alpha_image_id, "alpha_squery");
                                        echo "<img src='" . esc_url($alpha_image_details[0]) . "'/>";
                                        ?>
                                        <br/>
                                        <?php
                                        $file = get_field("pdf_file");
                                        if ($file) {
                                            $file_url = wp_get_attachment_url($file);
                                            $file_thumb = get_field("thumbnails", $file);
                                            if ($file_thumb) {
                                                $alpha_pdf_details = wp_get_attachment_image_src($file_thumb);
                                                echo "<a target='_blank' href='{$file_url}'><img src='" . esc_url($alpha_pdf_details[0]) . "'/></a>'";
                                            } else {
                                                echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                                            }
                                        }
                                        ?>

                                    </div>

                                    <?php
                                    endif;
                                    if(get_post_format()=="image" && class_exists("CMB2")):
                                    $alpha_camera_model=get_post_meta(get_the_ID(),"_alpha_camera_model",true);
                                    $alpha_location=get_post_meta(get_the_ID(),"_alpha_location",true);
                                    $alpha_date=get_post_meta(get_the_ID(),"_alpha_date",true);
                                    $alpha_licensed=get_post_meta(get_the_ID(),"_alpha_licensed_",true);
                                    $alpha_licensed_info=get_post_meta(get_the_ID(),"_alpha_licensed_information",true);
                                    ?>
                                    <div class="cmb2-metabox">

                                        <strong>Camera model:</strong>
                                        <?php
                                        echo $alpha_camera_model;
                                        ?>
                                    <br/>
                                        <strong>
                                            Location:
                                        </strong>
                                        <?php echo $alpha_location;
                                        ?>
                                    <br/>
                                        <?php
                                        echo $alpha_date;
                                        ?>
                                        <br/>
                                        <?php
                                        if($alpha_licensed){
                                            echo apply_filters("the_content",$alpha_licensed_info);
                                        }
                                        ?>
                                    <br/>
                                        <p>
                                            <?php
                                            //cmb2 the id pethe ses e id lekhbo
                                            $alpha_image_id = get_post_meta(get_the_ID(),"_alpha_image_info_id",true);

                                            $alpha_image_details = wp_get_attachment_image_src($alpha_image_id, "alpha_squery");
                                            echo "<img src='" . esc_url($alpha_image_details[0]) . "'/>";
                                            ?>
                                        </p>

                                    </div>
                                <?php
                                    endif;
                                    next_post_link();
                                    echo "<br/>";
                                    previous_post_link();
                                    ?>
                                    </p>
                                    <div class="author_section">
                                        <div class="row">
                                            <div class="col-md-2 authorImage">

                                                <?php
                                                echo get_avatar(get_the_author_meta("ID"));
                                                ?>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>
                                                    <?php echo get_the_author_meta("display_name"); ?>
                                                </h4>
                                                <p>
                                                    <?php echo get_the_author_meta("description");
                                                    ?>
                                                </p>
                                                <?php
                                                if (function_exists("the_field")):
                                                    ?>
                                                    <p>
                                                        <strong>Facebook url:</strong>
                                                        <?php
                                                        echo get_field("facebook", "user_" . get_the_author_meta("ID"));
                                                        ?>
                                                        <br/>
                                                        <strong>twitter url:</strong>
                                                        <?php
                                                        echo get_field("twitter", "user_" . get_the_author_meta("ID"));
                                                        ?>
                                                    </p>
                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php get_template_part("template-parts/related_Post/related_post"); ?>

                                    <?php
                                    if (!post_password_required()) {
                                        ?>
                                        <div class="col-md-10 offset-md-1">
                                            <?php
                                            comments_template();

                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php
            if (is_active_sidebar("sidebar-1")) {
                dynamic_sidebar("sidebar-1");
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>



