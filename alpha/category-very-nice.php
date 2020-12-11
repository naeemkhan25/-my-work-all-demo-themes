<?php
single_cat_title();
//aiti dara current theme er obosthan jana ja eiti ki
$alpha_current_term=get_queried_object();
$alpha_image_id=get_field("thumbnails",$alpha_current_term);
$alpha_image_details=wp_get_attachment_image_src("$alpha_image_id");
echo "<img src='".esc_url($alpha_image_details[0])."'/>";
