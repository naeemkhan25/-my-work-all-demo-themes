<?php
/**
 * Template Name: Customizer about page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php wp_head(); ?>
</head>
<body>
<div class="section banner">
    <h1><?php bloginfo( 'name' ); ?></h1>

    <h2><?php bloginfo( 'description' ); ?></h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mission section">
                <h1 class="heading" id="aboutHeading">
					<?php

                   echo get_theme_mod("cust_about_page_heading",__("ABout page","customize"));

					?>
                </h1>
                <p id="subheading-about">
                    <?php
                    echo apply_filters("the_content",get_theme_mod("cust_about_page_heading_description"));
                    ?>
                </p>
                <?php
                $image_urls=attachment_url_to_postid(get_theme_mod("cust_image_upload_settings"));
                echo wp_get_attachment_image($image_urls);
  ?>

                </div>
            </div>
        </div>
    </div>

<div class="section footer">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque esse nobis recusandae ullam
        unde.
    </p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Facebook</a></li>
        <li class="list-inline-item"><a href="#">Twitter</a></li>
        <li class="list-inline-item"><a href="#">Github</a></li>
    </ul>
</div>
</body>
<?php wp_footer(); ?>
</html>
