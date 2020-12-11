
<?php
if(function_exists("the_field")):
?>
<div>
    <h4> <?php  _e(" Related Post","alpha")?></h4>
    <?php
    $alpha_rel_Post_id=get_field("related_post");

    $alpha_rel_Post_id=new WP_Query(array(
        'post__in'=>$alpha_rel_Post_id,
        'orderby'=>'post__in'
    ));
    while($alpha_rel_Post_id->have_posts()):
        $alpha_rel_Post_id->the_post();

        ?>

        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

    <?php
    endwhile;
    wp_reset_query();
    ?>
</div>

<?php
endif;
