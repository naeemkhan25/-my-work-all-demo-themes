<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="post-title">
                <a href="<?php the_permalink();?>"><?php  the_title();?></a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p>
                <strong><?php the_author();?></strong><br/>
                <?php
                echo get_the_date();
                ?>
            </p>
            <?php echo get_the_tag_list("<ul class=\"list-unstyled\"><li>","</li><li>","</li></ul>");?>

            <span class="dashicons dashicons-format-image"></span>
        </div>

        <div class="col-md-9 ">
            <p class="image_size">
                <?php
                if (has_post_thumbnail()) {
                    $Current_image_url=get_the_post_thumbnail_url(null,"large");
                    echo '<a  class="popup" href="#" data-featherlight="image">';
                    //printf('<a href="%s" data-featherlight="image">',$Current_image_url);
                    the_post_thumbnail("Large", array("class" => "image-img-fluid"));
                    echo '</a>';
                }
                ?>
            </p>
            <?php
            the_excerpt();
            ?>


        </div>
    </div>

</div>