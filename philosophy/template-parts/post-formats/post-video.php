
<?php
$philosophy_video="";
if(function_exists("the_field")){
    $philosophy_video=get_field("source_file");
}
?>


<article class="masonry__brick entry format-video" data-aos="fade-up">

    <div class="entry__thumb video-image">
        <?php
        if($philosophy_video):
        ?>
        <a href="<?php echo esc_url($philosophy_video);?>" data-lity>
            <?php
            endif;
            the_post_thumbnail("philosophy-home-square");
            ?>
        </a>
    </div>

    <?php
    get_template_part("template-parts/common/post/summery");
    ?>

</article> <!-- end article -->