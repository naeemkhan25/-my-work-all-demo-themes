<div class="comments">
    <?php
    $comments_cn = get_comments_number();
    ?>
    <h2><?php
        if ($comments_cn == 1) {
            _e(" 1 Comments", "alpha");
        } else {
            echo $comments_cn . ' ' . __(" Comments", "alpha");
        }

        ?></h2>
    <div class="comments_list">
        <?php
        wp_list_comments();
        ?>
    </div>
    <div class="comments_pagination">
        <?php
        the_comments_pagination(array(
           'screen_reader_text'=>''.__("Pagination","alpha"),
           'prev_text'=>'<'.__("previous comments","alpha"),
            "next_text"=>'>'.__("next text","alpha")
        ));
        ?>

    </div>
    <div class="comments_from">
        <?php

        if (!comments_open()) {
            _e("comments are closed.", "alpha");
        } else {
            comment_form();
        }
        ?>
    </div>
</div>


'