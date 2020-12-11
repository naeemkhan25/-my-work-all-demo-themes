<?php
/*
 * Template Name:Pricing table
 */

get_header();
$alpha_pricing_table=get_post_meta(get_the_ID(),"_alpha_pricing_table",true);
$alpha_services=get_post_meta(get_the_ID(),"_alpha_services",true);

?>
<body <?php body_class(); ?>>
<?php
if(class_exists("CMB2")):
?>
<div class="container">
    <div class="row">
        <?php
          foreach ($alpha_pricing_table as $prc):
        ?>
        <div class="col-md-4">
            <h4><?php echo esc_html($prc['_alpha_caption'] );?></h4>
            <ul>
                <?php
                  foreach ($prc['_alpha_pricing_option'] as $op ):
                ?>
                <li>
                    <?php echo esc_html($op) ?>
                </li>
            <?php
            endforeach;
            ?>

            </ul>
            <h4><?php echo esc_html($prc['_alpha_price'] );?></h4>

        </div>
    <?php endforeach;?>
    </div>
</div>
<?php
endif;
?>

<div class="container">
    <div class="row">
        <?php
        foreach ($alpha_services as $service):
        ?>
        <div class="col-md-4">
            <i class="fa <?php echo $service['_alpha_icon'];?>"></i>
            <h5><?php
                echo $service['_alpha_tittle'];
                ?></h5>
            <p>
                <?php echo $service['_alpha_content'] ?>
            </p>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
</body>

<?php
get_footer();
?>

