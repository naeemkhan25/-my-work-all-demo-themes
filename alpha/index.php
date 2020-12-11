<?php
get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts">



    <div <?php post_class(); ?>>
        <?php
        while(have_posts()) {

            the_post();

            get_template_part("post-formats/content", get_post_format());
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