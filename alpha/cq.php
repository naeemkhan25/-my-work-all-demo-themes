
<?php

/*
 * Template Name:Custom Query
 */
get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>

    <div class="posts text-center">

        <div <?php post_class(); ?>>
            <?php
            // amora pagination er jonno paged name variable use korbo.
            //pagination dekhanor jonno paginatelinks.
            $paged=get_query_var("paged")?get_query_var("paged"):1;
           // $post_count=array(1,20,9);
            $total=9;
            $post_per_page=2;
            $s_p=get_posts(array(
                    'posts_per_page'=>$post_per_page,
                'author_in'=>array(1),
               'numberposts'=>$total,
               //'post__in'=>$post_count,
//                'order'=>'asc',

                'orderby'=>'numberposts',
                'paged'=>$paged

            ));
            foreach($s_p as $post) {
                setup_postdata($post);

               ?>
                <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <?php
            }
            wp_reset_postdata();

            ?>
        </div>
        <div class="container pagination-format">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">
                    <?php
                   echo paginate_links(
                           array(
                               'total'=>ceil($total/$post_per_page)
                           )

                   );
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();