<?php
get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>

    <div class="posts text-center">
        <h1>
            Post In <?php
           if(is_month()){
               $month=get_query_var("monthnum");
               $objmonth=DateTime::createFromFormat("!m",$month);
               echo $objmonth->format("F");
           }elseif (is_year()){
               echo esc_html(get_query_var("year"));
           }elseif (is_day()){
               $day=get_query_var("day");
               $month=get_query_var("monthnum");
               $year=get_query_var("year");
               printf("%s-0%s-0%s",$year,$month,$day);
           }
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