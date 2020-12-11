<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                if(is_active_sidebar("footer-1")){
                    dynamic_sidebar("footer-1");
                }
                ?>
<!--                <div class="footerMenu">-->
<!--                    --><?php
//                    wp_nav_menu(array(
//                        'theme_location'=>'footerMenu',
//                        'menu_id'=>'footer_menu',
//                        "menu_class"=>'list-inline text-center',
//                    ));
//                    ?>
<!--                </div>-->
            </div>
            <div class="col-md-4">
                <?php
                if(is_active_sidebar("footer-2")){
                   dynamic_sidebar("footer-2");
                }
                ?>

            </div>

        </div>

        <div class="text-center">
            <?php _e('&copy; LWHH - All Rights Reserved','alpha');?>
        </div>

    </div>
</div>
<?php
wp_footer();
?>

</body>
</html>