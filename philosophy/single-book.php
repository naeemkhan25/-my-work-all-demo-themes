<?php
the_post();
get_header();

?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php
                    the_title();
                    ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php echo get_the_date(); ?></li>
                    <?php
                    if(has_category()):
                        ?>
                        <li class="cat">
                            <?php _e("In", "philosophy");

                            echo get_the_category_list(" ");
                            ?>

                        </li>
                    <?php endif;
                    ?>
                </ul>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail("large");
                    }
                    ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <?php
                the_content();
                $post_arg=array(
                        "post_type"=>'chapter',
                        "meta_key"=>"parent_book",
                        'posts_per_page'=>-1,

                    "meta_value"=>get_the_ID(),
                    //order by asc korar jonno
                    //https://github.com/CMB2/cmb2-attached-posts ai url e giye kaj korthe hoibe.

                );
                ?>
                  <h3><?php _e("Books Chapter","philosophy");?></h3>
                <?php
                $post_chapter=new WP_Query($post_arg);
                while($post_chapter->have_posts()){
                    $post_chapter->the_post();

                    echo "</br>";
                    $post_permalink=get_post_permalink();
                    $post_title=get_the_title();
                   printf("<a href='%s'>%s</a></br>",$post_permalink,$post_title);
                }
                wp_reset_query();
                ?>
                <h3><?php _e("Books Chapter","philosophy");?></h3>
                <?php
                if(class_exists("CMB2")) {


                        $philosophy_cmb2_attached = get_post_meta(get_the_ID(), 'attached_cmb2_attached_posts', true);

                        foreach ($philosophy_cmb2_attached as $attached_post) {
                            $post_permalink = get_post_permalink($attached_post);
                            $post_title = get_the_title($attached_post);
                            printf("<a href='%s'>%s</a></br>", $post_permalink, $post_title);

                        }

                }
                ?>

                    <p class="s-content__tags">
                        <span><?php  _e("Language")?></span>

                        <span class="s-content__tag-list">
                    <?php
                    the_terms(get_the_ID(),"language");
                    ?>
                    </span>
                    </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <?php
                    echo get_avatar(get_the_author_meta("ID"));
                    ?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="#0"><?php
                                the_author_meta("display_name");
                                ?></a>
                        </h4>

                        <p>
                            <?php
                            the_author_meta("description");
                            ?>
                        </p>
                        <?php
                        $philosophy_facebook=get_field("facebook","user_".get_the_author_meta("ID"));
                        $philosophy_twitter=get_field("twitter","user_".get_the_author_meta("ID"));
                        $philosophy_instagram=get_field("_instagram","user_".get_the_author_meta("ID"));
                        ?>
                        <ul class="s-content__author-social">

                            <?php
                            if($philosophy_facebook){
                                ?>
                                <li><a href="<?php echo esc_url($philosophy_facebook);?>">Facebook</a></li>

                                <?php
                            }
                            if($philosophy_twitter){
                                ?>
                                <li><a href="<?php echo esc_url($philosophy_twitter);?>">Twitter</a></li>
                                <?php
                            }
                            if($philosophy_instagram){
                                ?>
                                <li><a href="<?php echo esc_url($philosophy_instagram); ?>">Instagram</a></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
                            <?php
                            $philosophy_prev_text=get_previous_post();

                            ?>
                            <a href="<?php echo get_the_permalink($philosophy_prev_text) ?>" rel="prev">
                                <span><?php _e("Previous Post","philosophy");?></span>
                                <?php
                                echo get_the_title($philosophy_prev_text);
                                ?>
                            </a>
                        </div>
                        <div class="s-content__next">
                            <div class="s-content__next">
                                <?php
                                $philosophy_next_text=get_next_post();

                                ?>
                                <a href="<?php echo get_the_permalink($philosophy_next_text) ?>" rel="next">
                                    <span><?php _e("Next Post","philosophy");?></span>
                                    <?php
                                    echo get_the_title($philosophy_next_text);
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <?php
        if(!post_password_required()){
            comments_template();
        }
        ?>

    </section> <!-- s-content -->

<?php
get_footer();