<?php


$alpha_layout_class = "col-md-9";
$alpha_text_class = '';
if (!is_active_sidebar("sidebar-1")) {
    $alpha_layout_class = "col-md-10 offset-md-1";
    $alpha_text_class = "text-center";

}
get_header();
?>
<body <?php body_class(array("first-class", "3rd-class", '2nd-class')); ?>>
<?php get_template_part("hero"); ?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $alpha_layout_class; ?>">
                <div class="posts">
                    <div <?php post_class(array("first-class", "3rd-class", '2nd-class')); ?>>
                        <?php
                        while (have_posts()):
                            the_post();
                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?php echo $alpha_text_class; ?>">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="<?php echo $alpha_text_class; ?>">
                                            <strong><?php the_author_posts_link(); ?></strong><br/>
                                            <?php
                                            echo get_the_date();
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="<?php echo $alpha_layout_class; ?>">
                                        <?php
                                        if(class_exists("Attachments")):
                                            $attachments = new Attachments('slider');

                                            if ($attachments->exist()):
                                                ?>
                                                <div class="slider">
                                                    <?php
                                                    //make a slider also use tiyn-slide lekhe search javascript plagin

                                                    if ($attachments->exist()) {
                                                        while ($attachments->get()) {
                                                            ?>
                                                            <div class="slider_image">
                                                                <div>
                                                                    <?php
                                                                    echo $attachments->image('large');
                                                                    ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            <?php endif;
                                        endif;?>
                                        <?php

                                        ?>
                                        <p class="thumbnails-edit">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                $Current_image_url = get_the_post_thumbnail_url(null, "large");
                                                //echo  '<a href="'.$Current_image_url.'" data-featherlight="image">';
                                                echo '<a  class="popup" href="#" data-featherlight="image">';
                                                the_post_thumbnail("Large", array("class" => "image-img-fluid"));
                                                echo '</a>';
                                            }
                                            ?>
                                        </p>

                                        <?php


                                        the_content();
                                        wp_link_pages();
                                        previous_post_link();
                                        echo "<pre>";
                                        next_post_link();
                                        echo "</pre>";

                                        ?>

                                    </div>
                                    <div class="authorSection">
                                        <div class="row">
                                            <div class="col-md-3 authorImage">
                                                <?php
                                                echo get_avatar(get_the_author_meta("id"));
                                                ?>
                                            </div>
                                            <div class="col-md-9">
                                                <h4>
                                                    <?php echo get_the_author_meta("display_name"); ?>
                                                </h4>
                                                <p>
                                                    <?php echo get_the_author_meta("description"); ?>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    <?php
                                    if (comments_open()):
                                        ?>
                                        <div class="col-md-10 offset-md-1">
                                            <?php comments_template();
                                            ?>
                                        </div>
                                    <?php
                                    endif;
                                    ?>
                                </div>

                            </div>
                        <?php
                        endwhile;
                        ?>
                    </div>


                    <div class="container pagination-format">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8">
                                <?php
                                the_posts_pagination(array(
                                    'screen_reader_text' => ' ',
                                    'prev_text' => __('new posts'),
                                    'next_text' => __('old posts')
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (is_active_sidebar("sidebar-1")):
                ?>
                <div class="col-md-3 sidebar_1">
                    <?php
                    if (is_active_sidebar("sidebar-1")) {
                        dynamic_sidebar("sidebar-1");
                    }
                    ?>
                </div>
            <?php endif;
            ?>
        </div>
    </div>

<?php
get_footer();