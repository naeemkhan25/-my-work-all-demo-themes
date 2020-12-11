<?php
/*
 * Template Name:Contact Page Template
 */
the_post();
get_header();

?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow">

        <div class="row">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php
                    _e("Learn More","philosophy");
                    echo  " ";
                    the_title();
                    echo " ";
                    _e("US","philosophy");

                    ?>
                </h1>

            </div> <!-- end s-content__header -->

            <?php
            if(is_active_sidebar("google-maps")){
                dynamic_sidebar("google-maps");
            }
            ?>

            <div class="col-full s-content__main">

                <?php
                the_content();
                ?>
                <div class="row block-1-2 block-tab-full">
                    <?php
                    if(is_active_sidebar("contact-us")){
                        dynamic_sidebar("contact-us");
                    }
                    ?>
                </div>
            </div> <!-- end s-content__main -->
            <h3><?php _e("Say Hello","philosophy"); ?></h3>
            <?php
            if(get_field("contact_form_sortcode")){
                echo do_shortcode(get_field("contact_form_sortcode"));
            }
            ?>





        <!-- comments
        ================================================== -->
         </div>

    </section> <!-- s-content -->

<?php
get_footer();