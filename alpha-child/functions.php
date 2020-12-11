<?php
function alpha_child_assets(){
    wp_enqueue_style("parent-css",get_parent_theme_file_uri("/main.css"),null,time());
}
add_action("wp_enqueue_scripts","alpha_child_assets");


function alpha_about_page_banner_style(){
    if(is_page()){
        $alpha_feat_image_url=get_the_post_thumbnail_url(null,"large");
        ?>
        <style>
            .page-header {
                background-image: url(<?php echo $alpha_feat_image_url;?>)
            }
        </style>
        <?php
    }
    if(is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
            <style>
                .header{
                    background-image: url(<?php echo header_image();?>);
                    margin-bottom: 50px;
                    background-size: cover;
                }
                .header h1.heading a,h3,tagline {
                    color: #<?php echo get_header_textcolor();?>;

                <?php
                       if(!display_header_text()){
                           echo "display: none;";
                       }
              ?>

                }
                .header h1.heading a{
                    font-size: 86px;
                }

            </style>
            <?php
        }
    }
}
