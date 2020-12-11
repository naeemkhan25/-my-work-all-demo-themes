<?php
get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>

    <div class="posts text-center">
        <h1>
            <?php
            _e("post under:",'alpha');
            single_tag_title();
            ?>
        </h1>
        <div <?php post_class(); ?>>
            <?php
            while(have_posts()) {

                the_post();

               ?>
                <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <?php
            }

            ?>
        </div>
        <div class="container pagination-format">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <?php
                    the_posts_pagination(array('screen_reader_text'=>' ',
                        'prev_text'=>__('new posts'),
                        'next_text'=>__('old posts')
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();