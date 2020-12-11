<?php
/*
 * Template Name:tyni slider Page
 */
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
                  echo apply_filters("philosophy_after_title",get_the_title());
//                    _e("Learn More","philosophy");
//                    echo  " ";
//                    the_title();
//                    echo " ";
//                    _e("US","philosophy");
//                    apply_filters("get_the_title",the_title());
                   // do_action("philosophy_before_tittle");
                    ?>
                </h1>

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

            <div class="col-full">

                <?php
                the_content();
                ?>

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->


    </section> <!-- s-content -->

<?php
get_footer();