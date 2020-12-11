
<?php

/*
 * Template Name:Custom Query WPQ
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
          //  $total=9;
            $post_per_page=1;
            $s_p=new WP_Query(array(
                    'posts_per_page'=>$post_per_page,
               // 'author_in'=>array(1),
              // 'numberposts'=>$total,
                'category_name'=>'very nice',
               //'post__in'=>$post_count,
//                'order'=>'asc',

                //'orderby'=>'numberposts',
                'paged'=>$paged

            ));
            while($s_p->have_posts()) {
                    $s_p->the_post();

               ?>
                <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <?php
            }
                wp_reset_query();

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
                               'total'=>$s_p->max_num_pages,
                               'current'=>$paged
                           )

                   );
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();