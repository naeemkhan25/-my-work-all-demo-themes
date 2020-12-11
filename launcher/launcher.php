<?php
/*
 * Template Name:Launcher page
 */
?>


<?php
the_post();
get_header();
$launcher_text=get_post_meta(get_the_ID(),"placeholder",true);
$launcher_hint=get_post_meta(get_the_ID(),"hint",true);
$launcher_button_lable=get_post_meta(get_the_ID(),"Button_lable",true);

?>



<body <?php body_class();?>>
<div class="fh5co-loader"></div>

<aside id="fh5co-aside" role="sidebar" class="text-center home-site">
    <h1 id="fh5co-logo" class="blogSite"><a href="<?php echo site_url();?>">
            <?php
            bloginfo();
            ?>
        </a></h1>
</aside>

<div id="fh5co-main-content">
    <div class="dt js-dt">
        <div class="dtc js-dtc">
            <div class="simply-countdown-one animate-box" data-animate-effect="fadeInUp"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="fh5co-intro animate-box">
                                <h2>
                                    <?php
                                    the_title()
                                    ?>
                                </h2>
<!--                                Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.-->

                                <p><?php the_content();?></p>
                            </div>
                        </div>

                        <div class="col-lg-7 animate-box">
                            <form action="#" id="fh5co-subscribe">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo esc_attr($launcher_text);?>">
                                    <input type="submit" value="<?php echo esc_attr($launcher_button_lable);?>" class="btn btn-primary">
                                    <p class="tip">
                                        <?php echo esc_html($launcher_hint);?>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="fh5co-footer">
        <div class="row">
            <div class="col-md-6" >

                <?php
                if(is_active_sidebar("footer-left")){
                    dynamic_sidebar("footer-left");

                }
                ?>

            </div>
            <div class="col-md-6 fh5co-copyright">
<!--                <p>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com" target="_blank">Unsplash</a></p>-->

                    <?php
                    if(is_active_sidebar("footer-right")){
                        dynamic_sidebar("footer-right");
                    }

                    ?>

            </div>
        </div>
    </div>

</div>
<?php
get_footer();
?>
