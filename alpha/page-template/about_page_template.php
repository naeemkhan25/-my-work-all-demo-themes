<?php
/*
 * Template Name:About page Template
 */

get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/about-page/hero-page"); ?>
    <div class="post"<?php post_class(); ?>>
        <?php
        while (have_posts()):
            the_post();
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center">
                            <?php the_title(); ?>
                        </h2>
                        <p class="text-center">
                            <strong><?php the_author(); ?></strong><br/>
                            <?php
                            echo get_the_date();
                            ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if(class_exists("Attachments")):
                    $attachments = new Attachments('testimonials');

                    if ($attachments->exist()):
                    ?>

                    <div class="row">

                        <div class="col-md-8 offset-md-2 testimonial_body" >
                        <?php   ?>
                            <h1 class="text-center testimonial_head">
                               <b>
                                <?php
                                _e("TESTIMONIAL","alpha");
                                ?>
                               </b>
                            </h1>
                                <div class="testimonial slider text-center">
                                    <?php
                                    //make a slider also use tiyn-slide lekhe search javascript plagin

                                    if ($attachments->exist()) {
                                        while ($attachments->get()) {

                                            ?>
                                            <div class="testimonial_page">
                                                <div>
                                                    <?php
                                                    echo $attachments->image('thumbnails');
                                                    ?>
                                                    <h4>  <?php echo $attachments->field("name");?></h4>


                                                       <p class="testimonial_content"><?php
                                                    echo $attachments->field('testimonial');
                                                        ?>
                                                       </p>
                                                    <p>
                                                            <?php
                                                            echo $attachments->field("position");
                                                            ?>
                                                        <strong>
                                                    <?php
                                                    echo $attachments->field("company");
                                                    ?>
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                        </div>
                        <?php endif;
                        endif;
                        ?>
                    </div>
                    <?php
                    if(class_exists("Attachments")):
                    ?>
                        <div class="row">
                            <?php
                            //make a slider also use tiyn-slide lekhe search javascript plagin
                            $attachments = new Attachments('team');
                            if ($attachments->exist()) {
                                while ($attachments->get()) {
                                    ?>
                                    <div class="col-md-4 team_size">
                                        <?php
                                        echo $attachments->image('medium');
                                        ?>
                                        <h4><?php echo $attachments->field("name");?></h4>
                                        <p><?php echo $attachments->field("bio");?></p>
                                        <p>
                                            <?php echo $attachments->field("position") ?>
                                            <strong><?php echo $attachments->field("company");?></strong>
                                        </p>
                                        <p>
                                            <?php echo $attachments->field("email");?>
                                        </p>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>

                <?php
                endif;
                ?>

                    <div class="col-md-10 offset-md-1 text-center">
                        <p class="thumbnails-edit ">
                            <?php
                            if (has_post_thumbnail()) {
                                $Current_image_url=get_the_post_thumbnail_url(null,"large");
                                //echo  '<a href="'.$Current_image_url.'" data-featherlight="image">';
                                echo '<a  class="popup" href="#" data-featherlight="image">';
                                the_post_thumbnail("Large", array("class" => "image-img-fluid"));
                                echo '</a>';
                            }
                            ?>
                        </p>

                        <?php

                        the_content();
                        previous_post_link();
                        echo "<pre>";
                        next_post_link();
                        echo "</pre>";

                        ?>

                    </div>
                    <!--                    --><?php
                    //                    if (comments_open()):
                    //
                    //                        ?>
                    <!--                        <div class="col-md-10 offset-md-1">-->
                    <!--                            --><?php //comments_template(); ?>
                    <!--                        </div>-->
                    <!--                    --><?php
                    //                    endif;
                    //                    ?>
                </div>

            </div>
        <?php
        endwhile;
        ?>
    </div>


<?php
get_footer();