<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2">
                <?php
                $philosophy_comment_num=get_comments_number();
                if($philosophy_comment_num<=1){
                    echo $philosophy_comment_num." ".__("comment","philosophy");
                }else{
                    echo $philosophy_comment_num." ".__("comments","philosophy");
                }

                ?>

                </h3>

            <!-- commentlist -->
            <ol class="commentlist">
            <?php
            wp_list_comments();

            ?>
            </ol>
                <div class="comments-pagination">
                <?php

            the_comments_pagination(array(
                "screen_reader_text"=>__("Pagination","philosophy"),
                "prev_text"=>"<".__("Previous Comments","philosophy"),
                "next_text"=>">".__("next Comments","philosophy")
            ))
            ?>
                </div>

            <!-- respond
            ================================================== -->
            <div class="respond">

                <h3 class="h2"><?php _e("Add Comment","philosophy");?></h3>

                <?php

                if(comments_open()) {
                    comment_form();
                }
                ?>

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->