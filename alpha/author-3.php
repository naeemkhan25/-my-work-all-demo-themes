<?php
get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="container">
    <div class="authorSection">
        <div class="row">
            <div class="col-md-4 authorImage">
                <?php
                echo  get_avatar(get_the_author_meta("id"));
                ?>
            </div>
            <div class="col-md-8">
                <h4>
                    <?php echo  strtoupper(get_the_author_meta("display_name"));?>
                </h4>

                <p>
<!--                    --><?php //echo get_the_author_meta("description");?>
                </p>
            </div>

        </div>
    </div>
</div>

    <div class="posts text-center">
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