
<?php
/*
 * Template Name:Featured Post
 */
get_header();
?>

    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <?php
                $paged=get_query_var("paged")?get_query_var("paged"):1;
                $philosophy_argument=array(
                  'post_type'=>'book',
                    'meta_key'=>"is_featured",
                    'meta_value'=>true,
                    'posts_per_page'=>3,
                    'paged'=>$paged
                );
                $philosophy_Query=new WP_Query($philosophy_argument);
                while ($philosophy_Query->have_posts()){
                    $philosophy_Query->the_post();
                    get_template_part("template-parts/post-formats/post",get_post_format());
                }

                ?>
            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->


        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <?php
                    $links=paginate_links(array(
                            'total'=>$philosophy_Query->max_num_pages,
                            "current"=>$paged,
                            'type'=>"list",
                        )

                    );
                     $links=str_replace("page-numbers",'pgn__num',$links);
                        $links=str_replace("<ul class='pgn__num'>",'<ul>',$links);
                        $links=str_replace("prev pgn__num",'pgn__prev',$links);
                        $links=str_replace("next pgn__num",'pgn__next',$links);
                        echo $links;



                    ?>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->



<?php
get_footer();